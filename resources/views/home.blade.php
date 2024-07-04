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
    <div class="card">
      <div class="card-body">
        <div id="invoice">
          <div class="toolbar hidden-print">
            <div class="text-end">
              {{-- <button type="button" class="btn btn-dark">
                  <i class="fa fa-print"></i> Print
                </button> --}}
              {{-- <button type="button" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Exporter en PDF
              </button> --}}
              {{-- <a href="{{route('export',$invoice->id)}}">Download</a> --}}
            </div>
            <hr />
          </div>
          <div class="invoice overflow-auto">
            <div class="header-div">
              <header>
                <div class="row">
                  <div class="col">
                    <a href="#">
                      <img src="assets/images/logo.png" width="130" height="100" alt="logo" />
                    </a>
                  </div>
                  <div class="col company-details">
                    <h2 class="name">
                      <a target="_blank" href="#"> Belle House</a>
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
            {{-- invoices list with buttons: show , download and display --}}
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title
                    ">Liste des Factures</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
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
                            <td>{{$invoice->created_at}}</td>
                            <td>
                              <a href="{{route('show', $invoice->id)}}" class="btn btn-primary">Show</a>
                              <a href="{{route('export', $invoice->id)}}" class="btn btn-success">Telecharger</a>
                              <a href="{{route('destroy', $invoice->id)}}" class="btn btn-info">Supprimer</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
              </main>
              <footer>
                Compte Ecobank: <b>160940732001</b> Compte Orabank: <b>76495401901 <br>
                  RCCM-NE-NIM-01-2017-A10-02845- NIF : 43391/Pl.</b>
              </footer>
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