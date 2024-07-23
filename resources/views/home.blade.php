<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>{{config('app.name')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon -->
  <link href="{{asset('assets/images/logo.png')}}" rel="icon" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    {{-- header with logo, short description text, company name  --}}
    <div class="header">
      <div class="logo">
        <img src="{{asset('images/logo.png')}}" alt="logo" height="80" width="120"/>
      </div>
      <div class="company">
        <p>ENTREPRISE DE CONSTRUCTION MODERNE</p>
        <h2>Facturation</h2>
      </div>
  </div>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div id="invoice">
          <div class="toolbar hidden-print">
            <div class="text-end">
              
            </div>
            <hr />
          </div>
          <div class="invoice overflow-auto">
            <div class="header-div">
            
              <main>
            {{-- invoices list with buttons: show , download and display --}}
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    {{-- session message in a card --}}
                    @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    <h4 class="card-title
                    ">Liste des Factures</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if ($invoices->count()>0)
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Type</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($invoices as $invoice)
                          <tr>
                            <td>{{$invoice->name}}</td>
                            <td>{{$invoice->client_name}}</td>
                            <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                            <td>
                              <a href="{{route('show', $invoice->id)}}" class="btn btn-primary">Afficher</a>
                              <a href="{{route('export', $invoice->id)}}" class="btn btn-success">Télécharger</a>
                              <a href="{{route('delete', $invoice->id)}}" class="btn btn-info">Supprimer</a>
                            </td>
                          </tr>
                          @endforeach
                          @foreach ($decharges as $decharge)
                              <tr>
                                <td>Decharge</td>
                                <td>{{$decharge->client_name}}</td>
                                <td>{{ $decharge->created_at->format('d/m/Y') }}</td>
                                <td>
                                  <a href="{{route('dechargeshow', $decharge->id)}}" class="btn btn-primary">Afficher</a>
                                  <a href="{{route('dechargepdf', $decharge->id)}}" class="btn btn-success">Télécharger</a>
                                  <a href="{{route('deletedecharge', $decharge->id)}}" class="btn btn-info">Supprimer</a>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @else
                      <div class="alert alert-info">Aucune facture n'est Disponible</div>
                      @endif
                      {{-- add new record--}}
                      <div class="row">
                        <div class="col-md-6">
                          <a href="{{route('create')}}" class="btn btn-primary">Ajouter une nouvelle facture</a>
                        </div>
                        <div class="col-md-6">
                           <a href="{{route('createdecharge')}}" class="btn btn-primary">Ajouter une decharge</a>
                        </div>
                      </div>
                    </div>
              </main>
             
            </div>

            <div></div>
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