<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider\InvoiceParameters;
use App\Models\Provider\InvoiceOrder;
use App\Models\Provider\Client;
use App\Models\Provider\Product;

use App\Models\services\SocialMediaAccount;

class Invoice extends Model
{
    use HasFactory;
    protected $table="invoices";
    protected $guarded=[];
    public function service()
{
    return $this->belongsTo(Service::class);
}
public function products()
{
    return $this->belongsToMany(Product::class)->withPivot(['quantity']);
}
public function parameters()
{
    return $this->belongsTo(InvoiceParameters::class);
}
public function client()
{
    return $this->belongsTo(Client::class);
}
public function socialMedia($id)
{
    $socialMedia=SocialMediaAccount::where('service_id',$this->client->service->id)->first();
    if($socialMedia){
        $gmail=$socialMedia->gmail;
        return $gmail;
    }
   
}
}
