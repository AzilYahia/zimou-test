<?php

namespace App\Http\Controllers;

    use App\Models\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PackageController extends Controller
{
    public function index()
    {
        // Retrieve packages with relationships
        $packages = Package::with(['store', 'status', 'commune.wilaya', 'deliveryType'])->select(['tracking_code', 'store_id', 'name', 'status_id', 'client_first_name', 'client_last_name', 'client_phone', 'commune_id', 'delivery_type_id'])->paginate(50); // Paginate results for better performance

        return view('packages.index', compact('packages'));
    }


    public function exportCSV()
    {
        $packages = Package::with(['store', 'deliveryType', 'status'])->get();

        $columns = ['Tracking Code', 'store id', 'Package Name', 'client_first_name', 'clinet Phone', 'Commune id', 'deliveryType.', 'Delivery Type id', 'Status id'];

        $callback = function () use ($packages, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($packages as $package) {
                fputcsv($file, [$package->tracking_code, $package->store_id, $package->name, $package->client_first_name, $package->client_phone, $package->commune_id, $package->delivery_Type_id, $package->status_id]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, ["Content-Type" => "text/csv", "Content-Disposition" => "attachment; filename=packages.csv"]);
    }


public function create()
{
    return view('packages.create'); // This will return the form view for creating a package.
}


    /**
     * @throws Exception
     */
    public function store(Request $request)
{

    // Validate the input data
    $validatedData = $request->validate([
        'uuid' => 'required|string|unique:packages,uuid',
        'tracking_code' => 'required|string|unique:packages,tracking_code',
        'commune_id' => 'required|integer',
        'price' => 'required|numeric',
        'delivery_type_id' => 'required|integer|exists:delivery_types,id',
        'status_id' => 'required|integer|exists:package_statuses,id',
        'store_id' => 'required|integer|exists:stores,id',
        'address' => 'required|string',
        'client_first_name' => 'required|string',
        'client_last_name' => 'required|string',
        'client_phone' => 'required|string',
        'client_phone2' => 'nullable|string',
        'cod_to_pay' => 'nullable|numeric',
        'delivery_price' => 'required|numeric',
        'free_delivery' => 'boolean',
        'price_to_pay' => 'required|numeric',
        'total_price' => 'required|numeric',
        'packaging_price' => 'nullable|numeric',
    ]);

    // Create the package
    try {

        Package::create($validatedData);
    }
    catch (Exception $e) {
          dd($request->all());  // Dump all incoming data and stop execution

         return redirect()->route('packages.create')->with('error', 'An error occurred while creating the package.');
    }

  dd($request->all());  // Dump all incoming data and stop execution
    // Redirect back to the index page with a success message
    return redirect()->route('packages.index')->with('success', 'Package created successfully!');
}


}
