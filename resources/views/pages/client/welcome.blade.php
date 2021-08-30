@extends('layouts.app')

@section('title', 'i-Travel')

@push('scripts')
<script>
    function scrollToSectionPopular() {
      var element = document.getElementById("popular");
      element.scrollIntoView();
    }

    function scrollToSectionTestimonial() {
      var element = document.getElementById("testimonial");
      element.scrollIntoView();
    }
</script>
@endpush

@section('content')
<!-- Header-->
<header class="text-center">
    <h1>
        Explore the Beautiful World
        <br>
        As Easy One Click
    </h1>
    <p class="mt-3">
        You will see beautiful
        <br>
        moment you never seen before
    </p>
    <a class="btn btn-get-started px-4 mt-4" href="#popular" onclick="scrollToSectionPopular()" role="button">Get Started</a>
</header>
<!-- Main-->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>7</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>
                        Something that you never try
                        <br>
                        before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @forelse ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column"
                        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.81), rgba(0, 0, 0, 0)), url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                        <div class="travel-country">{{ $item->title }}</div>
                        <div class="travel-location">{{ $item->location }}</div>
                        <div class="travel-button mt-auto">
                            <a class="btn btn-travel-details px-4"
                                href="{{ route('detail', ['slug' => $item->slug ]) }}" role="button">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column">
                        <div class="travel-country">Maaf</div>
                        <div class="travel-location">Paket Travel tidak tersedia</div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>
                        Companies are trusted us
                        <br>
                        more than just a trip
                    </p>
                </div>
                <div class="col-md-8">
                    <img src="{{ asset('/frontend/images/ana_partner.png') }}" alt="ana_partner">
                    <img src="{{ asset('/frontend/images/disney_partner.png') }}" alt="disney_partner">
                    <img src="{{ asset('/frontend/images/shangrila_partner.png') }}" alt="shangrila_partner">
                    <img src="{{ asset('/frontend/images/visa_partner.png') }}" alt="visa_partner">
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>They Are Loving Us</h2>
                    <p>
                        Moments were giving them
                        <br>
                        the best experience
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img class="mb-4 rounded-circle" src="{{ asset('/frontend/images/user_1.png') }}"
                                alt="User Review 1">
                            <h3 class="mb-4">Danial Agung</h4>
                                <p class="testimonial">
                                    “Aku terkejut bahwa aku
                                    <br>
                                    mendapatkan pengalaman ini
                                    <br>
                                    lebih baik dari sebelumnya”
                                </p>
                        </div>
                        <hr>
                        <div class="trip-to mt-2">
                            Trip to DKI Jakarta, Indonesia
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img class="mb-4 rounded-circle" src="{{ asset('/frontend/images/user_2.png') }}"
                                alt="User Review 2">
                            <h3 class="mb-4">Adi Harun</h4>
                                <p class="testimonial">
                                    “Pemesanan paket wisata sangat
                                    <br>
                                    mudah dilakukan oleh siapa saja
                                    <br>
                                    yang belum pernah travelling.
                                    <br>
                                    Sungguh luar biasa.”
                                </p>
                        </div>
                        <hr>
                        <div class="trip-to mt-2">
                            Trip to Kuala Lumpur, Malaysia
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img class="mb-4 rounded-circle" src="{{ asset('/frontend/images/user_3.png') }}"
                                alt="User Review 3">
                            <h3 class="mb-4">Annisa Lestari</h4>
                                <p class="testimonial">
                                    “Wow, ternyata liburan menjadi
                                    <br>
                                    menyenangkan dengan fasilitas
                                    <br>
                                    yang sangat lengkap”
                                </p>
                        </div>
                        <hr>
                        <div class="trip-to mt-2">
                            Trip to Bangkok, Thailand
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a class="btn btn-need-help px-4 mt-4" href="#" role="button">I Need Help</a>
                    @guest
                    <a class="btn btn-get-started px-4 mt-4" href="{{ route('register') }}" role="button">Get
                        Started</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
</main>
@endsection