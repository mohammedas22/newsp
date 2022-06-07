@extends('cms.parent')
@section('title','Viewer')
@section('styles')

@endsection
@section('main-title','Edit Viewer')

@section('sub-title','edit viewer')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Viewer</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" value="{{$viewers->email}} id="email" placeholder="email">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="text" class="form-control" name="password" value="{{$viewers->password}} id="password" placeholder="password">
        </div>
        <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
                <label>Textarea</label>
                <textarea class="form-control" rows="3" value="{{$viewers->bio}} placeholder="Enter bio" name="bio" id="bio"></textarea>
        </div>
    </div>
        <div class="card-footer">
            <button type="button" onclick="performStore({{$viewers->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('viewers.index')}}" class="btn btn-success">return to index</a>
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
        formData.append('bio' , document.getElementById('bio').value);
        storeRoute('/cms/admin/update_viewers/'+id,formData);
    }
</script>
@endsection
