<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class PDFExportController extends Controller
{
    public function export($id)
    {
        $invoice = Invoice::find($id);
        $view = view('details', compact('invoice'))->render();

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
        try {
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
                'montant_avanc' => 'required',
            ]);

            //contruct array of item details
            $items = [];
            for ($i = 0; $i < count(request('itemNames')); $i++) {
                $items[] = [
                    'designation_title' => request('itemNames')[$i],
                    'quantity' => request('itemQuantities')[$i],
                    'designation_detail' => request('itemDetails')[$i],
                    'unit_price' => request('itemPrices')[$i],
                ];
            }

            //create an instance of invoice and save to db
            $invoice = Invoice::create([
                'name' => request('name'),
                'number' => request('number'),
                'montant_avanc' => request('montant_avanc'),
                'echeance' => request('echeance'),
                'client_name' => request('client_name'),
                'client_quartier' => request('client_quartier'),
                'client_city' => request('client_city'),
                'client_country' => request('client_country'),
                'client_phone' => request('client_phone'),
                'client_mail' => request('client_mail'),
            ]);
            // dd($request->all());
            //create item an store in the db, looping through all the items in the array
            foreach ($items as $item) {
                $invoice->item()->create([
                    'designation_title' => $item['designation_title'],
                    'quantity' => $item['quantity'],
                    'designation_detail' => $item['designation_detail'],
                    'unit_price' => $item['unit_price'],
                ]);
            }
            return redirect()->route('show', ['id' => $invoice->id]);
        } catch (ValidationException $e) {
            dd($e);
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('home')->with('error', 'Une erreur est survenue',);
        }
    }

    public function show($id)
    {
        $invoice = Invoice::with('items')->find($id);
        if (!$invoice) {
            abort(404);
        }
        return view('details', compact('invoice'));
    }
    //delete
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            abort(404);
        }
        $invoice->delete();
        return redirect()->route('home')->with('message', "L'élément a été supprimé avec succès");
    }
}
