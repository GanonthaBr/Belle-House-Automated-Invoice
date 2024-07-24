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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CL:wght@100..400&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<style>
    body {
        font-family: "Roboto", sans-serif;
        font-weight: 400;
        font-style: normal;
        background-color: #f8f8f8;
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
        width: 100%;
        margin: 0;
    }

    .receipt {
        background: #ffffff;
        padding: 20px;
        border: 1px dashed #61a1d6;
        width: 100%;
        height: 100dvh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header,
    .footer {
        text-align: center;
    }

    .header {
        margin-bottom: 10px;
        height: 100px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .logo img {
        width: 140px;
    }

    .company-details h1 {
        text-align: center;
        font-size: 22px;
        color: #61a1d6;
        border: 1px solid #61a1d6;
    }

    .company-details {
        text-align: center;
    }

    .roboto-light-italic {
        font-family: "Roboto", sans-serif;
        font-weight: 300;
        font-style: italic;
        color: #61a1d6;
    }

    .company-details p {
        margin: 2px 0;
        font-size: 12px;
    }

    .company-details a {
        color: #000;
        text-decoration: none;
        font-weight: bold;

    }

    .rccm-nif {
        letter-spacing: 2px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .receipt-details {
        height: 20px;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: 20px;
        margin-top: 20px;
        font-size: 14px;
        /* background: red; */
    }

    .body {
        font-family: "Playwrite PE", cursive;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .body strong {
        font-weight: bold;
    }

    .footer {
        margin-top: 10px;
        padding: 0;

    }

    .footer .contact {
        margin: 10px 0;
        height: 50px;
        font-size: 14px;
        display: flex;
        flex-direction: column;
        /* justify-content: flex-start; */
        align-items: flex-start;
    }

    .bottom {
        margin-top: 40px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        /* align-items: center; */
    }

    .stamp {
        margin-left: 1rem;
    }
</style>

<body>
    <div class="receipt">

        <div class="header">
            <table>
                <tr>
                    <th style="width: 40%;"></th>

                    <th style="width: 60%;"></th>>
                </tr>
                <tr>
                    <td>
                        <div class="logo">
                            <img src="{{$image}}" alt="Belle House Logo" />
                        </div>
                    </td>
                    <td>
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
                            <p class="rccm-nif">RCCM-NI-NIA-2017-A-2845 NIF: 43391/P</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="receipt-details">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80%;"></th>
                        <th style="width: 20%;"></th>>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>

                            <div class="number">
                                <p>Reçu N<sup>o</sup> {{$decharge->number}} </p>
                            </div>
                        </td>

                        <td>

                            <div class="date" style="margin-left: 25rem;">
                                <p>Niamey le <b>{{$decharge->created_at->format('d/m/Y')}}</b></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <table style="width: 100%;">
                <tr>
                    <!-- <th style="width: 50%;"></th>
                    <th style="width: 50%;"></th>> -->
                </tr>
                <tr>
                    <td>
                        <div class="footer">
                            <div class="roboto-light-italic signature">
                                <div class="">Fait pour servir et valoir ce que de droit</div>
                            </div>
                            <div class="contact">
                                <div> <b>+227 92 08 50 50</b> </div>
                                <div> <b>+227 99 08 50 50</b> </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <div class="stamp">
                            <i> <u>Signature:</u> </i>
                        </div>
                    </td>
                </tr>
            </table>



        </div>
    </div>
</body>

</html>