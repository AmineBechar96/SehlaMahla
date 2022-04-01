<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\services\Service;
use App\Models\Provider\Client;

class MyService extends Model
{
    use HasFactory;
    protected $table="my_services";
    protected $fillable=[
        'user_id',
        'service_id',
    ] ;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function subscriber()
    {
        return $this->belongsTo(User::class);
    }
    public function service() {
        return $this->belongsTo(Service::class);
    }

     /**
     * check if the booker is already a client
     */
    public function checkUser($service_id, $id)
    {
        $client=Client::where('service_id',$service_id)->where('user_id',$id)->first();
        if($client){
            return true;
        }
        else{
            return false;
        }
    }
}
