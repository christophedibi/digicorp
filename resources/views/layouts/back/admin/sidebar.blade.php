<div class="page-content d-flex align-items-stretch"> 
    <!-- Side Navbar -->
    <nav class="side-navbar z-index-40">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center py-4 px-2"><img class="digicorp shadow-0 img-fluid rounded-circle" src="img/favicon.ico" alt="...">
        <div class="ms-3 title">
          <h1 class="h4 mb-2">{{Auth::user()->name}}</h1>
          <p class="text-sm text-gray-500 fw-light mb-0 lh-1">Administration</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
      <ul class="list-unstyled py-4">
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('home')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#real-estate-1"> </use>
            </svg>Dashboard </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#crmdropdownDropdown" data-bs-toggle="collapse"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>CRM </a>
            <ul class="collapse list-unstyled " id="crmdropdownDropdown">
              <!--data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
              <li><a class="sidebar-link" href="{{route('lister-client')}}">Clients</a></li>
              <li><a class="sidebar-link" href="{{route('lister-fournisseur')}}">Fournisseurs</a></li>
              <li><a class="sidebar-link" href="{{route('lister-prestataire')}}">Prestataires</a></li>
              <li><a class="sidebar-link" href="{{route('lister-contact')}}">Contact</a></li>
            </ul>
          </li>
          <li class="sidebar-item"><a class="sidebar-link" href="#stockdropdownDropdown" data-bs-toggle="collapse"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Gestion des Stock </a>
            <ul class="collapse list-unstyled " id="stockdropdownDropdown">
              <!--data-bs-toggle="modal" data-bs-target="#staticBackdrop"-->
              <li>
                <a class="sidebar-item">
                  <a class="sidebar-link" href="#produitropdownDropdown" data-bs-toggle="collapse"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#browser-window-1"> </use>
                    </svg>Produits </a>
                <ul class="collapse list-unstyled " id="produitropdownDropdown">
                  <li><a class="sidebar-link" href="{{route('entrepots.index')}}">Entreprots</a></li>
                  <li><a class="sidebar-link" href="{{route('marques.index')}}">Marque</a></li>
                  <li><a class="sidebar-link" href="#">Categorie</a></li>
                  <li><a class="sidebar-link" href="#">Article</a></li>
                </ul>
                </a>
              </li>
              <li><a class="sidebar-link" href="#">Inventaire</a></li>
              <li><a class="sidebar-link" href="#">Mouvement</a></li>
            </ul>
          </li>
        
    </nav>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statutClient" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mb-3">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title text-center fs-5" id="statutClient">STATUS DU CLIENT</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              
            </button>
          </div>
        </div>
      </div>
    </div>