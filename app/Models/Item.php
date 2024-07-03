<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id', // Assuming each item belongs to an invoice
        'designation_title',
        'quantity',
        'designation_detail',
        'unit_price',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
