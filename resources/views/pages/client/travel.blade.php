@extends('layouts.app')

@section('title', 'i-Travel - Paket Travel')

@section('content')
<main>
    <section class="section-details-heading"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Paket Travel</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <section class="section-popular-content">
                            <div class="container">
                                <div class="section-popular-travel row justify-content-center">
                                    @foreach ($items as $item)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="card-travel text-center d-flex flex-column"
                                            style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.81), rgba(0, 0, 0, 0)), url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                            <div class="travel-country">{{ $item->title }}</div>
                                            <div class="travel-location">{{ $item->location }}</div>
                                            <div class="travel-button mt-auto">
                                                <a class="btn btn-travel-details px-4" href="{{ route('detail', ['slug' => $item->slug ]) }}" role="button">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection