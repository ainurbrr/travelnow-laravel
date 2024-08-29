@extends('layouts.success')
@section('title', 'Checkout Success')


@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/mail.png') }}" alt="" class="img-fluid">
            <h1>Oops!</h1>
            <p>Your transaction is unfinished
            </p>
            <a href="/" class="btn btn-homepage mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection