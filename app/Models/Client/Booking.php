<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\services\Service;
use App\Models\Provider\Client;
use App\Models\Report;


class Booking extends Model
{
    protected $table="bookings";

    use HasFactory;
    protected $fillable=[
    'user_id',
    'service_id',
    'title',
    'address',
    'status',
    'booking_time',
    'booking_date',
    'description'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function lastBooking($user_id,$service_id)
    {
        $number_of_booking=Booking::where('user_id', $user_id)->where('service_id', $service_id)->
        where('status','!=','rejected')->count();
        return $number_of_booking;
    }

//check if the booker have a bad history
    public function is_reported($id)
    {
    $flag=Report::where('reported_id',$id)->where('reporter_id',auth()->user()->id)->first();
    if($flag){
        return true;
    }
    else{
        return false;
    }

    }


    /**
     * check if the booker is already a client
     */
    public function checkBooker()
    {
        $client=Client::where('service_id',$this->service_id)->where('user_id',$this->user_id)->first();
        if($client){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * status color
     */
    public function bookingStatusColor(String $status)
    {
        if($status==="pending")
        return "text-warning";
        elseif($status==="accepted")
        return "text-info";
        elseif($status==="ongoing")
        return "text-primary";
        elseif($status==="completed")
        return "text-success";
        elseif($status==="canceled")
        return "text-danger";
        else
        return "text-danger";
    }
}
