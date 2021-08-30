<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index()
    {
        $items = TravelPackage::with(['galleries'])->latest()->paginate(8);
        return view('pages.client.travel', compact('items'));
    }
}
