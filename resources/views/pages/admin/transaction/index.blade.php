@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                                        <th>User</th>
                                        <th>Visa</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->travel_package->title }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>${{ $item->additional_visa }}</td>
                                                <td>${{ $item->transaction_total }}</td>
                                                <td>{{ $item->transaction_status }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('admin.transaction.show', ['transaction'=> $item ]) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-warning" href="{{ route('admin.transaction.edit', ['transaction'=> $item ]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.transaction.destroy', ['transaction'=> $item]) }}" method="post" class="d-inline">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
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