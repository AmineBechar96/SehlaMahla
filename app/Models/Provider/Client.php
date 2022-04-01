<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\Service;
use App\Models\Provider\Invoice;
use App\Models\Provider\Discount;


class Client extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table="clients";



    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * get the total of the client
     */
    public function total()
    {
        $total=Invoice::where('client_id',$this->id)->sum('total');
        return $total;
    }

    public function coupons()
{
    return $this->hasMany(ProviderCoupon::class);
}

}
