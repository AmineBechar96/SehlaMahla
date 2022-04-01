<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\Service;
use App\Models\Provider\ProviderCoupon;

class Discount extends Model
{
    use HasFactory;
    protected $guarded=[];




    /**
     * belongs to a service
     */


public function service()
{
   return $this->belongsTo(Service::class);
}

    /**
     * change status
     */
    public function unvalid()
    {
        $this->update(['status'=>'invalid']);
    }

public function coupons()
{
    return $this->hasMany(ProviderCoupon::class);
}

}
