@extends('layouts.app')

@section('title', 'Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('/frontend/lib/xZoom/dist/xzoom.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('/frontend/lib/xZoom/dist/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 750,
            zoomHeight: 750,
            fadeOut: true
        });
    });
</script>
@endpush

@section('content')
<main>
    <section class="section-details-heading"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Paket Travel</li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p>{{ $item->location }}</p>
                        <div class="gallery">
                            <div class="xzoom-cover">
                                <img class="xzoom" id="main_image"
                                    src="{{ Storage::url($item->galleries->first()->image) }}"
                                    xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                            </div>
                            <div class="xzoom-thumbnails text-center">
                                @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                    <img class="xzoom-gallery" width="120" height="67"
                                        src="{{ Storage::url($gallery->image) }}"
                                        xpreview="{{ Storage::url($gallery->image) }}">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <h2>Tentang Wisata</h2>
                        <p>
                            {{ $item->about }}
                        </p>
                        <div class="feature row">
                            <div class="col-md-4">
                                <img src="{{ asset('/frontend/icons/ic_event.svg') }}" alt="icon"
                                    class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $item->featured_event }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('/frontend/icons/ic_lang.svg') }}" alt="icon" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $item->language }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('/frontend/icons/ic_food.svg') }}" alt="icon" class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $item->foods }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            @forelse ($transactions->take(6) as $member)
                                @if ($loop->last)
                                    @if ($transactions->count() > 6)
                                        <img src="https://ui-avatars.com/api/?font-size=0.2&name=More&length=4&size=40&rounded=true"
                                        alt="{{ $transactions->count() }} More" title="{{ $transactions->count() }} More" class="member-image mr-1">
                                    @else
                                        <img src="https://ui-avatars.com/api/?size=40&rounded=true&name={{ $member->user->name }}"
                                        alt="{{ $member->user->name }}" title="{{ $member->user->name }}" class="member-image mr-1">
                                    @endif
                                @else
                                    <img src="https://ui-avatars.com/api/?size=40&rounded=true&name={{ $member->user->name }}"
                                    alt="{{ $member->user->name }}" title="{{ $member->user->name }}" class="member-image mr-1">
                                @endif
                            @empty
                                Belum ada Member
                            @endforelse
                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-info">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-right">{{ $item->departure_date }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-right">{{ $item->duration }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Type of Trip</th>
                                <td width="50%" class="text-right">{{ $item->type }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-right">${{ $item->price }} / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                        <form action="{{ route('checkout.process', ['id' => $item->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Join Now</button>
                        </form>
                        @endauth

                        @guest
                        <a class="btn btn-block btn-join-now mt-3 py-2" href="{{ route('login') }}" role="button">Login
                            to Join Travel</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection