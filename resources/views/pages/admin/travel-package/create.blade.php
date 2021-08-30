@extends('layouts.admin')

@section('title', 'Paket Travel')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Paket Travel</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.travel-package.store') }}" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                        value="{{ old('title') }}" aria-describedby="title">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="Location"
                                        value="{{ old('location') }}" aria-describedby="location">
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea class="form-control" name="about" rows="8"
                                        placeholder="About this travel">{{ old('about') }}</textarea>
                                    @error('about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="featured_event">Featured Event</label>
                                    <input type="text" name="featured_event" class="form-control"
                                        value="{{ old('featured_event') }}" placeholder="Featured Event"
                                        aria-describedby="featured_event">
                                    @error('featured_event')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="language">Language</label>
                                    <input type="text" name="language" class="form-control" placeholder="Language"
                                        value="{{ old('language') }}" aria-describedby="language">
                                    @error('language')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="foods">Foods</label>
                                    <input type="text" name="foods" class="form-control" placeholder="Foods"
                                        value="{{ old('foods') }}" aria-describedby="foods">
                                    @error('foods')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="departure_date">Departure Date</label>
                                    <input type="date" name="departure_date" class="form-control"
                                        value="{{ old('departure_date') }}" aria-describedby="departure_date">
                                    @error('departure_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" class="form-control" placeholder="Duration"
                                        value="{{ old('duration') }}" aria-describedby="duration">
                                    @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" class="form-control" placeholder="Type"
                                        value="{{ old('type') }}" aria-describedby="type">
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Price"
                                        value="{{ old('price') }}" aria-describedby="price">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection