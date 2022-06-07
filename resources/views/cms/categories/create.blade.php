@extends('cms.parent')
@section('title','Category')
@section('styles')

@endsection
@section('main-title','Create Category')

@section('sub-title','create category')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="description">
        </div>
        <div class="col-sm-6">
            <div class="col-sm-6">
                <!-- select -->
                <div class="form-group">
                    <label>status</label>
                    <select class="form-control" name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                    </select>
                </div>
            </div>
            
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('categories.index')}}" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('name' , document.getElementById('name').value);
        formData.append('description' , document.getElementById('description').value);
        formData.append('status' , document.getElementById('status').value);
        store('/cms/admin/categories',formData);
    }
</script>
@endsection
