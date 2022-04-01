<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;
    protected $table="motifs";
    protected $fillable=[
    'user_id',
    'booking_id',
    'status',
    'description']
    ;
}
