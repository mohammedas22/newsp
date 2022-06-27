@extends('cms.parent')
@section('title','slider')
@section('styles')

@endsection
@section('main-title','Edit slider')

@section('sub-title','edit slider')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit slider</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body row">
        <div class="form-group col-4">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$sliders->title}}" id="title" placeholder="title">
        </div>
        <div class="form-group col-4 ">
            <label for="description">description</label>
            <input type="text" class="form-control" name="description" value="{{$sliders->description}}" id="description" placeholder="description">
        </div>
        <div class="form-group col-4">
            <label for="images">images</label>
            <input type="file" class="form-control" name="images" id="images" value="{{$sliders->images}}" placeholder="images">
        </div>
        
    </div>
        <div class="card-footer">
            <button type="button" onclick="performUpdate({{$sliders->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('sliders.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
    </form>

@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('title' , document.getElementById('title').value);
        formData.append('description' , document.getElementById('description').value);
        formData.append('images' , document.getElementById('images').files[0]);
        storeRoute('/cms/admin/update_sliders/'+id,formData);
    }
</script>
@endsection
