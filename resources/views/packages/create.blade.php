@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Create New Package</h2>

        <form action="{{ route('packages.store') }}" method="POST" class="p-4 rounded" style="background-color: var(--bg-color); color: var(--text-color);">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="uuid" class="form-label">UUID</label>
                    <input type="text" name="uuid" class="form-control" placeholder="Unique identifier" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tracking_code" class="form-label">Tracking Code</label>
                    <input type="text" name="tracking_code" class="form-control" placeholder="Tracking code" required>
                </div>
            </div>

            <!-- Additional sections organized by fields -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="commune_id" class="form-label">Commune ID</label>
                    <input type="number" name="commune_id" class="form-control" placeholder="1, 2, etc." required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="100.00" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="delivery_type_id" class="form-label">Delivery Type ID</label>
                    <input type="number" name="delivery_type_id" class="form-control" placeholder="1, 2, etc." required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="status_id" class="form-label">Status ID</label>
                    <input type="number" name="status_id" class="form-control" placeholder="1, 2, etc." required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="store_id" class="form-label">Store ID</label>
                    <input type="number" name="store_id" class="form-control" placeholder="Store identifier" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="client_first_name" class="form-label">Client First Name</label>
                    <input type="text" name="client_first_name" class="form-control" placeholder="First name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="client_last_name" class="form-label">Client Last Name</label>
                    <input type="text" name="client_last_name" class="form-control" placeholder="Last name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="client_phone" class="form-label">Client Phone</label>
                    <input type="text" name="client_phone" class="form-control" placeholder="Phone number" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="client_phone2" class="form-label">Client Phone 2</label>
                    <input type="text" name="client_phone2" class="form-control" placeholder="Alternate phone number">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cod_to_pay" class="form-label">COD to Pay</label>
                    <input type="number" step="0.01" name="cod_to_pay" class="form-control" placeholder="Cash on delivery">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="delivery_price" class="form-label">Delivery Price</label>
                    <input type="number" step="0.01" name="delivery_price" class="form-control" placeholder="Delivery cost">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="free_delivery" class="form-label">Free Delivery</label>
                    <select name="free_delivery" class="form-select">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price_to_pay" class="form-label">Price to Pay</label>
                    <input type="number" step="0.01" name="price_to_pay" class="form-control" placeholder="Amount to pay">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="total_price" class="form-label">Total Price</label>
                    <input type="number" step="0.01" name="total_price" class="form-control" placeholder="Total amount">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="packaging_price" class="form-label">Packaging Price</label>
                    <input type="number" step="0.01" name="packaging_price" class="form-control" placeholder="Cost of packaging">
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Create Package</button>
            </div>
        </form>
    </div>

    <style>
        :root {
            --bg-color: #f8f9fa;  /* Light mode background */
            --text-color: #212529; /* Light mode text */
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            :root {
                --bg-color: #343a40;
                --text-color: #f8f9fa;
            }
        }

        /* Additional styles */
        .form-label {
            font-weight: 500;
            color: var(--text-color);
        }

        .form-control, .form-select {
            color: var(--text-color);
            background-color: var(--bg-color);
            border: 1px solid #ced4da;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
@endsection
