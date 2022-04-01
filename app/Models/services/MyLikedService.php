<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\services\Service;

class MyLikedService extends Model
{
    use HasFactory;
    protected $table="service_user";
    protected $fillable=[
        'user_id',
        'service_id',
        'created_at',
        'updated_at'
    ] ;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function service() {
        return $this->belongsTo(Service::class);
    }
    public function likes() {
        return $this->belongsToMany(User::class);
    }
public function isLiked(){
    if(auth()->check() && allows('isClient')){
        return auth()->user()->likes->contains('id',$this->id);

    }
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
