<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'number', 'echeance', 'client_name', 'client_quartier', 'client_city', 'client_country',
        'client_phone', 'client_mail', 'designation_title', 'designation_detail', 'quantity', 'unit_price',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
