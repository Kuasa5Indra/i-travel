@extends('layouts.app')

@section('title', 'i-Travel - Orders')

@section('content')
<main>
    <section class="section-details-heading"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-details transaction">
                        <h1>Your Transaction</h1>
                        <p>This is an order list</p>
                        @forelse ($items as $item)
                            <div class="card card-order">
                                <div class="row">
                                    <div class="col-6">
                                        <h2>{{ $item->travel_package->title }}</h2>
                                        <p>{{ $item->travel_package->location }}</p>
                                    </div>
                                    <div class="col-6">
                                        <h2 class="text-right">${{ $item->transaction_total }}</h2>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Date : {{ $item->created_at }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-right">{{ $item->transaction_status }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <a class="btn btn-show" href="{{ route('checkout.index', ['id' => $item->id]) }}" role="button">Show</a>
                                </div>
                            </div>
                        @empty
                            Belum ada Transaksi
                        @endforelse                           
                        <br>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection