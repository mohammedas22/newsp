@extends('cms.parent')
@section('title','Admin')
@section('styles')

@endsection
@section('main-title','Create Admin')

@section('sub-title','create admin')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create admin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="first_name">first_name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">last_name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="email">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="password">
        </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('admins.index')}}" type="button" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('first_name' , document.getElementById('first_name').value);
        formData.append('last_name' , document.getElementById('last_name').value);
        formData.append('email' , document.getElementById('email').value);
        formData.append('password' , document.getElementById('password').value);
        store ('/cms/admin/admins',formData);
    }
</script>
@endsection
