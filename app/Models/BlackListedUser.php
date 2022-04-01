<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class BlackListedUser extends Model
{
    use HasFactory;
    protected $table="black_listed_users";
    protected $guarded=[];
    


    /**
     * get the user
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
