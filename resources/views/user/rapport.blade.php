@extends('layouts.backend')
@section('content')

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                    <li class="breadcrumb-item " aria-current="page">Tableau de Bord</li>
                                </ol>
                            </nav>
                </div>
            </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-around p-4 w-100">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h3 ">21</div>
                            <p class="lead">
                                Documents Scannés
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h3">3058</div>
                            <p class="lead">
                                Mots Scannés
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="h3">28%</div>
                            <p class="lead">
                                Moy. Plagiat
                            </p>
                        </div>
                    </div>
                  </div>
                  <div class="h2">
                    Rapports Recents
                  </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>TITRE DU RAPPORT</th>
                          <th>MOTS</th>
                          <th>SIMILARITE</th>
                          <th>DATE DE SCAN</th>
                          <th>ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>Document à Document</td>
                          <td>
                            130
                          </td>
                          <td class="align-middle">
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-success width-per-40">
                              </div>
                            </div>
                          </td>

                          <td>2018-01-20</td>

                          <td><a href="#" class="btn btn-primary">Voir le rapport</a></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </section>


@endsection
