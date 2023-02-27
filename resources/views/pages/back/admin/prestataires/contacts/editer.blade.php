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
              <form class="form-horizontal" action="{{ route('editer-contact-prestataire-post',$contact->id) }}" method="post" enctype="multipart/form-data">
                @csrf                    
                <div class="row form-control-lg">
                  <div class="col-md-12 row">
                    <div class="input-material-group col-md-6 mb-3">
                      <input class="input-material" id="nom_du_contact" type="text" name="nom_du_contact"  value="{{old('nom_du_contact') ?? $contact->nom_du_contact }}" required >
                      @error('nom_du_contact')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="nom">Nom complet du contact <span class="text-danger">(*)</span></label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="adresse_email" type="email" name="adresse_email"  value="{{old('adresse_email') ?? $contact->adresse_email }}" required >
                      @error('adresse_email')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="adresse_email">Email <span class="text-danger">(*)</span></label>
                    </div>
                    <div class="input-material-group col-md-3 mb-3">
                      <input class="input-material" id="numero_telephone" type="text" name="numero_telephone" value="{{old('numero_telephone') ?? $contact->numero_telephone}}" required >
                      @error('numero_telephone')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <label class="label-material" for="contact">Contact <span class="text-danger">(*)</span></label>
                    </div>
                  </div>
                </div>
               
                <div class="row form-control-lg">                    
                    <div class="col-md-12 row">
                      <div class="input-material-group col-md-6 mb-3">
                        <input class="input-material" id="poste" type="text" name="poste" value="{{old('poste') ?? $contact->poste }}" required >
                        @error('poste')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="label-material" for="poste">Poste <span class="text-danger">(*)</span></label>
                      </div>
                      {{-- Entreprise --}}
                      <div class="col-md-6">
                        <div class="mb-4">
                            <label for="entreprise" class="form-label">Entreprise <span class="text-danger">(*)</span> </label>
                            <select class="form-control select2" name="entreprise_id" id="entreprise" required>
                                <option></option>
                                @foreach($entreprises as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $contact->client_id ? 'selected' : '' }} >{{ $client->nom }}</option>
                                @endforeach
                            </select>
                            @error('client')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
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