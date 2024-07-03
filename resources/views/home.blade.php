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
              <button type="button" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Exporter en PDF
              </button>
              <a href="{{route('export')}}">Download</a>
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
                <div class="row contacts">
                  <div class="col invoice-to">
                    <div class="text-gray-light">Délivré à:</div>
                    <h2 class="to">Mr/Mme: John Doe</h2>
                    <div class="address">
                      Francophonie, Niamey - Niger
                    </div>
                    <div class="address">
                      Tel: +227 00 00 00 00
                    </div>
                    <div class="email">
                      <a href="mailto:contact@bellehouseniger.com"><span class="__cf_email__" data-cfemail="cca6a3a4a28ca9b4ada1bca0a9e2afa3a1">Client@gmail.com</span></a>
                    </div>
                  </div>
                  <div class="designation">
                    <h1>FACTURE</h1>
                  </div>
                  <div class="col invoice-details">
                    <h1 class="invoice-id">Numéro de facture : BH/F021/2024/07</h1>
                    <div class="date">Date: <b>01/10/2018</b> </div>
                    <div class="date">Délai de validité: <b>30/10/2018</b> </div>
                  </div>
                </div>
                <table>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-left">Désignation</th>
                      <th class="text-right">Quantité</th>
                      <th class="text-right">Prix Unitaire HT</th>
                      <th class="text-right">Prix Total HT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="no">01</td>
                      <td class="text-left">
                        <h3>
                          <a target="_blank" href="javascript:;">
                            Youtube channel
                          </a>
                        </h3>
                        <a target="_blank" href="javascript:;">
                          Useful videos
                        </a>
                        to improve your Javascript skills. Subscribe and stay
                        tuned :)
                      </td>
                      <td class="unit">$0.00</td>
                      <td class="qty">100</td>
                      <td class="total">$0.00</td>
                    </tr>
                    <tr>
                      <td class="no">02</td>
                      <td class="text-left">
                        <h3>Website Design</h3>
                        Creating a recognizable design solution based on the
                        company's existing visual identity
                      </td>
                      <td class="unit">$40.00</td>
                      <td class="qty">03</td>
                      <td class="total">$1,200.00</td>
                    </tr>
                    <tr>
                      <td class="no">03</td>
                      <td class="text-left">
                        <h3>Website Development</h3>
                        Developing a Content Management System-based Website
                      </td>
                      <td class="unit">$40.00</td>
                      <td class="qty">80</td>
                      <td class="total">$3,200.00</td>
                    </tr>
                    <tr>
                      <td class="no">04</td>
                      <td class="text-left">
                        <h3>Search Engines Optimization</h3>
                        Optimize the site for search engines (SEO)
                      </td>
                      <td class="unit">$40.00</td>
                      <td class="qty">20</td>
                      <td class="total">$800.00</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2">Montant Total HT</td>
                      <td> <b>$6,500.00</b> </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2">TAX 25%</td>
                      <td> <b>$6,500.00</b> </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2">Montant Total TTC</td>
                      <td> <b>$6,500.00</b> </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2">Montant déjà versé</td>
                      <td> <b>$6,500.00</b> </td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <td colspan="2">Reste à payer</td>
                      <td> <b>$6,500.00</b> </td>
                    </tr>
                  </tfoot>
                </table>
                <div class="thanks">Merci!</div>
                <div class="notices">
                  <div class="title">NOTE Importante!</div>
                  <div class="notice">
                    <b> Mode de règlement </b> EN LIQUIDE <br>
                    <b>Conditions de règlement : </b>APRES LIVRAISON <br>
                    <b> Date limite de règlement :</b> 24H APRES LIVRAISON <br>
                  </div>
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