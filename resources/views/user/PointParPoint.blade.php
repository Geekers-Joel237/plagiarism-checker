@extends('layouts.backend')

@section('content')

    <style>
        /* Difference Highlighting and Strike-through
------------------------------------------------ */
ins {
    color: #333333;
    background-color: #eaffea;
    text-decoration: none;
}
del {
    color: #AA3333;
    background-color: #ffeaea;
    text-decoration: line-through;
}

/* Image Diffing
------------------------------------------------ */
del.diffimg.diffsrc {
    display: inline-block;
    position: relative;
}

del.diffimg.diffsrc:before {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: repeating-linear-gradient(
        to left top,
        rgba(255, 0, 0, 0),
        rgba(255, 0, 0, 0) 49.5%,
        rgba(255, 0, 0, 1) 49.5%,
        rgba(255, 0, 0, 1) 50.5%
    ), repeating-linear-gradient(
        to left bottom,
        rgba(255, 0, 0, 0),
        rgba(255, 0, 0, 0) 49.5%,
        rgba(255, 0, 0, 1) 49.5%,
        rgba(255, 0, 0, 1) 50.5%
    );
}

/* List Diffing
------------------------------------------------ */
/* List Styles */
.diff-list {
    list-style: none;
    counter-reset: section;
    display: table;
}

.diff-list > li.normal,
.diff-list > li.removed,
.diff-list > li.replacement {
    display: table-row;
}

.diff-list > li > div{
    display: inline;
}

.diff-list > li.replacement:before,
.diff-list > li.new:before {
    color: #333333;
    background-color: #eaffea;
    text-decoration: none;
}

.diff-list > li.removed:before{
    counter-increment: section;
    color: #AA3333;
    background-color: #ffeaea;
    text-decoration: line-through;
}

/* List Counters / Numbering */
.diff-list > li.normal:before,
.diff-list > li.removed:before,
.diff-list > li.replacement:before {
    width: 15px;
    overflow: hidden;
    content: counters(section,".") ". ";
    display: table-cell;
    text-indent: -1em;
    padding-left: 1em;
}

.diff-list > li.normal:before,
li.replacement + li.replacement:before,
.diff-list > li.replacement:first-child:before{
    counter-increment: section;
}
ol.diff-list li.removed + li.replacement {
    counter-increment: none;
}
ol.diff-list li.removed + li.removed + li.replacement {
    counter-increment: section -1;
}
ol.diff-list li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -2;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -3;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -4;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -5;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -6;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -7;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -8;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -9;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement{
    counter-increment: section -10;
}
ol.diff-list li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.removed + li.replacement {
    counter-increment: section -11;
}

/* Exception Lists */
ul.exception,
ul.exception li:before {
    list-style: none;
    content: none;
}
.diff-list ul.exception ol {
    list-style: none;
    counter-reset: exception-section;
    /* Creates a new instance of the section counter with each ol element */
}
.diff-list ul.exception ol > li:before {
    counter-increment: exception-section;
    content:counters(exception-section, ".") ".";
}

    </style>

    <section class="section">
      <div class="section-body">


        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item " aria-current="page">Détection</li>
                                <li class="breadcrumb-item " aria-current="page">Document à Document</li>
                            </ol>
                        </nav>
            </div>
        </div>


        <div class="row">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('upsource') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                        <textarea class="summernote" >
                                            @if ($source = Session::get('source'))
                                            {{ $source }}
                                            @endif
                                            
                                        </textarea>
                                        <input class="btn btn-primary" type="file" name="file" required>Charger le document
                                        <div class=" mt-3 ">
                                            <button class="btn  btn-warning" type="submit" >
                                                Chargez le document
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-12">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cible</label>
                                        <textarea class="summernote">
                                            @if ($source2 = Session::get('source2'))
                                            {{ $source2 }}
                                            @endif
                                        </textarea>
                                        <input class="btn btn-primary" type="file" name="file2" required>Charger le document
                                    </div>
                                </div>
                            </div>
                            {{-- {{$content}} --}}
                        </div>
                    </div>
                </div>
            </form>

            <form action="{{ route('traitement')}}" method="POST">
                @csrf
                
                <textarea class="" name="content1" style="display:none">
                    @if ($source = Session::get('source'))
                    {{ $source }}
                    @endif
                </textarea>

                <textarea class="" name="content2"  style="display:none">
                    @if ($source2 = Session::get('source2'))
                    {{ $source2 }}
                    @endif
                </textarea>

                <button class="btn btn-success" type="submit">controllez le plagiat</button>
            </form>
           
          
            
    </div>
   

<?php //echo $firstContent ?>
<br><br>
<?php //var_dump($all)  ?>

    </section>
@endsection



