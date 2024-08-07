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
        $invoices = Invoice::orderBy('created_at', 'desc')->take(10)->get();
        $decharges = Decharge::orderBy('created_at', 'desc')->take(10)->get();

        return view('home', ['items' => $items, 'decharges' => $decharges, 'invoices' => $invoices]);
    }
    public function top_10_invoices()
    {

        // last 10 added decharges
        $items = Item::all();
        $invoices = Invoice::all();
        $decharges = Decharge::all();
        return view('secondary_page', ['invoices' => $invoices, 'decharges' => $decharges]);
    }
}
