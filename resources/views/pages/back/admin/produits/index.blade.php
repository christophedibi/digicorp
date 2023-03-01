@extends('pages.back.admin.master', ['titre' => 'GESTION DES PRODUITS'])
@section('style')
    <style>
    </style>
@endsection
@section('admin-content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css" />
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="tables">
                <div>
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="card mb-0">
                                <div class="text-center">
                                    <div class="col-md-12 d-flex justify-content-start px-2 py-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#static">
                                            <i class="fa fa-plus"></i> Ajouter un produit
                                        </button>
                                        <!-- Creation Modal -->
                                        <div class="modal fade" id="static" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticLabel">ENREGISTREMENT D'UN NOUVEAU PRODUIT</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-control-group mb-4">
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <input class="form-control" id="designation"
                                                                        type="text" name="designation" placeholder="Designation *"
                                                                        required autocomplete />
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <select class="form-control select2" name="categorie_id" id="categorie" required>
                                                                      <option selected disabled>Categorie du produit...</option>
                                                                      @foreach($categories as $categorie)
                                                                        <option value="{{ $categorie->id }}" >{{ $categorie->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('categorie')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <select class="form-control select2" name="marque_id" id="marque" required>
                                                                      <option selected disabled>Marque du produit...</option>
                                                                      @foreach($marques as $marque)
                                                                        <option value="{{ $marque->id }}" >{{ $marque->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('marque')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <select class="form-control select2" name="entrepot_id" id="entrepot" required>
                                                                      <option selected disabled>Entrepot du produit...</option>
                                                                      @foreach($entrepots as $entrepot)
                                                                        <option value="{{ $entrepot->id }}" >{{ $entrepot->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('entrepot')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <input class="form-control" id="quantite"
                                                                        type="number" name="quantite" placeholder="Quantite*"
                                                                         autocomplete required />
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <input class="form-control" id="prix_revient"
                                                                        type="number" name="prix_revient" placeholder="Prix de Revient"
                                                                         autocomplete />
                                                                </div>
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <input class="form-control" id="marge"
                                                                        type="number" max="100" name="marge" placeholder="Marge (en %)"
                                                                         autocomplete />
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
                                </div>
                                <div>
                                    @if (Session::has('add-product'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{Session::get('add-product')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0  table-hover display" id="tableproduits">
                                            <thead>
                                                <tr>
                                                    <th>Désignation</th>
                                                    <th>Quantite</th>
                                                    <th>Prix de revient</th>
                                                    <th>Marge</th>
                                                    <th>Prix de vente</th>
                                                    <th>Categorie</th>
                                                    <th>Inscrit le</th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($produits)
                                                    @foreach ($produits as $produit)
                                                        <tr>
                                                            <td>{{ $produit->designation }}</td>
                                                            <td>{{ $produit->quantite }}</td>
                                                            <td>{{ $produit->prix_revient }}</td>
                                                            <td>{{ $produit->marge }}</td>
                                                            <td>{{ $produit->prix_vente }}</td>
                                                            <td>{{ $produit->categorie_id }}</td>
                                                            <td>{{ date('d-m-y H:i', strtotime($produit->created_at)) }}</td>
                                                            <td>
                                                                <a href="" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                                    data-bs-target="#edit{{$produit->id}}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="" type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#delete{{$produit->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    <!-- Edition Modal -->
                                                    <div class="modal fade" id="edit{{$produit->id}}" data-bs-backdrop="edit"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-hidden="true"> 
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editLabel">Modification de {{$produit->designation}}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal"action="{{route('produits.update', $produit->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="form-control-group mb-4">
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <input class="form-control" id="designation"
                                                                                type="text" name="designation" placeholder="Designation *"
                                                                                required autocomplete  value="{{old('designation') ?? $produit->designation }}" />
                                                                        </div>
                                                                        <div class="form-control-group col-auto text-primary mb-3">
                                                                            <select class="form-control select2 " name="categorie_id" id="categorie" required>
                                                                              <option selected disabled>Choisissez la catégorie du produit...</option>
                                                                              @foreach($categories as $categorie)
                                                                                <option value="{{ $categorie->id }}" >{{ $categorie->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('categorie')
                                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <select class="form-control select2" name="marque_id" id="marque" required>
                                                                              <option selected disabled>Marque du produit...</option>
                                                                              @foreach($marques as $marque)
                                                                                <option value="{{ $marque->id }}" >{{ $marque->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('marque')
                                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <select class="form-control select2" name="entrepot_id" id="entrepot" required>
                                                                              <option selected disabled>Entrepot du produit...</option>
                                                                              @foreach($entrepots as $entrepot)
                                                                                <option value="{{ $entrepot->id }}" >{{ $entrepot->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('entrepot')
                                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
   
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <input class="form-control" id="quantite"
                                                                                type="number" name="quantite" placeholder="Quantite*"
                                                                                autocomplete required  value="{{old('quantite') ?? $produit->quantite }}" />
                                                                        </div>
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <input class="form-control" id="prix_revient"
                                                                                type="number" name="prix_revient" placeholder="Prix de Revient"
                                                                                autocomplete  value="{{old('prix_revient') ?? $produit->prix_revient }}"  />
                                                                        </div>
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <input class="form-control" id="marge"
                                                                                type="number" name="marge" placeholder="Marge (en %)"
                                                                                autocomplete max="100"  value="{{old('marge') ?? $produit->marge }}"  />
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fermer</button>
                                                                    <button class="btn btn-success" type="submit"> Enregistrer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- End of creation modal --}}
                                                <!-- Suppression Modal -->
                                                <div class="modal fade" id="delete{{$produit->id}}" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-hidden="true"> 
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteLabel">Demande de confirmation</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Voulez-vous vraiment supprimer le produit <strong class="text-danger">{{$produit->designation}}</strong>?
                                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                <form action="{{ route('produits.destroy', $produit->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                                                </form> 
                                                              </div>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- End of creation modal --}}
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableproduits').DataTable();
        });
    </script>
    <script>
        $('#tableproduits').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    </script>



@endsection
@section('script')
@endsection
