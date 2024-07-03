<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PDFExportController extends Controller
{
    public function export()
    {
        $view = view('home')->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
        // Or ->stream() to display inline
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'echeance' => 'required',
            'client_name' => 'nullable',
            'client_quartier' => 'nullable',
            'client_city' => 'nullable',
            'client_country' => 'nullable',
            'client_phone' => 'nullable',
            'client_mail' => 'nullable',

        ]);

        $items = [];
        for ($i = 0; $i < count(request('itemNames')); $i++) {
            $items[] = [
                'designation_title' => request('itemNames')[$i],
                'quantity' => request('itemQuantities')[$i],
                'designation_detail' => request('itemQuantities')[$i],
                'unit_price' => request('itemPrices')[$i],
            ];
        }
    }
}
