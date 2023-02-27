@extends('pages.back.admin.master',['titre'=>'Dashboard'])
@section('admin-content')
             <!-- Dashboard Counts Section-->
            <section class="pb-0">
                <div class="container-fluid">
                  <div class="card mb-0">
                    <div class="card-body">
                      <div class="row gx-5 bg-white">
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                          <div class="d-flex align-items-center">
                            <div class="icon flex-shrink-0 bg-violet">
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#user-1"> </use>
                              </svg>
                            </div>
                            <div class="mx-3">
                              <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Clients</h6>
                              {{-- <div class="progress" style="height: 4px">
                                <div class="progress-bar bg-violet" role="progressbar" style="width: 25%; height: 4px;"  aria-valuemin="0" aria-valuemax="100"></div>
                              </div> --}}
                            </div>
                            <div class="number"><strong class="text-lg">{{$clients}}</strong></div>
                          </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                          <div class="d-flex align-items-center">
                            <div class="icon flex-shrink-0 bg-red">
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#survey-1"> </use>
                              </svg>
                            </div>
                            <div class="mx-3">
                              <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Contacts</h6>
                              {{-- <div class="progress" style="height: 4px">
                                <div class="progress-bar bg-red" role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> --}}
                            </div>
                            <div class="number"><strong class="text-lg">{{$contacts}}</strong></div>
                          </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                          <div class="d-flex align-items-center">
                            <div class="icon flex-shrink-0 bg-green">
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#numbers-1"> </use>
                              </svg>
                            </div>
                            <div class="mx-3">
                              <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Fournisseurs</h6>
                             {{--  <div class="progress" style="height: 4px">
                                <div class="progress-bar bg-green" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> --}}
                            </div>
                            <div class="number"><strong class="text-lg">{{$fournisseurs}}</strong></div>
                          </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4">
                          <div class="d-flex align-items-center">
                            <div class="icon flex-shrink-0 bg-orange">
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                <use xlink:href="#list-details-1"> </use>
                              </svg>
                            </div>
                            <div class="mx-3">
                               <h6 class="h4 fw-light text-gray-600 mb-3">Open<br>Cases</h6>
                             {{-- <div class="progress" style="height: 4px">
                                <div class="progress-bar bg-orange" role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div> --}}
                            </div>
                            <div class="number"><strong class="text-lg">{{$prestataires}}</strong></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Dashboard Header Section    -->
{{--               
              <section>
                <div class="container-fluid">
                  <div class="row gy-12">
                    <div class="col-lg-12">
                      <div class="card mb-0">
                        <div class="card-header position-relative">
                          <div class="card-close">
                            <div class="dropdown">
                              <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                              <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                            </div>
                          </div>
                          <h3 class="h4 mb-0">Recent Activities</h3>
                        </div>
                        <div class="card-body p-0">
                          <div class="row g-0 border-bottom border-gray-200">
                            <div class="col-sm-4 col-3 text-end">
                              <ul class="list-inline mb-0">
                                <li>
                                  <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                </li>
                                <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                              </ul>
                            </div>
                            <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                              <h5 class="fw-normal">Meeting</h5>
                              <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                          <div class="row g-0 border-bottom border-gray-200">
                            <div class="col-sm-4 col-3 text-end">
                              <ul class="list-inline mb-0">
                                <li>
                                  <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                </li>
                                <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                              </ul>
                            </div>
                            <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                              <h5 class="fw-normal">Meeting</h5>
                              <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                          <div class="row g-0">
                            <div class="col-sm-4 col-3 text-end">
                              <ul class="list-inline mb-0">
                                <li>
                                  <div class="d-inline-block p-2 bg-light"><i class="far fa-clock fa-fw"></i></div>
                                </li>
                                <li class="me-2"><span class="small text-gray-500">6:00 am</span></li>
                                <li class="me-2"><span class="small text-info lh-1 d-block">6 hours ago</span></li>
                              </ul>
                            </div>
                            <div class="col-sm-8 col-9 border-start border-gray-200 p-3">
                              <h5 class="fw-normal">Meeting</h5>
                              <p class="small mb-0 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section> --}}
@endsection