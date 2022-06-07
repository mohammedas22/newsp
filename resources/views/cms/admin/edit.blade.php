@extends('cms.parent')
@section('title','Admin')
@section('styles')

@endsection
@section('main-title','Edit Admin')

@section('sub-title','edit admin')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit admin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$admins->email}}"aceholder="email">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" name="password" id="password" value="{{$admins->password}} placeholder="password">
        </div>
        <div class="card-footer">
            <button type="button" onclick="performUpdate({{$admins->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('admins.index')}}" type="button" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('email' , document.getElementById('email').value);
        formData.append('password' , document.getElementById('password').value);
        storeRoute('/cms/admin/update_admin/'+id,formData);
    }
</script>
@endsection
