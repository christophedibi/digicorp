@extends('pages.back.admin.master',['titre'=>'EDITER UN CLIENT'])
@section('style')
@endsection
@section('admin-content')
    <div class="forms container-fluid">
      <div class="row">
        <!-- Form Elements -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 d-flex justify-content-start py-3">

                </div>
                <div class="col-md-4 d-flex justify-content-center py-3">

                </div>
                <div class="col-md-4 d-flex justify-content-end py-3">
                  <a href="{{ route('lister-client') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Retour à la liste</a>
                </div>
              </div>
                @if(\Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="mdi mdi-check-all me-2"></i>
                      {!! \Session::get('success') !!}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {!! \Session::get('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                   <!--PARTICULIER -->
                  <div class="input-material-group mt-5 form-check col-md-12 mb-3 row" id="particulierForm">
                    <form class="form-horizontal" action="{{ route('creer-client-post') }}" id="clientCreate" method="POST" enctype="multipart/form-data">
                      @csrf 
                      <div class=" input-material-group col-md-12 row">
                        <div class="input-material col-md-4 mb-3">
                          <div class="col-lg round">
                              <label class="visually-hidden" for="type">type</label>
                              <select class="form-select" id="type" name="type" required>
                                <option selected>Choisissez le type du client...</option>
                                <option value="normal">NORMAL</option>
                                <option value="revendeur">REVENDEUR</option>
                                <option value="distributeur">DISTRIBUTEUR</option>
                              </select>
                            </div>
                        </div> 
                        {{-- value="{{old('nom_du_contact') ?? $contact->nom_du_contact }}" --}}
                        <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="email" type="email" name="email" placeholder="Adresse email" value="{{old('email') ?? $client->email }}" required autocomplete>
                        </div>
                        <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="nom" type="nom" name="nom" placeholder="Nom" required autocomplete>
                        </div>
                        <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="pays" type="text" name="pays" placeholder="Pays" required autocomplete>
                        </div>
                        <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="ville" type="text" name="ville" placeholder="Ville" required autocomplete>
                        </div> 
                        <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="commune" type="text" name="commune" placeholder="Commune" required autocomplete>
                        </div>
                        <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="rue" type="text" name="rue" placeholder="Rue" required autocomplete>
                        </div>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="contact" type="contact" name="contact" placeholder="Contact" required autocomplete>
                      </div>
                    <input type="hidden" name="status" value="particulier"/>
                    <button class="btn btn-danger" type="reset">ANNULER</button>
                    <input class="btn btn-success" type="submit" value="Enregistrer le client"/>
                  </form>
                  </div>
                  {{-- ENTREPRISE --}}
                  <div class="input-material-group mt-5 form-check col-md-12 mb-3 row" id="entreprise-form">
                    <form class="form-horizontal" action="{{ route('creer-client-post') }}" id="clientCreate" method="POST" enctype="multipart/form-data">
                      @csrf  
                      <div class="input-material-group col-md-12 mb-3 row">
                        <div class="input-material col-md-4 mb-3">
                            <label class="visually-hidden" for="type">type</label>
                            <select class="form-select" id="type" name="type" required>
                              <option selected>Choisissez le type du client...</option>
                              <option value="normal">NORMAL</option>
                              <option value="revendeur">REVENDEUR</option>
                              <option value="distributeur">DISTRIBUTEUR</option>
                            </select>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="email" type="email" name="email" placeholder="Adresse email" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="nom" type="nom" name="nom" placeholder="Raison sociale" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="pays" type="text" name="pays" placeholder="Pays" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="ville" type="text" name="ville" placeholder="Ville" required autocomplete>
                          </div> 
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="commune" type="text" name="commune" placeholder="Commune" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="rue" type="text" name="rue" placeholder="Rue" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="contact" type="text" name="contact" placeholder="Contact" required autocomplete>
                          </div>
                          <div class="input-material-group col-md-6 mb-3">
                            <input class="input-material" id="site_web" type="text" name="site_web" placeholder="Site web" required autocomplete>
                          </div>
                      </div>
                    <input type="hidden" name="status" value="entreprise"/>
                    <button class="btn btn-danger" type="reset">ANNULER</button>
                    <input class="btn btn-success" type="submit" value="Enregistrer le client"/>
                    </form>
                  </div>
              <!-- card body -end-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      
    </script>
@endsection
@section('script')



@endsection