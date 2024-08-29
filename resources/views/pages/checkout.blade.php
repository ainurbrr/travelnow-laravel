@extends('layouts.checkout')

@section('title')
    Checkout
@endsection

@push('addon-style')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}">
@endpush

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item ">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
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
                            <h1>Who is Going?</h1>
                            <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}" alt="avatar" height="60px" class="rounded-circle"></td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nationality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}"><img src="{{ url('frontend/images/x.svg') }}"
                                                            alt=""></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}" class="row row-cols-lg-auto g-3 align-items-center" method="POST">
                                    @csrf
                                    <div class="col-auto">
                                        <label for="username" class="visually-hidden">Name</label>
                                        <input type="text" class="form-control mb-3 me-2" id="username"
                                            placeholder="Username" name="username" required>
                                    </div>
                                    <div class="col-auto">
                                        <label for="nationality" class="visually-hidden">Nationality</label>
                                        <input type="text" class="form-control mb-3 me-2" style="width: 50px;" id="nationality"
                                            placeholder="Nationality" name="nationality" required>
                                    </div>
                                    <div class="col-auto">
                                        <label for="is_visa" class="visually-hidden">Visa</label>
                                        <select name="is_visa" id="is_visa" required class="form-select mb-3 me-2">
                                            <option value="visa" selected>Visa</option>
                                            <option value="1">30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                                        <div class="input-group mb-0 me-2">
                                            <input id="doe_passport" name="doe_passport" class="form-control" placeholder="DOE Passport" />
                                            <script>
                                                $('#doe_passport').datepicker({
                                                    format: 'yyyy-mm-dd',
                                                    uiLibrary: 'bootstrap5',
                                                    icons: {
                                                        rightIcon: '<img src="{{ url('frontend/images/date.svg') }}"/>'
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-add-now mb-3 px-4">Add Now</button>
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in TravelNow.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->details->count() }} Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional VISA</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->additional_visa }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->travel_package->price }},00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->transaction_total }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">
                                            ${{ $item->transaction_total }},
                                        </span>
                                        <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instruction">Please complete your payment before to continue the wonderful
                                trip. <br>You will be redirect to payment page</p>
                            {{-- <img src="{{ url('frontend/images/gopay.png') }}" class="w-50 mb-3">
                            <img src="{{ url('frontend/images/qris.svg') }}" class="w-50"> --}}
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/gopay.png') }}" class="bank-image">
                                    <div class="description">
                                        <h3>PT TravelNow</h3>
                                        <p>
                                            0881 8829 8800
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/qris.svg') }}" class="bank-image">
                                    <div class="description">
                                        <h3>PT TravelNow</h3>
                                        <p>
                                            0881 8829 8800
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="join-container d-grid">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">Process Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endpush
