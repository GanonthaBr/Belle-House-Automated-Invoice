<?php

namespace App\Http\Controllers;

use App\Models\Decharge;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $decharges = Decharge::all();
        $invoices = Invoice::all();
        return view('home', ['items' => $items, 'decharges' => $decharges, 'invoices' => $invoices]);
    }
}
