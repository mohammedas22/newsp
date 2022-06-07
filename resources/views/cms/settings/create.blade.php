@extends('cms.parent')
@section('title','Setting')
@section('styles')

@endsection
@section('main-title','Create Setting')

@section('sub-title','create setting')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create setting</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body row">
        <div class="form-group col-4">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="email">
        </div>
        <div class="form-group col-4 ">
            <label for="mobile">mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile">
        </div>
        <div class="form-group col-4">
            <label for="phone">phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
        </div>
        <div class="form-group col-4">
            <label for="working_time">working_time</label>
            <input type="text" class="form-control" name="working_time" id="working_time" placeholder="working_time">
        </div>
        <div class="form-group col-4">
            <label for="box_office">box_office</label>
            <input type="text" class="form-control" name="box_office" id="box_office" placeholder="box_office">
        </div>
        <div class="form-group col-4">
            <label for="address">address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="address">
        </div>

        <div class="card-footer col-4">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('countries.index')}}" type="submit" class="btn btn-success">return to index</a>
            </div>
        </div>
    </form>

@endsection

@section('script')
<script>
    function performStore(){
        let formData = new FormData ();
        // formData.append('email' , document.getElementById('email').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        // formData.append('phone' , document.getElementById('phone').value);
        // formData.append('working_time' , document.getElementById('working_time').value);
        // formData.append('box_office' , document.getElementById('box_office').value);
        // formData.append('address' , document.getElementById('address').value);
        store('/cms/admin/settings',formData);
    }
</script>
@endsection
