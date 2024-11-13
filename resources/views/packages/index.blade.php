@extends('layouts.app')

@section('content')

    <center>
    <div class="container my-4" style="color: var(--text-color);">
        <!-- Centered action buttons with spacing -->
        <div class="text-center mb-4">
            <a href="{{ route('packages.create') }}" class="btn btn-success mx-2">Create Package</a>

            <a href="{{ route('packages.export.csv') }}" class="btn btn-primary mx-2">Export CSV</a>
        </div>

        <h1 class="text-center mb-4">Packages</h1>

        <!-- Styled table with responsive design and dynamic color support -->
        <table class="table table-hover table-bordered" style="color: var(--text-color); background-color: var(--table-bg-color);">
            <thead class="table-light">
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

        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $packages->links() }}
        </div>
    </div>
        </center>

    <style>
        :root {
            --bg-color: #f8f9fa;
            --text-color: #212529;
            --table-bg-color: #ffffff;
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            :root {
                --bg-color: #343a40;
                --text-color: #f8f9fa;
                --table-bg-color: #495057;
            }
        }

        /* Additional styling */
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .btn {
            font-weight: 500;
        }
    </style>
@endsection
