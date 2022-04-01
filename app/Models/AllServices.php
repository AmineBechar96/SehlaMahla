<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllServices extends Model
{
    use HasFactory;
    protected $table='all_agencies';
    use HasFactory;
    public function commune() {
        return $this->belongsTo('App\Models\Communes');
    }
}
 