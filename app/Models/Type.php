<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\services\Service;

class Type extends Model
{
    protected $table='types';
    use HasFactory;
    public function category() {
        return $this->belongsTo(Category::class);
    }


     /**
     * get the number of service of each type
     */

    public function hasService($id)
    {
       $total=Service::where('type_id',$id)->count();
       return $total;
    }
}
