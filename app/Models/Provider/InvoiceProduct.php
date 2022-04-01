<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider\Invoice;

class InvoiceProduct extends Model
{
    use HasFactory;
    protected $table="invoice_product";
    protected $guarded=[];
public function invoice()
{
    return $this->belongsTo(Invoice::class);
}
}
