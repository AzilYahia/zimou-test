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

    // Define the relationships

    // Each package belongs to one store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // Each package has a delivery type
    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class); // The foreign key is 'delivery_type_id'
    }

    // Each package has a status
    public function status()
    {
        return $this->belongsTo(PackageStatus::class, 'status_id'); // The foreign key is 'status_id'
    }
}
