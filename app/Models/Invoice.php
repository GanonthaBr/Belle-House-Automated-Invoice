<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'number', 'echeance', 'client_name', 'client_quartier', 'client_city', 'client_country',
        'client_phone', 'client_mail',  'tax', 'objet', 'designation_title', 'mode_paiment', 'designation_detail', 'quantity', 'unit_price', 'montant_avanc'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
