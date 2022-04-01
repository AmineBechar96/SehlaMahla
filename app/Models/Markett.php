<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markett extends Model
{
    protected $table='weekly_market';
    use HasFactory;
    public function commune() {
        return $this->belongsTo('App\Models\Communes');
    }
}
