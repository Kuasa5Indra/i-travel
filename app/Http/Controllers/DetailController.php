<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug)
    {
        $item = TravelPackage::with(['galleries', 'transactions.user'])->where('slug', $slug)->first();
        $transactions = $item->transactions->unique('users_id')->where('transaction_status', 'SUCCESS');
        return view('pages.client.detail', compact(['item', 'transactions']));
    }
}
