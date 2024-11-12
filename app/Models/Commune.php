<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    // Existing code

    public function packages()
    {
        return $this->hasMany(Package::class, 'commune_id');
    }
}
