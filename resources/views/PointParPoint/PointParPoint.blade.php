@extends('layouts.backend')

@section('content')
    <section class="section">
      <div class="section-body">
       

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4> </h4>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group row mb-4">
                            
                            <div class="col-sm-12 col-md-12">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Source</label>
                              <textarea class="summernote"></textarea>
                              <button class="btn btn-primary">Charger le document</button>
                              <div class=" mt-3 ">
                                <button class="btn  btn-warning">Controlez le plagiat</button>
                              </div>
                              
                            </div>
                          </div>
                         
                </div>
                    <div class="col">
                        <div class="form-group row mb-4">
                            
                            <div class="col-sm-12 col-md-12">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cible</label>
                              <textarea class="summernote"></textarea>
                              <button class="btn btn-primary">Charger le document</button>
                            
                            </div>
                          </div>
                         
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
@endsection