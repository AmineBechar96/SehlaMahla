<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;
use App\Models\services\Schedule;
use App\Models\services\Rating;
use App\Models\services\MyService;
use Illuminate\Support\Facades\Gate;
use App\Models\Client\Booking;
use App\Models\Provider\Discount;

use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;


use App\Models\services\SocialMediaAccount;
use Illuminate\Support\Facades\Storage;


use App\Models\Communes;

class Service extends Model
{
    protected $table="services";
    use HasFactory;
   
    
    protected $fillable=[
        'user_id',
        'type_id',
        'commune_id',
        'service_image',
        'title',
        'address',
        'phone',
        'website',
        'latitude',
        'longitude',
        'body',
        'tags',
        'distance',
        'shipping',
        'home',
        'vehicule_shape',
        'covering_territory'
        
    ] ;
    protected $appends=[
        'service_image_url',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function schedule()
{
    return $this->hasOne(Schedule::class); 
}
public function invoice()
{
    return $this->hasMany(Invoice::class);
}
public function invoice_parameters()
{
    return $this->hasOne(InvoiceParameters::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class); 
}
public function ratings()
{
    return $this->hasMany(Rating::class); 
}
public function hasBeenSaved()
{
    return $this->hasMany(MyService::class); 
}
public function socialMediaAccounts()
{
    return $this->hasOne(SocialMediaAccount::class); 
}
    public function commune() {
        return $this->belongsTo(Communes::class);
    }
    public function type() {
        return $this->belongsTo(Type::class);
    }

 
    /**
     * get service image
     */
    public function getServiceImageUrlAttribute(){
        if($this->service_image){
            return Storage::disk('services/service-image')->url($this->service_image);
        }
        else{
            return asset('app-assets/images/noImage.JPG');
        }
    }
    public function likes() {
        return $this->belongsToMany(User::class);
    }
public function isLiked(){
    if(auth()->check() && Gate::allows('isClient')){
        return auth()->user()->likes->contains('id',$this->id);

    }}
   
    /**
     * has many coupon
     */
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
