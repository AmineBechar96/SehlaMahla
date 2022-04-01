<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralMechanic extends Model
{
    protected $table='mecanicien_voitures';
    use HasFactory;
    public function commune() {
        return $this->belongsTo('App\Models\Communes');
    }
}
