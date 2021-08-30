<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TravelPackageRequest;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::paginate(10);

        return view('pages.admin.travel-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        TravelPackage::create($data);
        return redirect()->route('admin.travel-package.index')->withSuccess('Paket Travel berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravelPackage  $travelPackage
     * @return \Illuminate\Http\Response
     */
    public function show(TravelPackage $travelPackage)
    {
        return view('pages.admin.travel-package.show', compact('travelPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TravelPackage  $travelPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelPackage $travelPackage)
    {
        return view('pages.admin.travel-package.edit', compact('travelPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TravelPackage  $travelPackage
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, TravelPackage $travelPackage)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        $travelPackage->update($data);
        return redirect()->route('admin.travel-package.index')->withSuccess('Paket Travel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravelPackage  $travelPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelPackage $travelPackage)
    {
        $travelPackage->delete();
        return redirect()->route('admin.travel-package.index')->withSuccess('Paket Travel berhasil dihapus');
    }
}
