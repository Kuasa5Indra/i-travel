<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $travelPackageCount = TravelPackage::count();
        $transactionCount = Transaction::count();
        $ongoingCount = Transaction::where('transaction_status', 'ONGOING')->count();
        $successCount = Transaction::where('transaction_status', 'SUCCESS')->count();
        return view('pages.admin.dashboard', compact([
            'travelPackageCount', 'transactionCount',
            'ongoingCount', 'successCount'
        ]));
    }
}
