@extends('pages.back.admin.master', ['titre' => 'GESTION DES CATEGORIES'])
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
                                            <i class="fa fa-plus"></i> Ajouter une catégorie
                                        </button>
                                        <!-- Creation Modal -->
                                        <div class="modal fade" id="static" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticLabel">ENREGISTREMENT D'UNE NOUVELLE CATEGORIE</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-control-group mb-4">
                                                                <div class="form-control-group col-auto mb-3">
                                                                    <input class="form-control" id="name"
                                                                        type="text" name="name" placeholder="Nom *"
                                                                        required autocomplete />
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
                                        <table class="table mb-0  table-hover display" id="tablecategories">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Inscrit le</th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($categories)
                                                    @foreach ($categories as $categorie)
                                                        <tr>
                                                            <td>{{ $categorie->name }}</td>
                                                            <td>{{ date('d-m-y H:i', strtotime($categorie->created_at)) }}</td>
                                                            <td>
                                                                <a href="" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                                    data-bs-target="#edit{{$categorie->id}}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="" type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#delete{{$categorie->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                    <!-- Edition Modal -->
                                                    <div class="modal fade" id="edit{{$categorie->id}}" data-bs-backdrop="edit"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-hidden="true"> 
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editLabel">Modification de {{$categorie->name}}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal"action="{{route('categories.update', $categorie->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="form-control-group mb-4">
                                                                        <div class="form-control-group col-auto mb-3">
                                                                            <input class="form-control" id="name"
                                                                                type="text" name="name" placeholder="Nom *"
                                                                                required autocomplete  value="{{old('name') ?? $categorie->name }}" />
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
                                                <div class="modal fade" id="delete{{$categorie->id}}" data-bs-backdrop="static"
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
                                                                Voulez-vous vraiment supprimer la catégorie <strong class="text-danger">{{$categorie->name}}</strong>?
                                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                
                                                                <form action="{{route('categories.destroy', $categorie->id) }}"method="Post">
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
            $('#tablecategories').DataTable();
        });
    </script>
    <script>
        $('#tablecategories').DataTable({
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
