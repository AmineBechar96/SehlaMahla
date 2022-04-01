<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\Service;

class SocialMediaAccount extends Model
{
    protected $table="social_media_accounts";
    use HasFactory;
    protected $fillable=[
        'service_id',
        'gmail',
        'facebook',
        'linkedin',
        'instagram'
    ];
    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
