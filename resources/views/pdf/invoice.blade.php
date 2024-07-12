<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Favicon -->
    <link href="logo.png" rel="icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="public/style.css">-->
</head>
<style>
    body {
    font-family: "Roboto", sans-serif;
    margin-top: 10px;
    background-color: #f7f7ff;
}
.text-end a {
    color: #fff;
}
.company p {
    font-size: 12px;
    text-align: center;
}
.company-details span {
    font-size: 14px;
}
/* form */
.container {
    display: flex;
    justify-content: center;
    width: 100%;
    background-color: #fff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.container form {
    width: 100%;
    /* max-width: 600px; */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.mb-3 {
    width: 100%;
    margin-bottom: 1rem;
}
.itemField {
    width: 100%;
}

#invoice {
    padding: 0px;
}

.header-div {
    min-width: 600px;
}
.invoice {
    position: relative;
    background-color: #fff;
    min-height: 680px;
    padding: 15px;
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 10px;
    border-bottom: 1px solid #61a1d6;
}

.invoice .company-details {
    text-align: right;
}
.invoice .company-details .details {
    text-align: left;
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0;
}
.invoice .company-details .name a {
    color: #61a1d6;
}

.invoice .contacts {
    margin-bottom: 20px;
}

.invoice .invoice-to {
    text-align: left;
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0;
}

.invoice .invoice-details {
    text-align: right;
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #61a1d6;
    font-size: 16px;
}
.designation {
    font-size: 16px;
    text-align:center;
}
.designation h1 {
    padding: 3px 10px;
    border: 1px solid #61a1d6;
    margin-top: 0;
    color: #61a1d6;
}

.invoice main {
    padding-bottom: 50px;
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px;
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #61a1d6;
    background: #e7f2ff;
    padding: 10px;
}
.invoice main .notices .title {
    color: #61a1d6;
    text-decoration: underline;
}

.invoice main .notices .notice {
    font-size: 1em;
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
}

.invoice table td,
.invoice table th {
    padding: 5px;
    background: #eee;
    border-bottom: 1px solid #fff;
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 14px;
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #61a1d6;
    font-size: 16px;
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align:  center;
    font-size: 16px;
}

.invoice table .no {
    color: #fff;
    font-size: 16px;
    background: #61a1d6;
}

.invoice table .unit {
    background: #ddd;
}

.invoice table .total {
    background: #61a1d6;
    color: #fff;
}

.invoice table tbody tr:last-child td {
    border: none;
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 14px;
    border-top: 1px solid #aaa;
}

.invoice table tfoot tr:first-child td {
    border-top: none;
}
/*.card {*/
/*    position: relative;*/
/*    display: flex;*/
/*    flex-direction: column;*/
/*    min-width: 0;*/
/*    word-wrap: break-word;*/
/*    background-color: #fff;*/
/*    background-clip: border-box;*/
/*    border: 0px solid rgba(0, 0, 0, 0);*/
/*    border-radius: 0.25rem;*/
/*    margin-bottom: 1.5rem;*/
/*    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%),*/
/*        0 2px 6px 0 rgb(206 206 238 / 54%);*/
/*}*/

.invoice table tfoot tr:last-child td {
    color: #61a1d6;
    font-size: 14px;
    border-top: 1px solid #61a1d6;
}

.invoice table tfoot tr td:first-child {
    border: none;
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0;
}
/* footer span {
    font-size: 10px;
} */
@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important;
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always;
    }
    .invoice > div:last-child {
        page-break-before: always;
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #61a1d6;
    background: #e7f2ff;
    padding: 10px;
}
    .invoice .text-left p{
        font-size:14px;
    }
     .invoice .text-left h4{
          font-size:16px;
     }
