<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communes extends Model
{
    protected $table='wila_com';
    use HasFactory;
    public function wilaya() {
        return $this->belongsTo('App\Models\Wilaya');
    }
    public function agencies() {
        return $this->hasMany('App\Models\RentAgency');
    }
}
