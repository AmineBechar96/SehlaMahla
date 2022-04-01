<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recoveryTr extends Model
{
    protected $table='depannage_voitures';
    use HasFactory;
    public function commune() {
        return $this->belongsTo('App\Models\Communes');
    }
}
