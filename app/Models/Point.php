<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Events\PointsUpdated;
class Point extends Model
{
    use HasFactory;
    //protected $table="ratings";



    protected $dispatchesEvents=[
        'updated'=>PointsUpdated::class,
    ];
    protected $fillable=[
        'user_id',
        'number_of_points',
        'badge_color',
        
    ] ;
    public function Owner()
    {
        return $this->hasOne(User::class);
    }
}
