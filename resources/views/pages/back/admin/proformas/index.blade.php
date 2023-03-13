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
                                {{-- <div class="text-center">
                                    <div class="col-md-12 d-flex justify-content-start px-2 py-3">


                                        <!-- Creation Modal -->
                                        <div class="modal fade" id="static" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticLabel">ENREGISTREMENT D'UN NOUVEAU
                                                            PROFORMA</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" id="createModal"
                                                            action="{{ route('proformas.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-control-group mb-4">

                                                                <div class="form-control-group col-auto mb-3">
                                                                    <select class="form-control select2" name="client_id"
                                                                        id="client" required>
                                                                        <option selected disabled>client du proforma...
                                                                        </option>
                                                                        @foreach ($clients as $client)
                                                                            <option value="{{ $client->id }}">
                                                                                {{ $client->nom }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('client')
                                                                        <span
                                                                            class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div id="addProductForm"></div>
                                                                <div class="d-flex flex-row-reverse">
                                                                    <a href="#" class="btn btn-primary"
                                                                        onclick="addproduct()">Ajouter
                                                                        un produit</a>
                                                                </div>


                                                            </div>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <input class="btn btn-danger"
                                                                type="reset"value="Réinitialiser" />
                                                            <input class="btn btn-success" type="submit"
                                                                value="Enregistrer" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
                                                                <div class="card mt-4">
                                                                    <div class="card-header">
                                                                        Liste des produits
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <table class="table" id="products_table">
                                                                            <thead>
                                                                                <tr class="table-primary">
                                                                                    <th class="w-75">Produit</th>
                                                                                    <th class="w-25">Quantité</th>
                                                                                    {{-- <th class="w-25"></th> --}}
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="addProductForm">
                                                                            {{-- Add products section Here--}}
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <button class="btn btn-sm btn-warning"
                                                                                    onclick="addProduct()">+
                                                                                    Ajouter un produit</button>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="d-flex flex-row-reverse col-lg-5 ml-auto text-right mt-5">
                                                                            <table class="table pull-right">
                                                                                <tr>
                                                                                    <th>Prix total</th>
                                                                                    <td>0.00 FCFA</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label>Nom du client</label>
                                                                        <input type="text" name="customer_name"
                                                                            class="form-control" value="" required>
                                                                    </div>
                                                                    <div class="col-md-6 ">
                                                                        <label>Adresse Email du client</label>
                                                                        <input type="email" name="customer_email"
                                                                            class="form-control" value="" />
                                                                    </div>
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

        function addProduct() {

            // créer un nouvel élément div
            var nouveauFormulaire = document.createElement("div");

            // ajouter le code HTML du formulaire à l'élément div
            nouveauFormulaire.innerHTML = `
            <tr>
            <div class="form-group row">
                <div class="w-75">
                    <select class="form-control select2" name="produit_id[]" id="produit" required>
                            <option selected disabled>
                                Produits...
                            </option>
                            @foreach ($produits as $produit)
                                <option
                                    value="{{ $produit->id }}">
                                    <span>
                                        {{ $produit->designation }}
                                    </span>
                                    (
                                    <span class="text-danger">
                                        {{ $produit->prix_vente }}
                                    </span>
                                    )
                                </option>
                            @endforeach
                    </select>
                        @error('produit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>
                <div class="w-25">
                        <input class="form-control" type="number" name="quantite[]" placeholder="Quantite" min="0" autocomplete >
                </div>
            </div>
            </tr>`;


            // récupérer la div qui contiendra le nouveau formulaire
            var divFormulaires = document.getElementById("addProductForm");

            // ajouter le nouveau formulaire à la div
            divFormulaires.appendChild(nouveauFormulaire);



        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@endsection
