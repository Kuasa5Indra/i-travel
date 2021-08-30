@extends('layouts.admin')

@section('title', 'Paket Travel')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info Paket Travel {{ $travelPackage->title }}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h6>Location</h6>
                            <p>{{ $travelPackage->location }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Featured Event</h6>
                            <p>{{ $travelPackage->featured_event }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Language</h6>
                            <p>{{ $travelPackage->language }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Foods</h6>
                            <p>{{ $travelPackage->foods }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Departure Date</h6>
                            <p>{{ $travelPackage->departure_date }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Duration</h6>
                            <p>{{ $travelPackage->duration }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Type</h6>
                            <p>{{ $travelPackage->type }}</p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6>Price</h6>
                            <p>{{ $travelPackage->price }}</p>
                        </div>
                        <div class="col-12">
                            <h6>About</h6>
                            <p>{{ $travelPackage->about }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-warning" href="{{ route('admin.travel-package.edit', ['travel_package'=> $travelPackage ]) }}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.travel-package.destroy', ['travel_package'=> $travelPackage]) }}" method="post" class="d-inline">
                        {{ csrf_field() }}
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection