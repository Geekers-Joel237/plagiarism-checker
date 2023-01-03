@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header">
      <h4>Code Editor</h4>
    </div>
    <div class="card-body">
      <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Files</label>
        <div class="col-sm-12 col-md-7">
          <select class="form-control selectric">
            <option>life.js</option>
            <option>afterlife.js</option>
          </select>
        </div>
      </div>
      <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code</label>
        <div class="col-sm-12 col-md-7">
          <textarea class="codeeditor">var yourTimeout = undefined;
setTimeout(function() {
Person.die(you);
}, yourTimeout);</textarea>
        </div>
      </div>
      <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
          <button class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
@endsection