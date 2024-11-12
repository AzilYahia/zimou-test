<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    use HasFactory;

    protected $table = 'package_statuses';  // Specifies the table
    protected $primaryKey = 'id';  // Primary key column

    protected $fillable = ['name'];  // The fields that can be mass assigned

    // A PackageStatus can have many packages
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
