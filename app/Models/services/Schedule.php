<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\Service;

class Schedule extends Model
{
    protected $casts = [
        'days_of_service' => 'array',
    ];
    use HasFactory;
    protected $table="schedules";
    protected $fillable=[
        'service_id',
        'days_of_service',
        'hour_of_starting',
        'hour_of_closing'
    ];
    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
