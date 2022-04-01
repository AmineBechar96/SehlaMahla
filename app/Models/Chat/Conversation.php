<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat\Message;
use App\Models\Client\Booking;

use App\Models\User;


class Conversation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function isClient($id)
    {
        $user=User::findOrFail($id);
        if($user->role=="Client"){
            return true;
        }
        else{
            return false;
        }
    }
}
