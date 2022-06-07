@extends('cms.parent')
@section('title','country')
@section('styles')

@endsection
@section('main-title','Edit country')

@section('sub-title','edit country')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="country">country</label>
            <input type="text" class="form-control" name="country" id="country" value="{{ $countries->country}}"aceholder="country">
        </div>
        <div class="form-group">
            <label for="city">city</label>
            <input type="text" class="form-control" name="city" id="city" value="{{$countries->city}} placeholder="city">
        </div>
        <div class="card-footer">
            <button type="button" onclick="performUpdate({{$countries->id}})" class="btn btn-primary">Update`</button>
            <a href="{{route('countries.index')}}" type="button" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('country' , document.getElementById('country').value);
        formData.append('city' , document.getElementById('city').value);
        storeRoute('/cms/admin/update_country/'+id,formData);
    }
</script>
@endsection
