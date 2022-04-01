<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\services\Service;


class Rating extends Model
{
    use HasFactory;
    protected $table="ratings";
    protected $fillable=[
        'user_id',
        'service_id',
        'number_of_starts',
        'review'
    ] ;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
