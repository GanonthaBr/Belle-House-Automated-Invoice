<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Invoice;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Decharge;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;


class PDFExportController extends Controller
{
    public function export($id)
    {
        // set maximum execution time
        try {
            ini_set('max_execution_time', 3000);
            $invoiceData = Invoice::find($id); // Assuming you have an Invoice model
            if (!$invoiceData) {
                abort(404);
            }
            //get image path
            $imagePath = public_path('images/logo.png');
            $image = "data:image/png;base64," . base64_encode(file_get_contents($imagePath));

            $data = ['invoice' => $invoiceData, 'image' => $image];
            $pdf = PDF::loadView('pdf.invoice', $data);
            return $pdf->download('invoice.pdf');
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Une erreur est survenue');
        }
    }
    public function dechargepdf($id)
    {
        try {
            ini_set('max_execution_time', 3000);
            $dechargeData = Decharge::find($id); // Assuming you have an Invoice model
            if (!$dechargeData) {
                abort(404);
            }
            //get image path
            $imagePath = public_path('images/logo.png');
            $image = "data:image/png;base64," . base64_encode(file_get_contents($imagePath));
            $data = ['decharge' => $dechargeData, 'image' => $image];
            $pdf = PDF::loadView('pdf.decharge', $data);
            return $pdf->download('decharge.pdf');
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Une erreur est survenue');
        }
    }
    public function create()
    {
        return view('form');
    }
    //store
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'objet' => 'nullable',
                'number' => 'nullable',
                'echeance' => 'required',
                'client_name' => 'nullable',
                'client_quartier' => 'nullable',
                'client_city' => 'nullable',
                'client_country' => 'nullable',
                'client_phone' => 'nullable',
                'client_mail' => 'nullable',
                'montant_avanc' => 'nullable',
                'mode_paiment' => 'nullable',
                'tax' => 'nullable'
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
            //get the last added invoice and retrieve its number
            $lastInvoice = Invoice::latest()->first();
            $invoices = Invoice::all();

