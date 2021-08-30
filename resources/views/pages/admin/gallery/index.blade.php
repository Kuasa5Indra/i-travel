@extends('layouts.admin')

@section('title', 'Galeri Travel')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
            <a href="{{ route('admin.gallery.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Galeri</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table class="table table-bordered width-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Paket Travel</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->travel_package->title }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($item->image) }}" width="100px" height="100px">
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{ route('admin.gallery.edit', ['gallery'=> $item ]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.gallery.destroy', ['gallery'=> $item]) }}" method="post" class="d-inline">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    Data Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                            </table>
                        </div>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection