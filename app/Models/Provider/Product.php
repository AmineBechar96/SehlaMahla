<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\Service;
use App\Models\Provider\InvoiceOrder;
use App\Models\Provider\Invoice;

use Illuminate\Support\Facades\Storage;


class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'service_id',
        'product_image',
        'name',
        'unit_price',
        'pay_type',
        'description',
        'status'
    ];
    protected $appends=[
        'product_image_url',
    ];
    public function service(Type $var = null)
    {
       
            return $this->belongsTo(Service::class);
          }
          /**
     * get service image
     */
    public function getProductImageUrlAttribute(){
        if($this->product_image){
            return Storage::disk('services/service-products')->url($this->product_image);
        }
        else{
            return asset('app-assets/images/noProduct.png');
        }
    }
    /**
     * change status
     */
    public function pushStatus(string $status)
    {
        $this->update(['status'=>$status]);
    }
    /**
     * order function
     */
    public function invoice()
    {
        return $this->belongsToMany(Invoice::class);
    }
}

