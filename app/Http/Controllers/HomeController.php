<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = TravelPackage::with('galleries')->latest()->limit(4)->get();
        return view('pages.client.welcome', compact('items'));
    }
}
