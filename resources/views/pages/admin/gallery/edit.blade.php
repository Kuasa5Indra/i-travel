@extends('layouts.admin')

@section('title', 'Galeri Travel')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Galeri Travel</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.gallery.update', ['gallery' => $gallery]) }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                  <label for="travel_package">Paket Travel</label>
                                  <select class="form-control" name="travel_packages_id" required>
                                    <option value="">Pilih Paket Travel</option>
                                    @foreach ($items as $item)
                                        @if ($gallery->travel_packages_id == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endif
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                  <label for="image">Gambar</label>
                                  <input type="file" class="form-control-file" name="image" aria-describedby="image">
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