            // $lastInvoice->number = 21;
            $factures = [];
            $devis = [];
            if ($lastInvoice->name == 'Facture') {
                if ($request->name == 'Facture') {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Facture') {
                            $factures[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($factures);
                } else {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Devis') {
                            $devis[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($devis);
                }
            } else {
                if ($request->name == 'Facture') {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Facture') {
                            $factures[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($factures);
                } else {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Devis') {
                            $devis[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($devis);
                }
            }
            $lastInvoiceNumber = $lastInvoice ? $lastInvoice->number : 0;
            $number = $lastInvoiceNumber + 1;
            //create an instance of invoice and save to db
            $invoice = Invoice::create([
                'name' => request('name'),
                'number' => $number,
                'objet' => request('objet'),
                'mode_paiment' => request('mode-paiment'),
                'montant_avanc' => request('montant_avanc'),
                'echeance' => request('echeance'),
                'client_name' => request('client_name'),
                'client_quartier' => request('client_quartier'),
                'client_city' => request('client_city'),
                'client_country' => request('client_country'),
                'client_phone' => request('client_phone'),
                'client_mail' => request('client_mail'),
                'tax' => request('tax')
            ]);
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
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Une erreur est survenue',);
        }
    }
    //edit
    public function edit($id)
    {
        $invoice = Invoice::with('items')->find($id);
        if (!$invoice) {
            abort(404);
        }
        return view('edit', compact('invoice'));
    }
    //update
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'objet' => 'nullable',
                'number' => 'nullable',
                'echeance' => 'required',
                'client_name' => 'nullable',
                'client_quartier' => 'nullable',
                'client_city' => 'nullable',
                'client_country' => 'nullable',
                'client_phone' => 'nullable',
                'client_mail' => 'nullable',
                'montant_avanc' => 'nullable',
                'mode_paiment' => 'nullable'
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
            //get the last added invoice and retrieve its number
            $lastInvoice = Invoice::latest()->first();
            $invoices = Invoice::all();

            // $lastInvoice->number = 21;
            $factures = [];
            $devis = [];
            if ($lastInvoice->name == 'Facture') {
                if ($request->name == 'Facture') {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Facture') {
                            $factures[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($factures);
                } else {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Devis') {
                            $devis[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($devis);
                }
            } else {
                if ($request->name == 'Facture') {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Facture') {
                            $factures[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($factures);
                } else {
                    foreach ($invoices as $Invoice) {
                        if ($Invoice->name == 'Devis') {
                            $devis[] = $Invoice;
                        }
                    }
                    $lastInvoice = end($devis);
                }
            }
            $lastInvoiceNumber = $lastInvoice ? $lastInvoice->number : 0;
            $number = $lastInvoiceNumber + 1;
            $lastInvoice->number = $number;

            //create an instance of invoice and save to db
            $invoice = Invoice::find($id);
            $invoice->update([
                'name' => request('name'),
                'number' => $number,
                'objet' => request('objet'),
                'mode_paiment' => request('mode-paiment'),
                'montant_avanc' => request('montant_avanc'),
                'echeance' => request('echeance'),
                'client_name' => request('client_name'),
                'client_quartier' => request('client_quartier'),
                'client_city' => request('client_city'),
                'client_country' => request('client_country'),
                'client_phone' => request('client_phone'),
                'client_mail' => request('client_mail'),
            ]);

            //create item an store in the db, looping through all the items in the array
            $invoice->item()->delete();
            foreach ($items as $item) {
                $invoice->item()->create([
                    'designation_title' => $item['designation_title'],
                    'quantity' => $item['quantity'],
                    'designation_detail' => $item['designation_detail'],
                    'unit_price' => $item['unit_price'],
                ]);
            }
            return redirect()->route('show', ['id' => $invoice->id]);
        } catch (\Throwable $e) {
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
    // Decharge
    // public function decharge()
    // {
    //     $invoices = Invoice::all();
    //     return view('decharge', compact('invoices'));
    // }
    public function dechargeshow($id)
    {
        $decharge = Decharge::find($id);
        if (!$decharge) {
            abort(404);
        }
        return view('decharge', compact('decharge'));
    }
    public function createdecharge()
    {
        return view('dechargeform');
    }
    public function dechargestore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'nullable',
                'client_name' => 'nullable',
                'amout_received' => 'nullable',
                'motif' => 'nullable',
                'number' => 'nullable',
            ]);
            $lastDechargeNumber = 0;
            //get the last added invoice and retrieve its number
            $lastdecharge = Decharge::latest()->first();

            if ($lastdecharge) {
                $lastDechargeNumber = $lastdecharge->number;
            } else {
                $lastDechargeNumber = 7;
            }
            // $lastDechargeNumber = $lastdecharge ? $lastdecharge->number : 0;
            $number = $lastDechargeNumber + 1;
            $decharge = Decharge::create([
                'name' => request('name'),
                'client_name' => request('client_name'),
                'amout_received' => request('amout_received'),
                'motif' => request('motif'),
                'number' => $number,
            ]);
            return redirect()->route('dechargeshow', ['id' => $decharge->id]);
            // return redirect()->route('decharge')->with('message', "L'élément a été ajouté avec succès");
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Une erreur est survenue',);
        }
    }
    // delete
    public function deletedecharge($id)
    {
        $decharge = Decharge::find($id);
        if (!$decharge) {
            abort(404);
        }
        $decharge->delete();
        return redirect()->route('home')->with('message', "L'élément a été supprimé avec succès");
    }

    //edit
    public function editdecharge($id)
    {
        $decharge = Decharge::find($id);
        if (!$decharge) {
            abort(404);
        }
        return view('editdecharge', compact('decharge'));
    }
    //update
    public function updatedecharge(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'nullable',
                'client_name' => 'nullable',
                'amout_received' => 'nullable',
                'motif' => 'nullable',
                'number' => 'nullable',
            ]);
            $decharge = Decharge::find($id);
            $decharge->update([
                'name' => request('name'),
                'client_name' => request('client_name'),
                'amout_received' => request('amout_received'),
                'motif' => request('motif'),
            ]);
            return redirect()->route('dechargeshow', ['id' => $decharge->id]);
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Une erreur est survenue',);
        }
    }
}
