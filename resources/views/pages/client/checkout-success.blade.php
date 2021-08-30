@extends('layouts.checkout-success')

@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ asset('/frontend/icons/ilustration_inbox.svg') }}" alt="success">
            <h1>Yay! Success</h1>
            <p>
                We’ve sent you email for trip instruction
                <br>
                please read it as well
            </p>
            <a class="btn btn-home-page mt-3 px-5" href="{{ route('home') }}" role="button">Home Page</a>
        </div>
    </div>
</main>
@endsection