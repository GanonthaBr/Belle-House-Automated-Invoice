<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Decharge</title>
        {{-- Favicon --}}
        <link href="{{asset('images/logo.png')}}" rel="icon" />
        <link rel="stylesheet" href="{{asset('stylesheet.css')}}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Playwrite+CL:wght@100..400&display=swap"
            rel="stylesheet"
        />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    </head>
    <body>
        <div class="receipt">
            <div class="toolbar hidden-print">
                        <div class="text-end">
                            <a type="button" href="{{route('home')}}" class="btn btn-dark">
                                <i class="fa fa-print"></i> Retour
                            </a>
                            <a type="button" href="{{route('dechargepdf',$decharge->id)}}" class="btn btn-danger">
                                <i class="fa fa-file-pdf-o"></i> Exporter en PDF
                            </a>
                            <a type="button" href="{{route('editdecharge',$decharge->id)}}" class="btn btn-info">
                                <i class="fa fa-file-pdf-o"></i> Modifier
                            </a>

                        </div>
                        <hr />
                    </div>
            <div class="header">
                <div class="logo">
                    <img src="{{asset('images/logo.png')}}" alt="Belle House Logo" />
                </div>
                <div class="company-details">
                    <h1>BELLE HOUSE CONSTRUCTION MODERNE</h1>
                    <p>
                        Architecture-Ingénierie-Design- Maçonnerie- Consulting
                        BTP - Ferraillage Coffrage-Electricité-Plomberie
                    </p>
                    <p>
                        Staff- Carrelage-Vitrage- Soudure- Menuiserie-
                        Photographie Bâtiment- Aménagement- Jardinage
                    </p>
                    <p>
                        Email: <a href="mailto@contact@bellehouseniger.com ">contact@bellehouseniger.com </a>| Site:
                       <a href=" www.bellehouseniger.com"> www.bellehouseniger.com</a>
                    </p>
                    <p class="rccm-nif" >RCCM-NI-NIA-2017-A-2845 NIF: 43391/P</p>
                </div>
            </div>
            <div class="receipt-details">
                <div class="number">
                    <p>Reçu N<sup>o</sup> {{$decharge->number}} </p>
                </div>
                <div class="date">
                    <p>Niamey le <b>{{$decharge->created_at->format('d/m/Y')}}</b></p>
                </div>
            </div>
            <div class="body">
                <p>
                    Je soussigné <strong>Mr AGABA Moussa,</strong> Directeur Général à Belle
                    House,atteste avoir reçu une somme de
                    <strong> {{$decharge->amout_received}} FCFA</strong> de Mr/Mme <strong> {{$decharge->client_name}} </strong> pour
                    <strong> {{$decharge->motif}} </strong>.
                </p>
            </div>
            <div class="bottom">
            <div class="footer">
                <div class="roboto-light-italic signature">
                    <div class="">Fait pour servir et valoir ce que de droit</div>
                </div>
                <div class="contact">
                    <div> <b>+227 92 08 50 50</b> </div><div> <b>+227 99 08 50 50</b> </div>
                </div>
               
            </div>
            <div class="stamp"></div>
             <i> <u>Signature:</u> </i>
            </div>
        </div>
    </body>
</html>
