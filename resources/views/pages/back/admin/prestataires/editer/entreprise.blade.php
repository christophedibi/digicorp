@extends('pages.back.admin.master',['titre'=>'EDITER UN PRESTATAIRE'])
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
            <h3 class="h4 mb-0">AJOUTER UN PRESTATAIRE</h3>
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
              <form class="form-horizontal" action="{{ route('editer-prestataire-post',$prestataire->id) }}" method="post" enctype="multipart/form-data">
                @csrf                    
                <div class="row form-control-lg">
                  <div class="col-md-12 row">

                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="nom" type="text" name="nom"  value="{{old('nom') ?? $prestataire->nom }}" required >
                      @error('nom')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="nom">Nom complet du prestataire</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="email" type="email" name="email"  value="{{old('email') ?? $prestataire->email }}" required >
                      @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="email">Email</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="contact" type="text" name="contact" value="{{old('contact') ?? $prestataire->contact}}" required >
                      @error('contact')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="contact">Contact</label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="site_web" type="text" name="site_web" value="{{old('site_web') ?? $prestataire->site_web}}" >
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
                        <input class="input-material" id="pays" type="text" name="pays" value="{{old('pays') ?? $prestataire->pays }}" required >
                        @error('pays')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="pays">Pays</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="ville" type="text" name="ville" value="{{old('ville') ?? $prestataire->ville }}" required >
                        @error('ville')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="ville">Ville</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="commune" type="text" name="commune" value="{{old('commune') ?? $prestataire->commune }}" required >
                        @error('commune')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="commune">Commune</label>
                      </div>

                      <div class="input-material-group col-md-3 mb-3">
                        <input class="input-material" id="rue" type="text" name="rue" value="{{old('rue') ?? $prestataire->rue }}"  >
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