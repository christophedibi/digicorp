@extends('pages.back.admin.master',['titre'=>'ENREGISTRER UN CONTACT'])
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
            <h3 class="h4 mb-0">AJOUTER UN CONTACT</h3>
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
              <form class="form-horizontal" action="{{ route('creer-contact-post') }}" method="post" enctype="multipart/form-data">
                @csrf                    
                <div class="row form-control-lg">
                  <div class="col-md-12 row">
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="nom" type="text" name="nom" required >
                      @error('nom')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="nom">Nom et Prénoms</label>
                    </div>
                    <div class="input-material-group col-md-6 mb-3">
                   
                      <div class="mb-4">
                        <select class="form-control select2" name="entreprise_id" id="entreprise" required>
                          <option selected disabled>Choisissez l'entreprise du contact...</option>
                          @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" >{{ $entreprise->nom }}</option>
                            @endforeach
                        </select>
                        @error('entreprise')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="input-material-group col-md-4 mb-3">
                      <input class="input-material" id="email" type="email" name="email" required >
                      @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="email">Email</label>
                    </div>
                    <div class="input-material-group col-md-4 mb-3">
                      <input class="input-material" id="numero" type="text" name="numero" required >
                      @error('numero')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="numero">Contact</label>
                    </div>
                    <div class="input-material-group col-md-4 mb-3">
                      <input class="input-material" id="poste" type="text" name="poste" required >
                      @error('poste')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="poste">Poste</label>
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