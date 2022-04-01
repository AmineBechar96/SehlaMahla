<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider\Client;
use App\Models\Provider\Discount;

class ProviderCoupon extends Model
{
    use HasFactory;
    protected $guarded=[];
protected $table="provider_coupons";

public function discount()
{
    return $this->belongsTo(Discount::class);
}

public function client()
{
    return $this->belongsTo(Client::class);
}

}
