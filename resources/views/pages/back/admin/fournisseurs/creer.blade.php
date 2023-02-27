@extends('pages.back.admin.master',['titre'=>'AJOUTER UN FOURNISSEUR'])
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
              <a href="{{ route('lister-fournisseur') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Retour à la liste</a>
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
              <div class="row form-control-lg">
                <div class="row">
                  <div class=" mt-5 form-check col-md-12 mb-3 row">
                    <h3>VEUILLEZ INDIQUER LE STATUS DU FOURNISSEUR</h3> 
                      <div class="d-flex justify-content-around">
                        <div>
                          <input class="form-check-input" type="radio" id="particulierRadio" name="status" value="particulier-radio"/>
                          <label class="form-check-label" for="particulierRadio">Particulier</label>
                        </div>
                        <div>
                          <input class="form-check-input" type="radio" id="entreprise-radio" name="status" value="entreprise-radio">
                          <label class="form-check-label" for="entreprise-radio">Entreprise</label>
                        </div>
                      </div>
                  </div>
                </div> 
                <div id="formulaire"></div>
              </div>
               <!--PARTICULIER -->
              <div class="input-material-group mt-5 form-check col-md-12 mb-3 row" id="particulierForm" style="display:none;">
                <form class="form-horizontal" action="{{ route('creer-fournisseur-post') }}" id="fournisseurCreate" method="POST" enctype="multipart/form-data">
                  @csrf 
                  <div class=" input-material-group col-md-12 row">
                    <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="email" type="email" name="email" placeholder="Adresse email *" required autocomplete>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="nom" type="nom" name="nom" placeholder="Nom *" required autocomplete>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="pays" type="text" name="pays" placeholder="Pays *" required autocomplete>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="ville" type="text" name="ville" placeholder="Ville *" required autocomplete>
                    </div> 
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="commune" type="text" name="commune" placeholder="Commune *" required autocomplete>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="rue" type="text" name="rue" placeholder="Rue"  autocomplete>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="contact" type="tel" name="contact" placeholder="Contact * : 225 0700000000" pattern="[0-9]{3} [0-9]{10}" required autocomplete>                        
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="solde" type="number" min="0" minlength="10" name="solde" placeholder="Solde" autocomplete>
                    </div>
                  </div>

                <input type="hidden" name="status" value="particulier"/>
                <button class="btn btn-danger" type="reset">ANNULER</button>
                <input class="btn btn-success" type="submit" value="Enregistrer le fournisseur"/>
              </form>
              </div>
              {{-- ENTREPRISE --}}
              <div class="input-material-group mt-5 form-check col-md-12 mb-3 row" id="entreprise-form" style="display:none;">
                <form class="form-horizontal" action="{{ route('creer-fournisseur-post') }}" id="fournisseurCreate" method="POST" enctype="multipart/form-data">
                  @csrf  
                  <div class="input-material-group col-md-12 mb-3 row">
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="email" type="email" name="email" placeholder="Adresse email *" required autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="nom" type="nom" name="nom" placeholder="Raison sociale *" required autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="pays" type="text" name="pays" placeholder="Pays *" required autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="ville" type="text" name="ville" placeholder="Ville *" required autocomplete>
                      </div> 
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="commune" type="text" name="commune" placeholder="Commune *" required autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="rue" type="text" name="rue" placeholder="Rue" autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="contact" type="tel" name="contact" placeholder="Contact * : 225 0700000000" pattern="[0-9]{3} [0-9]{10}" required autocomplete>                        
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="site_web" type="text" name="site_web" placeholder="Site web" autocomplete>
                      </div>
                      <div class="input-material-group col-md-6 mb-3">
                          <input class="input-material" id="solde" type="number" min="0" minlength="10" name="solde" placeholder="Solde" autocomplete>
                      </div>
                  </div>
                <input type="hidden" name="status" value="entreprise"/>
                <button class="btn btn-danger" type="reset">ANNULER</button>
                <input class="btn btn-success" type="submit" value="Enregistrer le fournisseur"/>
                </form>
              </div> 
             
          <!-- card body -end-->
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
$(document).ready(function() {
  // Show particulier form on particulier button click
  $("#particulierRadio").click(function() {
      $("#formulaire").html($("#particulierForm").html());
  });

  // Show entreprise form on entreprise button click
  $("#entreprise-radio").click(function() {
      $("#formulaire").html($("#entreprise-form").html());
    });
});
</script>


@endsection
@section('script')



@endsection