@extends('layouts.backend')
@section('content')
    

    <section class="content">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                    <li class="breadcrumb-item " aria-current="page">Détection</li>
                                    <li class="breadcrumb-item " aria-current="page">En ligne</li>
                                </ol>
                            </nav>
                </div>
            </div>
        </div>

        <div class="w-100">

            @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @elseif ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <form action="{{ route('enligne.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <div class="w-100">
                            <div class="form-group row mb-4 ">
                                <div class="col-sm-12 col-md-12">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Source </label>
                                    <textarea class="summernote">
                                        @if($source = Session::get('source'))
                                        {{ $source }}
                                        @endif
                                    </textarea>
                                    <input type="file" name="file" class="btn btn-primary" required>Chargez le document
                                    <div class="mt-3">
                                        <button class="btn btn-warning" type="submit">
                                            chargez le document
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="{{ route('traitementEnligne') }}" method="POST">
                @csrf
                <textarea class="" name="content" style="display:none">
                    @if ($source = Session::get('source'))
                    {{ $source }}
                    @endif
                </textarea>

                <button type="submit" class="btn btn-success">
                    Controllez le plagiat
                </button>
            </form>
        </div>
    </section>

@endsection