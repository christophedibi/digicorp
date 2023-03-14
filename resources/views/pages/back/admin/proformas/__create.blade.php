@extends('pages.back.admin.master',['titre'=>'CREER PROFORMA'])
@section('admin-content')
    <h1>Ajouter une proforma</h1>

    <form method="POST" action="{{ route('proformas.store') }}">
        @csrf

        <div class="form-group">
            <label for="client_id">Client :</label>
            <select class="form-control" id="client_id" name="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} ({{ $client->email }})</option>
                @endforeach
            </select>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td><input type="checkbox" name="produits[]" value="{{ $produit->id }}"></td>
                        <td>{{ $produit->designation }}</td>
                        <td>{{ $produit->prix_vente }} FCFA</td>
                        <td><input type="number" class="form-control quantite" name="quantite[{{ $produit->id }}]" value="0"></td>
                        <td data-prix-total="{{ $produit->id }}">0.00 FCFA</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><strong>Total :</strong></td>
                    <td class="total">0.00 FCFA</td>
                </tr>
            </tbody>
        </table>

        <div class="form-group">
            <label for="remarques">Remarques :</label>
            <textarea class="form-control" id="remarques" name="remarques"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <script>
    $(document).ready(function() {
        $('.quantite, .produit-selectionne').on('input', function() {
            var total = 0;
            
            $('.quantite').each(function() {
                var id = $(this).attr('name').match(/\d+/)[0];
                var quantite = $(this).val();
                var prix_unitaire = $('tr').find('[data-prix-unitaire=' + id + ']').data('prix-unitaire');
                var prix_total = quantite * prix_unitaire;
                
                if ($('tr').find('[data-produit-selectionne=' + id + ']').is(':checked')) {
                    $('tr').find('[data-prix-total=' + id + ']').text(prix_total.toFixed(2));
                    total += prix_total;
                } else {
                    $('tr').find('[data-prix-total=' + id + ']').text('');
                }
            });

            $('.total').text(total.toFixed(2));
        });
    });
    </script>
@endsection
