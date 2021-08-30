@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered width-100">
                            <tr>
                                <th>ID</th>
                                <td>{{ $transaction->id }}</td>
                            </tr>
                            <tr>
                                <th>Paket Travel</th>
                                <td>{{ $transaction->travel_package->title }}</td>
                            </tr>
                            <tr>
                                <th>Pembeli</th>
                                <td>{{ $transaction->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Additional VISA</th>
                                <td>${{ $transaction->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>${{ $transaction->transaction_total }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{ $transaction->transaction_status }}</td>
                            </tr>
                            <tr>
                                <th>Pembelian</th>
                                <td>
                                    <table class="table table-bordered width-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Nationality</th>
                                                <th>Visa</th>
                                                <th>DOE Passport</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->transaction_details as $detail)
                                                <tr>
                                                    <td>{{ $detail->id }}</td>
                                                    <td>{{ $detail->username}}</td>
                                                    <td>{{ $detail->nationality }}</td>
                                                    <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                    <td>{{ $detail->doe_passport }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection