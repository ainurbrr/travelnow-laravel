@extends('layouts.success')
@section('title', 'Checkout Success')


@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/sc-checkout.jpg') }}" alt="" class="img-fluid">
            <h1>Yay! Success</h1>
            <p>We've sent you email for trip Instruction
                <br>
                please read it as well
            </p>
            <a href="/" class="btn btn-homepage mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection