@extends('cms.parent')
@section('title','Setting')
@section('styles')

@endsection
@section('main-title','Edit Setting')

@section('sub-title','edit setting')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit setting</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$settings->email}}" placeholder="email">
        </div>
        <div class="form-group">
            <label for="mobile">mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$settings->mobile}}"  placeholder="mobile">
        </div>
        <div class="form-group">
            <label for="phone">phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{$settings->phone}}"  placeholder="phone">
        </div>
        <div class="form-group">
            <label for="working_time">working_time</label>
            <input type="text" class="form-control" name="working_time" id="working_time" value="{{$settings->working_time}}"  placeholder="working_time">
        </div>
        <div class="form-group">
            <label for="box_office">box_office</label>
            <input type="text" class="form-control" name="box_office" id="box_office" value="{{$settings->box_office}}"  placeholder="box_office">
        </div>
        <div class="form-group">
            <label for="address">address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{$settings->address}}"  placeholder="address">
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
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('email' , document.getElementById('email').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        formData.append('phone' , document.getElementById('phone').value);
        formData.append('working_time' , document.getElementById('working_time').value);
        formData.append('box_office' , document.getElementById('box_office').value);
        formData.append('address' , document.getElementById('address').value);
        storeRoute('/cms/admin/update_settings/'+id,formData);
    }
</script>
@endsection
