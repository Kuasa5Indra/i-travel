<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Carbon\Carbon;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $item = Transaction::with(['travel_package', 'user', 'transaction_details'])->findOrFail($id);
        Gate::authorize('my-checkout', $item);
        return view('pages.client.checkout', compact('item'));
    }

    public function create(CheckoutRequest $request, $id)
    {
        $data = $request->validated();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->findOrFail($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout.index', ['id' => $id]);
    }

    public function process($id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::id(),
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout.index', ['id' => $transaction->id]);
    }

    public function remove($detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['travel_package'])->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;
        $transaction->save();
        $item->delete();

        return redirect()->route('checkout.index', ['id' => $item->transactions_id]);
    }

    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'transaction_status' => 'ONGOING'
        ]);

        return view('pages.client.checkout-success');
    }

    public function cancel($id)
    {
        $transaction = Transaction::with(['transaction_details', 'user', 'travel_package.galleries'])->findOrFail($id);
        $transaction->update([
            'transaction_status' => 'CANCEL'
        ]);

        return redirect()->route('detail', ['slug' => $transaction->travel_package->slug]);
    }
}
