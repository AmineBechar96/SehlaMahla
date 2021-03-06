<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat\Conversation;
use App\Models\User;
class Message extends Model
{
    use HasFactory;
protected $guarded=[];
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
