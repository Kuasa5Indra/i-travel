@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Status Transaksi</h1>
    </div>

    @php
        $items = ['IN CART', 'ONGOING', 'SUCCESS', 'CANCEL', 'FAILED'];
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.transaction.update', ['transaction' => $transaction]) }}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="travel_package">Status Transaksi</label>
                                  <select class="form-control" name="transaction_status" required>
                                    <option value="">Pilih Status Transaksi</option>
                                    @foreach ($items as $item)
                                        @if ($item == $transaction->transaction_status)
                                            <option value="{{ $item }}" selected>{{ $item }}</option>
                                        @else
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endif
                                    @endforeach
                                  </select>
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