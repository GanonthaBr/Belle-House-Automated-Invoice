<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
                    <input class="form-check-input" type="radio" name="name" id="facture" value="Facture">
                    <label class="form-check-label" for="facture">
                        Facture
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="name" id="Devis" value="Devis" checked>
                    <label class="form-check-label" for="Devis">
                        Devis
                    </label>
                </div>
                <div class="mb-3">
                    <label for="echeance" class="form-label">Echeance:</label>
                    <input type="date" class="form-control" name="echeance" id="echeance">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Numero de Facture:</label>
                    <input type="text" class="form-control" name="number" id="number">
                </div>
                <div class="mb-3">
                    <label for="montant_avanc" class="form-label">Montant avancé:</label>
                    <input type="text" class=" form-control" name="montant_avanc" id="montant_avanc">
                </div>
            </fieldset>
            <fieldset>
                <legend>Liste des Elements</legend>
                <div id="itemFieldsContainer">
                    <div class="itemField">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="itemNames[]" placeholder="Designation">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="itemDetails[]" placeholder="Details">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemQuantities[]" placeholder="Quantity">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="itemPrices[]" placeholder="Price">
                        </div>
                        <button type="button" onclick="removeItemField(this)">Remove</button>
                    </div>
                </div>
                <button type="button" id="addItemField">Add Item</button>
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
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
                            <input type="text" class="form-control" name="itemDetails[]" placeholder="Details">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="itemQuantities[]" placeholder="Quantity">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="itemPrices[]" placeholder="Price">
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