@extends('cms.parent')
@section('title','Article')
@section('styles')

@endsection
@section('main-title','Create Article')

@section('sub-title','create article')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Article</h3>
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
        <div class="form-group col-sm-4">
            <label>full_description</label>
            <textarea class="form-control" rows="3" placeholder="Enter full_description" name="full_description" id="full_description"></textarea>
        </div>
    </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('articles.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
        </div>
    </form>

@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('title' , document.getElementById('title').value);
        formData.append('short_description' , document.getElementById('short_description').value);
        formData.append('full_description' , document.getElementById('full_description').value);
        // formData.append('images' , document.getElementById('images').files[0];
        formData.append('seen_count' , document.getElementById('seen_count').value);
        formData.append('category_id' , document.getElementById('category_id').value);
        formData.append('author_id' , document.getElementById('author_id').value);
        store('/cms/admin/articles',formData);
    }
</script>
@endsection
