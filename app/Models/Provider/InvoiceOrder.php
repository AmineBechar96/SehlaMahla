<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider\Invoice;
use App\Models\Provider\Product;

class InvoiceOrder extends Model
{
    use HasFactory;
    protected $table="invoice_orders";
    protected $guarded=[];
public function invoice()
{
    return $this->belongsTo(Invoice::class);
}
public function product()
{
    return $this->hasMany(Product::class);
}
}
