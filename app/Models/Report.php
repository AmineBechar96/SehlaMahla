<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Events\AccountSuspended;

class Report extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $dispatchesEvents=[
      'created'=>AccountSuspended::class,
  ];


    /**
     * 
     */
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    /**
     * reporter
     */

    public function reporter()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * reported
     */
    
    public function reported()
    {
     return $this->belongsTo(User::class);
    }

}
