@extends('pages.back.admin.master', ['titre' => 'GESTION DES PROFORMAS'])
@section('admin-content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="tables">
                <div>
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="card mb-0">
                                <div>
                                    @if (Session::has('messages'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('messages') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div id="app">
                                        <main class="py-4">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <form class="form" action="{{route('proformas.store')}}" id="createProforma" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <select class="form-control select2" name="client_id">
                                                                            <option selected disabled>Selectionner le client...</option>
                                                                            @foreach ($clients as $client)
                                                                                <option value="{{ $client->id }}">
                                                                                    <span>
                                                                                        {{ $client->nom }}
                                                                                    </span>
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                                <div class="card mt-4">
                                                                    
                                                                    <div class="card-header">
                                                                        Liste des produits
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <table class="table" id="products_table">
                                                                            <thead>
                                                                                <tr class="table-primary">
                                                                                    <th class="w-25">Produit</th>
                                                                                    <th class="w-25">Quantité</th>
                                                                                    <th class="w-25">PU HT</th>
                                                                                    <th class="w-25">Total HT</th>
                                                                                    {{-- <th class="w-25"></th> --}}
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="table-body">
                                                                                {{-- Add products section Here--}}
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="row">
                                                                            <div class="col-md-12 d-flex flex-row-reverse">
                                                                                <button class="btn btn-sm btn-warning"
                                                                                    onclick="ajouterLigne()">+
                                                                                    Ajouter un produit</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-flex flex-row-reverse col-lg-5 ml-auto text-right mt-5">
                                                                            <table class="table pull-right">
                                                                                <tr>
                                                                                    <th>Prix Total Hors Taxe</th>
                                                                                    <td>0.00 FCFA</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-12">
                                                                    <label>Note en plus</label>
                                                                    <input type="text" name="note" class="form-control" value="" required>
                                                                </div>
                                                                <br />
                                                                    <input class="btn btn-primary" type="submit" value="Enregistrer">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </main>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let modal = document.getElementById("createProforma");
        let products = document.getElementById("addProductForm");

		function ajouterLigne() {
			// Crée une nouvelle ligne et ajoute des cellules pour chaque colonne
			var tableBody = document.getElementById("table-body");
			var newRow = tableBody.insertRow();


			var cell1 = newRow.insertCell(0);
			var cell2 = newRow.insertCell(1);
			var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);



			// Ajoute du texte aux cellules
			cell1.innerHTML = `
            <select class="form-control select2" name="produits[]" id="produit" onchange="hello()" required>
                            <option selected disabled>
                                Produits...
                            </option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}" data-prix="{{$produit->prix_vente}}">
                                    <span>
                                        {{ $produit->designation }}
                                    </span>
                                    
                                </option>
                            @endforeach
                    </select>
                        @error('produits')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
            `;
            cell2.innerHTML = `<input class="form-control" type="number" name="quantite[]" placeholder="Quantite" min="0" autocomplete  value="1">`;

			cell3.innerHTML = 0;
            cell4.innerHTML = `<label for="prix_total">PRIX TOTAL</label>`;

		}
        
    

        function hello(){
            var prix = document.getElementById('produit');
            var prix_vente = prix.dataset.prix_vente;
            console.log(prix_vente);

            // let produitSelectionne = document.getElementById(produit);
            // console.log(produitSelectionne);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@endsection
