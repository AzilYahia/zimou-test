<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    use HasFactory;

    protected $table = 'delivery_types';  // Specifies the table
    protected $primaryKey = 'id';  // Primary key column

    protected $fillable = ['name'];  // The fields that can be mass assigned

    // A DeliveryType can have many packages
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
