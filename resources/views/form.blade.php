<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('public/style.css')}}"/>
    <!-- Favicon -->
    <link href="{{asset('public/images/logo.png')}}" rel="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Formulaire de Facturation</h1>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start p-md-4">
        <a class="btn btn-primary me-md-2" href="{{route('home')}}" type="button">
            < Retour </a>
    </div>
    <div class="container">
        <form action="{{route('store')}}" method="post">

            @csrf

            <fieldset>

                <legend>Informations du client</legend>

                <div class="mb-3">

                    <label for="client_name" class="form-label">Nom</label>

                    <input type="text" class="form-control" name="client_name" id="client_name">

                </div>

                <div class="mb-3">

                    <label for="client_quartier" class="form-label">Quartier:</label>

                    <input type="text" class="form-control" name="client_quartier" id="client_quartier">

                </div>

                <div class="mb-3">

                    <label for="client_city" class="form-label">Ville:</label>

                    <input type="text" class="form-control" name="client_city" id="client_city">

                </div>

                <div class="mb-3">

                    <label for="client_country" class="form-label">Pays:</label>

                    <input type="text" class="form-control" name="client_country" id="client_country">

                </div>

                <div class="mb-3">

                    <label for="client_phone" class="form-label">Telephone:</label>

                    <input type="text" class="form-control" name="client_phone" id="client_phone">

                </div>

                <div class="mb-3">

                    <label for="client_mail" class="form-label">Email:</label>

                    <input type="text" class="form-control" name="client_mail" id="client_mail">

                </div>

            </fieldset>

            <fieldset>

                <legend>Informations de la Facture</legend>



                <div class="form-check">

                    <label for="name" class="form-label"> <b>Type:</b> </label> <br>



                    <input class="form-check-input" type="radio" name="name" id="facture" value="Facture" required>

                    <label class="form-check-label" for="facture">

                        Facture

                    </label>

                </div>
                 

                <div class="form-check">

                    <input class="form-check-input" type="radio" name="name" id="Devis" value="Devis" checked required>

                    <label class="form-check-label" for="Devis">

                        Facture Proforma

                    </label>

                </div>
                <div class="form-check">
                    <lable class="form-label" for="objet" >
                        <b>Objet:</b>
                    </lable>
                    <input type="text" class="form-control" name="objet" id="objet" required>
                </div>
                <div class="form-check">
                    <label for="mode-paiment" class="form-label"> <b>Mode de Paiement</b> </label> <br>
                    <input class="form-check-input" type="radio" name="mode-paiment" id="en_liquide" value="En ESPÈCES" required>
                    <label class="form-check-label" for="en_liquide"> En ESPÈCES</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode-paiment" id="par_banque" value="PAR VERSEMENT" required>
                    <label class="form-check-label" for="par_banque"> PAR VERSEMENT</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="mode-paiment" id="par_banque" value="PAR CHEQUE" checked required>
                    <label class="form-check-label" for="par_banque"> PAR CHEQUE</label>
                </div>
                <div class="mb-3">

                    <label for="echeance" class="form-label">Echeance:</label>

                    <input type="date" class="form-control" name="echeance" id="echeance" required>

                </div>

                <div class="form-check">
                    <label for="mode-paiment" class="form-label"> <b>Section Taxe</b> </label> <br>
                    <input type="radio" id="tax" name="tax" class="form-check-input" value="oui" checked required>
                    <label class="form-check-label" for="tax">OUI</label>
                </div>
                 <div class="form-check">
                    <input class="form-check-input" type="radio" name="tax" id="par_banque" value="non" required>
                    <label class="form-check-label" for="par_banque">NON</label>
                </div>

                {{-- <div class="mb-3">

                    <label for="number" class="form-label">Numero de Facture:</label>

                    <input type="text" class="form-control" name="number" id="number">

                </div> --}}
 
                {{-- <div class="mb-3">

                    <label for="montant_avanc" class="form-label">Montant avancé:</label>

                    <input type="text" class=" form-control" name="montant_avanc" id="montant_avanc">

                </div> --}}

            </fieldset>

            <fieldset>

                <legend>Liste des Elements</legend>

                <div id="itemFieldsContainer">

                    <div class="itemField">

                        <div class="mb-3">

                            <input type="text" class="form-control" name="itemNames[]" placeholder="Designation" required>

                        </div>

                        <div class="mb-3">

                            <input type="text" class="form-control" name="itemDetails[]" placeholder="Bref details Details" required>

                        </div>

                        <div class="mb-3">

                            <input type="number" class="form-control" name="itemQuantities[]" placeholder="Quantity" required>

                        </div>

                        <div class="mb-3">

                            <input type="number" class="form-control" name="itemPrices[]" placeholder="Prix Unitaire" required>

                        </div>

                        <button type="button" onclick="removeItemField(this)">Remove</button>

                    </div>

                </div>

                <button type="button" id="addItemField">Ajouter un Element</button>

            </fieldset>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>
    <script>
        document.getElementById('addItemField').addEventListener('click', function() {
            const container = document.getElementById('itemFieldsContainer');
            const newItemField = document.createElement('div');
            newItemField.classList.add('itemField');
            newItemField.innerHTML = `
       <div class="mb-3">
                            <input type="text" class="form-control" name="itemNames[]" placeholder="Designation">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="itemDetails[]" placeholder="Bref details Details">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemQuantities[]" placeholder="Quantity">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemPrices[]" placeholder="Prix Unitaire">
                        </div>
        <button type="button" onclick="removeItemField(this)">Remove</button>
    `;
            container.appendChild(newItemField);
        });
        function removeItemField(button) {
            button.parentElement.remove();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>