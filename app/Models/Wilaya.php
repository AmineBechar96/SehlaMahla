<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $table='wilayas';
    use HasFactory;
    public function communes() {
        return $this->hasMany('App\Models\Communes');
    }
}
