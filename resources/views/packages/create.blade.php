@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Package</h2>
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="uuid">UUID</label>
                <input type="text" name="uuid" class="form-control" >
            </div>

            <div class="form-group">
                <label for="tracking_code">Tracking Code</label>
                <input type="text" name="tracking_code" class="form-control" >
            </div>

            <div class="form-group">
                <label for="commune_id">Commune ID</label>
                <input type="number" name="commune_id" class="form-control" >
            </div>

            <div class="form-group">
                <label for="delivery_type_id">Delivery Type ID</label>
                <input type="number" name="delivery_type_id" class="form-control" >
            </div>

            <div class="form-group">
                <label for="status_id">Status ID</label>
                <input type="number" name="status_id" class="form-control" >
            </div>

            <div class="form-group">
                <label for="store_id">Store ID</label>
                <input type="number" name="store_id" class="form-control" >
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" >
            </div>

            <div class="form-group">
                <label for="client_first_name">Client First Name</label>
                <input type="text" name="client_first_name" class="form-control" >
            </div>

            <div class="form-group">
                <label for="client_last_name">Client Last Name</label>
                <input type="text" name="client_last_name" class="form-control" >
            </div>

            <div class="form-group">
                <label for="client_phone">Client Phone</label>
                <input type="text" name="client_phone" class="form-control" >
            </div>

            <div class="form-group">
                <label for="client_phone2">Client Phone 2</label>
                <input type="text" name="client_phone2" class="form-control">
            </div>

            <div class="form-group">
                <label for="cod_to_pay">COD to Pay</label>
                <input type="number" step="0.01" name="cod_to_pay" class="form-control" >
            </div>

            <div class="form-group">
                <label for="commission">Commission</label>
                <input type="number" step="0.01" name="commission" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" >
            </div>

            <div class="form-group">
                <label for="price_to_pay">Price to Pay</label>
                <input type="number" step="0.01" name="price_to_pay" class="form-control" >
            </div>

            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" step="0.01" name="total_price" class="form-control" >
            </div>

            <!-- Add more form fields as necessary based on your model's attributes -->

            <button type="submit" class="btn btn-primary">Create Package</button>
        </form>
    </div>
@endsection
