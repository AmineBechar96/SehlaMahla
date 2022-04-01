<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'id','model','brand','notes','proDate','type','energie','kilometrage','transmission','couleur','ch','litre',
    
            ];
        
        
        
}
