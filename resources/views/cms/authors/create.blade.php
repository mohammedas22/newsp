@extends('cms.parent')
@section('title','Author')
@section('styles')

@endsection
@section('main-title','Create Author')

@section('sub-title','create author')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Author</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="email">
        </div>
        
        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="password">
        </div>

        <div class="form-group">
            <label for="add_files">add_files</label>
            <input type="text" class="form-control" name="add_files" id="add_files" placeholder="add_files">
        </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('authors.index')}}" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('email' , document.getElementById('email').value);
        formData.append('password' , document.getElementById('password').value);
        formData.append('add_files' , document.getElementById('add_files').value);
        store('/cms/admin/authors',formData);
    }
</script>
@endsection
