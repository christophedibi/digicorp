@extends('pages.back.admin.master')
@section('style')

@endsection
@section('admin-content')
<section class="forms"> 
    <div class="container-fluid">
      <div class="row">
        <!-- Form Elements -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <h3 class="h4 mb-0">AJOUTER UN CLIENT</h3>
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
              <form class="form-horizontal" action="{{ route('editer-client-post',$client->id) }}" method="post" enctype="multipart/form-data">
                @csrf                    
                <div class="row form-control-lg">
                  <div class="col-md-12 row">
                    <div class="input-material col-md-12 mb-3">
                      <div class="col-lg round">
                          <label class="label-select" for="type">Type</label>
                          <select class="form-select" id="type" name="type" required>
                            <option value="normal">NORMAL</option>
                            <option value="revendeur">REVENDEUR</option>
                            <option value="distributeur">DISTRIBUTEUR</option>
                          </select>
                        </div>
                    </div> 

                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="nom" type="text" name="nom"  value="{{old('nom') ?? $client->nom }}" required >
                      @error('nom')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="nom">Nom complet du client</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="email" type="email" name="email"  value="{{old('email') ?? $client->email }}" required >
                      @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="email">Email</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="contact" type="text" name="contact" value="{{old('contact') ?? $client->contact}}" required >
                      @error('contact')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="contact">Contact</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="site_web" type="text" name="site_web" value="{{old('site_web') ?? $client->site_web}}" required >
                      @error('site_web')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="site_web">Site Web</label>
                    </div>
                  </div>
                </div>
               
                <div class="row form-control-lg">
                    <legend>Adresse</legend>
                    
                    <div class="col-md-12 row">
                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="pays" type="text" name="pays" value="{{old('pays') ?? $client->pays }}" required >
                        @error('pays')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="pays">Pays</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="ville" type="text" name="ville" value="{{old('ville') ?? $client->ville }}" required >
                        @error('ville')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="ville">Ville</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="commune" type="text" name="commune" value="{{old('commune') ?? $client->commune }}" required >
                        @error('commune')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="commune">Commune</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="rue" type="text" name="rue" value="{{old('rue') ?? $client->rue }}" required >
                        @error('rue')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="rue">Rue</label>
                      </div>

                    </div>
                </div>
                
                <div class="row"  style=" display: flex; flex-direction: column; justify-content: space-between;">
                  <div class="col-md-12 ms-auto ">
                    <button class="btn btn-danger" type="reset">ANNULER</button>
                    <button class="btn btn-primary" type="submit">ENREGISTRER</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')

@endsection