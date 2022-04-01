<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Provider\Invoice;

class InvoiceParameters extends Model
{
    use HasFactory;
    protected $table="invoice_parameters";
    protected $guarded=[];
    
    public function provider()
{
    return $this->hasOne(User::class);
}

public function invoice()
{
    return $this->hasMany(Invoice::class);
}
}
