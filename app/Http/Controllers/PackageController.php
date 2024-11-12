<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PackageController extends Controller
{
    public function index()
    {
        // Retrieve packages with relationships
        $packages = Package::with(['store', 'status', 'commune.wilaya', 'deliveryType'])
            ->select([
                'tracking_code',
                'store_id',
                'name',
                'status_id',
                'client_first_name',
                'client_last_name',
                'client_phone',
                'commune_id',
                'delivery_type_id'
            ])
            ->paginate(50); // Paginate results for better performance

        return view('packages.index', compact('packages'));
    }


    public function exportCSV()
    {
        $packages = Package::with(['store', 'deliveryType', 'status'])->get();

        $columns = [
            'Tracking Code', 'store id', 'Package Name',
            'client_first_name', 'clinet Phone', 'Commune id', 'deliveryType.',
            'Delivery Type id', 'Status id'
        ];

        $callback = function () use ($packages, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($packages as $package) {
                fputcsv($file, [
                    $package->tracking_code,
                    $package->store_id,
                    $package->name,
                    $package->client_first_name,
                    $package->client_phone,
                    $package->commune_id,
                    $package->delivery_Type_id,
                    $package->status_id
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=packages.csv"
        ]);
    }


    public function create()
    {
        return view('packages.create'); // View for the create package form
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'uuid' => 'required|uuid|unique:packages,uuid',
            'tracking_code' => 'required|string|unique:packages,tracking_code',
            'commune_id' => 'required|integer',
            'delivery_type_id' => 'required|integer|exists:delivery_types,id',
            'status_id' => 'required|integer|exists:package_statuses,id',
            'store_id' => 'required|integer|exists:stores,id',
            'address' => 'required|string',
            'can_be_opened' => 'boolean',
            'name' => 'nullable|string',
            'client_first_name' => 'required|string',
            'client_last_name' => 'required|string',
            'client_phone' => 'required|string',
            'client_phone2' => 'nullable|string',
            'cod_to_pay' => 'numeric',
            'commission' => 'numeric',
            'status_updated_at' => 'nullable|date',
            'delivered_at' => 'nullable|date',
            'delivery_price' => 'required|numeric',
            'extra_weight_price' => 'numeric',
            'free_delivery' => 'boolean',
            'packaging_price' => 'numeric',
            'partner_cod_price' => 'numeric',
            'partner_delivery_price' => 'numeric',
            'partner_return' => 'numeric',
            'price' => 'required|numeric',
            'price_to_pay' => 'required|numeric',
            'return_price' => 'numeric',
            'total_price' => 'required|numeric',
            'weight' => 'integer',
        ]);

        \Log::info($validatedData); // Check if the data is valid

        \Log::info('Package Data: ', $package->toArray());


        // Create the package manually
        $package = Package::createManual($validatedData);

        // Redirect after successful creation
        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }




}
