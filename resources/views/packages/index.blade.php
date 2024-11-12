
@extends('layouts.app')

@section('content')
    <center style="color:white;">
        <a href="{{ route('packages.create') }}" class="btn btn-success">Create Package</a>

        <br>
        <a  href="{{ route('packages.export.csv') }}" class="btn btn-primary">Export CSV</a>
    </center>
    <div class="container">
        <h1>Packages</h1>
        <table class="table" style="color: white">
            <thead>
            <tr>
                <th>Tracking Code</th>
                <th>Store Name</th>
                <th>Package Name</th>
                <th>Status</th>
                <th>Client Full Name</th>
                <th>Phone</th>
                <th>Wilaya</th>
                <th>Commune</th>
                <th>Delivery Type</th>
                <th>Status Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->tracking_code }}</td>
                    <td>{{ $package->store->name }}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->status->name }}</td>
                    <td>{{ $package->client_first_name }} {{ $package->client_last_name }}</td>
                    <td>{{ $package->client_phone }}</td>
                    <td>{{ $package->commune->wilaya->name ?? 'N/A' }}</td>
                    <td>{{ $package->commune->name ?? 'N/A' }}</td>
                    <td>{{ $package->deliveryType->name }}</td>
                    <td>{{ $package->status->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $packages->links() }} <!-- Pagination links -->
    </div>
@endsection