.text-right{
    text-align: center;
}
.info{
    width:100%;
    /*display:flex;*/
    flex-direction: column;
    justify-content: space-between;
}
.info .col{
    width:50%;
}
th{
    font-weight:bold;
}
.header-content table td,
.header-content table th {
    padding: 5px;
    background: #fff important!;
    border-bottom: 1px solid #fff;
}
</style>
<body>
    <div class="">
        <!--<div class="card">-->
        <!--    <div class="card-body">-->
                <div id="">
                   
                    <div class="invoice overflow-auto">
                        <div class="header-div">
                            <header class="header-content" >
                                <table >
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;" ></th>
                                            <th style="width: 60%;" ></th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <tr>
                                            <td>
                                            <div class="col">
                                              <a href="#">
                                            <!--src="{{ public_path('assets/fotoKue/kue-fazril.jpg') }}"-->
                                                <img src="{{$image}}" width="150" height="120" alt="logo" />
                                              </a>
                                            </div>
                                            </td>
                                            <td>
                                                <div class="col company-details">
                                      
                                        <h2 class="name">
                                            <a target="_blank" href="#">  <b>BELLE HOUSE</b> </a>
                                        </h2>
                                        <span>ENTREPRISE DE CONSTRUCTION MODERNE</span>
                                        <div>Adresse : <b>Bobiel Niamey-Niger</b> </div>
                                        <div>Numéro de téléphone : <b>+227 92 08 05 05</b> </div>
                                        <div class="email">Email:
                                            <a href="mailto:contact@bellehouseniger.com"><span class="__cf_email__" data-cfemail="cca6a3a4a28ca9b4ada1bca0a9e2afa3a1">Contact@bellehouseniger.com</span></a>
                                        </div>
                                        <div class="email">Site Web:
                                            <a href="www.bellehouseniger.com"><span class="__cf_email__"> <b>bellehouseniger.com</b> </span></a>
                                        </div>
                                    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">Délivré à:</div>
                                        <h3 class="to">{{$invoice->client_name}}</h3>
                                        <div class="address">
                                            {{$invoice->client_quartier}} , {{$invoice->client_city ?? 'Niamey' }} - {{$invoice->client_country ?? 'Niger' }}
                                        </div>
                                        <div class="address">
                                            Tel: {{$invoice->client_phone}}
                                        </div>
                                        <div class="email">
                                            <a href="{{'mailto:'. $invoice->client_mail}}"><span class="__cf_email__" data-cfemail="cca6a3a4a28ca9b4ada1bca0a9e2afa3a1">{{$invoice->client_mail ??''}}</span></a>
                                        </div>
                                    </div>
                                    <div class="designation">
                                        <h1>{{$invoice->name == 'Devis'?'Facture Proforma': 'Facture'}}</h1>
                                    </div>
                                    <div class="col invoice-details">
                                        <h1 class="invoice-id">Numéro de facture : BH/{{$invoice->name=="Facture"?'F':'D'}}0{{intval($invoice->number)}}/{{date('Y',strtotime($invoice->created_at))}}/{{$invoice->created_at->format('m')}}</h1>
                                        <div class="date">Date: <b>{{$invoice->created_at->format('d/m/Y')}}</b> </div>
                                        @if ($invoice->name == "Devis")
                                            <div class="date">Délai de validité: <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $invoice->echeance)->format('d/m/y') }}</b> </div>
                                        @endif
                                    </div>
                                </div>
                                <table style="width: 100%; table-layout: fixed; ">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;" >#</th>
                                            <th class="text-left" style="width: 40%; font-weight:bold" >Désignation</th>
                                            <th class="text-right" style="width: 15%; font-weight:bold " >Quantité</th>
                                            <th class="text-right" style="width: 20%; font-weight:bold " >Prix Unitaire HT <br> (FCFA)</th>
                                            <th class="text-right" style="width: 20%; font-weight:bold " >Prix Total HT <br> (FCFA)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($invoice->items)
                                        @foreach ($invoice->items as $item)
                                        <tr>
                                            <td class="no">{{ $item->quantity }}</td>
                                            <td class="text-left" style="min-width: 500px;">
                                                <h4>{{$item->designation_title}}</h4>
                                                <p>{{$item->designation_detail??''}}</p>
                                            </td>
                                            <td class="qty">{{$item->quantity}}</td>
                                            <td class="unit"> {{ number_format($item->unit_price, 0, '.', ' ') }}</td>
                                            <td class="total"> {{ number_format($item->unit_price * $item->quantity, 0, '.', ' ') }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <!-- Do the maths -->
                                        @php
                                        $totalBeforeTax = 0;
                                        @endphp
                                        @foreach ($invoice->items as $item)
                                        @php
                                        $totalBeforeTax += $item->unit_price * $item->quantity;
                                        @endphp
                                        @endforeach
                                        @php
                                        $isb = 0;
                                        if($invoice->taxe){
                                            $isb = 0.02 * $totalBeforeTax;
                                        }
                                
                                        $totalAfterTax = $totalBeforeTax - $isb;
                                        $restToPay = $totalAfterTax - $invoice->montant_avanc;
                                        @endphp
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Montant Total HT</td>
                                            <td> {{ number_format($totalBeforeTax, 0, '.', ' ') }} <b> FCFA</b> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">ISB 2%</td>
                                            <td> <b>  {{ number_format($isb, 0, '.', ' ') }} FCFA</b> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Montant Total TTC</td>
                                            <td> {{ number_format($totalAfterTax, 0, '.', ' ') }} FCFA</b> </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Montant déjà versé</td>
                                            <td> <b>{{$invoice->montant_avanc ?? 0}}</b> </td>
                                        </tr> --}}
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Net à payer</td>
                                            <td> <b> {{ number_format($restToPay, 0, '.', ' ') }} FCFA</b> </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="thanks">Merci!</div>
                                <div class="notices">
                                    <div class="title">NOTE Importante!</div>
                                    <div class="notice">
                                        <b> Mode de règlement </b> {{$invoice->mode_paiment}} <br>
                                        {{-- <b>Conditions de règlement : </b>APRES LIVRAISON <br>
                                        <b> Date limite de règlement :</b> 24H APRES LIVRAISON <br> --}}
                                    </div>
                                </div>


                            </main>
                            <footer>
                               <span> Compte Ecobank: <b>160940732001</b> Compte Orabank: <b>76495401901 </b>Compte BIA:  <b>61001260006</b></span> <br>
                                    RCCM-NE-NIM-01-2017-A10-02845- NIF : 43391/P.</b>
                            </footer>
                        </div>


                    </div>
                </div>
        <!--    </div>-->
        <!--</div>-->
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const exportPdfButton = document.querySelector('.btn-danger');
            exportPdfButton.addEventListener('click', function() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();

                // Assuming you want to capture the entire document body. Adjust selector as needed.
                doc.html(document.querySelector('#invoice'), {
                    callback: function(doc) {
                        doc.save('invoice.pdf');
                    },
                    x: 10,
                    y: 10
                });
            });
        });
    </script>
</body>

</html>