@extends('cms.parent')
@section('title','slider')
@section('styles')

@endsection
@section('main-title','Create slider')

@section('sub-title','create slider')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create slider</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        @csrf
        <div class="card-body row">
        <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="title">
        </div>
        <div class="form-group col-4 ">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="description">
        </div>
        <div class="form-group col-4">
            <label for="image">image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="image">
        </div>
    </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('sliders.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
        </div>
    </form>

@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('title' , document.getElementById('title').value);
        formData.append('description' , document.getElementById('description').value);
        formData.append('image' , document.getElementById('image').files[0]);
        store('/cms/admin/sliders',formData);
    }
</script>
@endsection
