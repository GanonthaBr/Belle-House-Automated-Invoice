<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link href="{{asset('images/logo.png')}}" rel="icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('style.css')}}" />
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                   
                    <div class="invoice overflow-auto">
                        <div class="header-div">
                            <header>
                                <div class="row">
                                    <div class="col">
                                        <a href="#">
                                            <img src="{{public_path('images/logo.png')}}" width="200" height="160" alt="logo" />
                                        </a>
                                    </div>
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
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">Délivré à:</div>
                                        <h2 class="to">{{$invoice->client_name}}</h2>
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
                                <table style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">Désignation</th>
                                            <th class="text-right">Quantité</th>
                                            <th class="text-right">Prix Unitaire HT (FCFA)</th>
                                            <th class="text-right">Prix Total HT (FCFA)</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        {{-- $blog->comments as $comment --}}
                                        @if ($invoice->items)
                                        @foreach ($invoice->items as $item)
                                        <tr>
                                            <td class="no">{{ $item->quantity }}</td>
                                            <td class="text-left">
                                                <h3><a target="_blank" href="javascript:;">{{$item->designation_title}}</a></h3>
                                                {{$item->designation_detail??''}}
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
                                        $isb = 0.02 * $totalBeforeTax;
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
            </div>
        </div>
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