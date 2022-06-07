@extends('cms.parent')
@section('title','Aeticle')
@section('styles')

@endsection
@section('main-title','Edit Aeticle')

@section('sub-title','edit aeticle')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit aeticle</h3>
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
            <label for="short_description">short_description</label>
            <input type="text" class="form-control" name="short_description" id="short_description" placeholder="short_description">
        </div>
        <div class="form-group col-4">
            <label for="phone">phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
        </div>
        <div class="form-group col-4">
            <label for="images">images</label>
            <input type="file" class="form-control" name="images" id="images" placeholder="images">
        </div>
        <div class="form-group col-4">
            <label for="seen_count">seen_count</label>
            <input type="text" class="form-control" name="seen_count" id="seen_count" placeholder="seen_count">
        </div>
        <div class="form-group col-sm-4">
            <label for="category_id">name_category</label>
            <select class="form-select form-select-sm" name="category_id" style="width: 100%;"
                id="category_id" aria-label=".form-select-sm example">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="author_id">name_author</label>
            <select class="form-select form-select-sm" name="author_id" style="width: 100%;"
                id="author_id" aria-label=".form-select-sm example">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->email}}</option>

                @endforeach
            </select>
        </div>
        <div class="card-footer">
            <button type="button" onclick="performStore({{$articles->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('articles.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('email' , document.getElementById('email').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        formData.append('phone' , document.getElementById('phone').value);
        formData.append('working_time' , document.getElementById('working_time').value);
        formData.append('box_office' , document.getElementById('box_office').value);
        formData.append('address' , document.getElementById('address').value);
        storeRoute('/cms/admin/update_aeticles/'+id,formData);
    }
</script>
@endsection
