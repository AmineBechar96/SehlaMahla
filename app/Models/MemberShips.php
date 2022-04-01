<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MemberShips extends Model
{
    use HasFactory;
    protected $table="member_ships";
    protected $guarded=[];


    /**
     * get the user
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
