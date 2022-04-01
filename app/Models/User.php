<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Point;
use App\Models\services\Service;
use App\Models\services\MyService;
use App\Models\Client\Booking;
use App\Models\Provider\Invoice;
use App\Models\Provider\Client;
use App\Models\MemberShips;
use App\Models\BlackListedUser;
use App\Models\Provider\InvoiceParameters;
use App\Models\services\MyLikedService;
use Illuminate\Support\Facades\Auth ;
use Carbon\Carbon;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

/**
 *   user has a points
 * 
 */
public function points()
{
    return $this->hasOne(Point::class);
}
public function bookings()
{
    return $this->hasMany(Booking::class);
}
public function service() {
    return $this->hasMany(Service::class);
}

public function savedService() {
    return $this->belongsToMany(MyService::class);
}

public function likes() {
    return $this->belongsToMany(Service::class);
}

//current year activity for client
public function BookingHistoryCurrent(){
    $bookingPerMonth= array();

for ($i=1; $i < 13 ; $i++) { 
   $booking = Booking::where('user_id',auth()->user()->id)
         ->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)
         ->where('status','completed')
         ->count();
         $BookingPerMonth[$i]=$booking;
}
         
    
  return $BookingPerMonth;
 }

 //last year activity for client
 public function BookingHistoryLast(){
    $bookingPerMonth= array();

for ($i=1; $i < 13 ; $i++) { 
   $booking = Booking::where('user_id',auth()->user()->id)
         ->whereYear('created_at', Carbon::now()->subYear()->year)->whereMonth('created_at', $i)
         ->where('status','completed')
         ->count();
         $BookingPerMonth[$i]=$booking;
}
         
    
  return $BookingPerMonth;
 }

 //current year total sales for provider
public function currentYearSales()
{
    $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
    $salesPerMonth= array();
    if ($parameters) {
    for ($i=1; $i < 13 ; $i++) {
        
        
        $sales=Invoice::where('parmeter_id',$parameters->id)->where('status','paid')
        ->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)
        ->sum('total');
        $salesPerMonth[$i]=$sales;
    }
             
        
      return $salesPerMonth;
}
else{
    return $salesPerMonth;
}
}
//last year total sales for provider
public function lastYearSales()
{
    $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
    $salesPerMonth= array();
    if ($parameters) {
    for ($i=1; $i < 13 ; $i++) {
        
        
        $sales=Invoice::where('parmeter_id',$parameters->id)->where('status','paid')
        ->whereYear('created_at', Carbon::now()->subYear()->year)->whereMonth('created_at', $i)
        ->sum('total');
        $salesPerMonth[$i]=$sales;
    }
             
        
      return $salesPerMonth;
}
else{
    return $salesPerMonth;
}
}

/**
 * user reports
 */
public function reports()
{
    return $this->hasMany(Report::class);
}
/**
 * user reports
 */
public function reported()
{
    $report=Report::where('reported_id',$this->id)->count();
    return $report;
}
   
/**
 * get the user membership status
 */
 function memberships()
 {
    return $this->hasOne(MemberShips::class);
 }

 /**
  * black listed users
  */
  public function blacklisted()
  {
      return $this->hasOne(BlackListedUser::class);
  }



  /**
   * get the user activity status online/ofline
   */

   public function isOnline()
   {
       return Cache::has('user-is-online-' . $this->id);
   }
   
}
