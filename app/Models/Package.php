<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'tracking_code', 'commune_id', 'delivery_type_id', 'status_id', 'store_id',
        'address', 'can_be_opened', 'name', 'client_first_name', 'client_last_name',
        'client_phone', 'client_phone2', 'cod_to_pay', 'commission', 'status_updated_at',
        'delivered_at', 'delivery_price', 'extra_weight_price', 'free_delivery', 'packaging_price',
        'partner_cod_price', 'partner_delivery_price', 'partner_return', 'price', 'price_to_pay',
        'return_price', 'total_price', 'weight'
    ];


    public static function createManual(array $attributes)
    {
        // Only set a few fields initially
        $package = new self();
        $package->uuid = $attributes['uuid'];
        $package->tracking_code = $attributes['tracking_code'];
        $package->commune_id = $attributes['commune_id'];
        $package->price = $attributes['price'];
        $package->delivery_type_id = $attributes['delivery_type_id'];
        $package->status_id = $attributes['status_id'];
        $package->store_id = $attributes['store_id'];
        $package->address = $attributes['address'];
        $package->client_first_name = $attributes['client_first_name'];
        $package->client_last_name = $attributes['client_last_name'];
        $package->client_phone = $attributes['client_phone'];
        $package->client_phone2 = $attributes['client_phone2'];
        $package->cod_to_pay = $attributes['cod_to_pay'];
        $package->delivery_price = $attributes['delivery_price'];
        $package->free_delivery = $attributes['free_delivery'];
        $package->price_to_pay = $attributes['price_to_pay'];
        $package->total_price = $attributes['total_price'];
        $package->packaging_price = $attributes['packaging_price'];
        // Save and return the package
        $package->save();

        return $package;
    }















    // Define a custom create method
//    public static function createManual(array $attributes)
//    {
//        // Manually create a new instance of the Package model
//        $package = new self();
//
//        // Loop through each attribute and assign it to the model
//        foreach ($attributes as $key => $value) {
//            if (array_key_exists($key, $package->getFillable())) {
//                $package->$key = $value;
//            }
//        }
//
//        try {
//            // Save the package instance to the database
//            $package->save();
//        }
//        catch (\Exception $e) {
//            dd($e->getMessage());
//            \Log::error('Error saving package: ' . $e->getMessage());
//            throw $e;  // Re-throw the exception after logging it
//        }
//
//        // Return the created package (optional)
//        return $package;
//    }

    // Relationships (same as before)
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class);
    }

    public function status()
    {
        return $this->belongsTo(PackageStatus::class, 'status_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }
}
