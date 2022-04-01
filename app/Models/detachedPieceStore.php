<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detachedPieceStore extends Model
{
    protected $table='detached_pieces';
    use HasFactory;
    public function commune() {
        return $this->belongsTo('App\Models\Communes');
    }
}
 