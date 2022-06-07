@extends('cms.parent')
@section('title','country')
@section('styles')

@endsection
@section('main-title','Create country')

@section('sub-title','create country')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="country">country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="country">
        </div>
        <div class="form-group">
            <label for="city">city</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="city">
        </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('countries.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        formData.append('country' , document.getElementById('country').value);
        formData.append('city' , document.getElementById('city').value);
        store('/cms/admin/countries',formData);
    }
</script>
@endsection
