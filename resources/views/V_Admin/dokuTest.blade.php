@extends('V_Admin.app')

@extends('flashdata')
@section('tittle', 'FORMS | Dashboard')

@section('content')

    <!-- start: main -->


    <!-- start: navbar -->

    <!-- end: navbar -->

    <!-- start: content -->
    <div class="content__wrapper">




        <div class="content__row mb-3">
            <div class="card__box">

                <div class="container">
                    <h1>Payment Form</h1>
                    <form action="{{ route('generate.admin') }}" method="POST">
                        @csrf  {{-- Add the CSRF token --}}
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expiredTime">Expiration Time:</label>
                            <input type="datetime-local" name="expiredTime" id="expiredTime" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="customerName">Customer Name:</label>
                            <input type="text" name="customerName" id="customerName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="country" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="clientId">Client ID:</label>
                            <input type="text" name="clientId" id="clientId" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sharedKey">Shared Key:</label>
                            <input type="text" name="sharedKey" id="sharedKey" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Payment</button>
                    </form>
                </div>

            </div>
        </div>
        <!-- end: content -->



    @endsection
