@extends('layouts.checkout')

@section('title', 'Checkout')

@push('styles')
<link rel="stylesheet" href="{{ asset('/frontend/lib/gjigo/css/gijgo.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('/frontend/lib/gjigo/js/gijgo.min.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4', 
        icons: {
            rightIcon: '<img src="{{ asset('/frontend/icons/ic_date.svg') }}" alt="Member">'
        } 
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
                            <li class="breadcrumb-item">Details</li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who's going ?</h1>
                        <p>Trip to {{ $item->travel_package->title }}. {{ $item->travel_package->location }}</p>
                        <div class="attendes">
                            <table class="table table-responsive-sm text-center table-borderless">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Username</td>
                                        <td>Nationality</td>
                                        <td>VISA</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->transaction_details as $detail)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                alt="Member" class="rounded-circle">
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->doe_passport > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                        </td>
                                        @if ($item->transaction_status == "IN CART")
                                        <td class="align-middle">
                                            <a href="{{ route('checkout.remove', ['detail_id' => $detail->id ]) }}">
                                                <img src="{{ asset('/frontend/icons/ic_delete.svg') }}" alt="delete">
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No visitors
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($item->transaction_status == "IN CART")
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline" method="POST" action="{{ route('checkout.create', ['id'=> $item->id ]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control mb-2 mr-sm-2"
                                        placeholder="Username">
                                    <label for="nationality" class="sr-only">Nationality</label>
                                    <input type="text" name="nationality" class="form-control mb-2 mr-sm-2"
                                        placeholder="Nationality">
                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" class=" custom-select mb-2 mr-sm-2">
                                        <option value="VISA">VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>
                                    <label for="doe_passport" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" name="doe_passport" class="form-control datepicker"
                                            placeholder="DOE Passport">
                                    </div>
                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </div>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You’re only able to invite member that has alerady been registered in iTravel
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-info">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{ $item->transaction_details->count() }} {{ $item->transaction_details->count() > 1 ? 'people' : 'person' }}</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional VISA</th>
                                <td width="50%" class="text-right">${{ $item->additional_visa }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">${{ $item->travel_package->price }},00 / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">${{ $item->transaction_total }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique)</th>
                                <td width="50%" class="text-right unique">
                                    <span class="text-blue">${{ $item->transaction_total }},{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instructions</h2>
                        <p class="payment-instruction">
                            Please complete your transaction before you continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ asset('/frontend/icons/ic_card.svg') }}" alt="card from bank"
                                    class="bank-image">
                                <div class="description">
                                    <h3>PT Jayawijaya Travel</h3>
                                    <p>
                                        1111 2222 3333
                                        <br>
                                        Bank Mandiri
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{ asset('/frontend/icons/ic_card.svg') }}" alt="card from bank"
                                    class="bank-image">
                                <div class="description">
                                    <h3>PT Jayawijaya Travel</h3>
                                    <p>
                                        1234 5678 9012
                                        <br>
                                        Bank Nasional Indonesia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @if ($item->transaction_status == "IN CART" || $item->transaction_status == "FAILED")
                    <div class="join-container">
                        <a class="btn btn-block btn-join-now mt-3 py-2" href="{{ route('checkout.success', ['id' => $item->id ]) }}" role="button">I Have Made Payment</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('checkout.cancel', ['id' => $item->id ]) }}" class="text-muted">
                            Cancel Booking
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection