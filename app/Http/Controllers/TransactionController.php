<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $items = Transaction::with(['travel_package', 'transaction_details'])->where('users_id', Auth::id())->latest()->paginate(5);
        return view('pages.client.order', compact('items'));
    }
}
