@extends('cms.parent')
@section('title','Admin')
@section('styles')

@endsection
@section('main-title','Edit Admin')

@section('sub-title','edit admin')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit admin</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body row">
        <div class="form-group col-md-4">
            <label for="first_name">first_name</label>
            <input type="text" class="form-control" name="first_name" value="{{$admins->user->first_name}}" id="first_name" placeholder="first_name">
        </div>
        <div class="form-group col-md-4">
            <label for="last_name">last_name</label>
            <input type="text" class="form-control" name="last_name" value="{{$admins->user->last_name}}" id="last_name" placeholder="last_name">
        </div>
        <div class="form-group col-md-4">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" value="{{$admins->email}}"  id="email" placeholder="email">
        </div>
        {{-- <div class="form-group col-md-4">
            <label for="password">password</label>
            <input type="text" class="form-control" name="password" value="{{$admins->password}}" id="password" placeholder="password">
        </div> --}}
        <div class="form-group col-md-4">
            <label for="image">image</label>
            <input type="file" class="form-control" name="image" value="{{$admins->user->image}}" id="image" placeholder="image">
        </div>

        <div class="form-group col-md-4">
            <label for="birth_date">birth_date</label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{$admins->user->birth_date}}" placeholder="birth_date">
        </div>

        <div class="form-group col-sm-4">
            <label for="Country_id">name_author</label>
            <select class="form-select form-select-sm" name="Country_id" style="width: 100%;"
                id="Country_id" aria-label=".form-select-sm example">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->city}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="gender">gender </label>
            <select class="form-select form-select-sm" name="gender" style="width: 100%;"
                id="gender" aria-label=".form-select-sm example">
                <option selected> {{ $admins->user->gender }} </option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="status">status</label>
            <select class="form-select form-select-sm" name="status" style="width: 100%;"
                id="status" aria-label=".form-select-sm example">
                <option selected> {{ $admins->user->status }} </option>
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
                <option value="Blocked">Blocked</option>
            </select>
        </div>
    </div>
        <div class="card-footer">
            <button type="button" onclick="performUpdate({{$admins->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('admins.index')}}" type="button" class="btn btn-success">return to index</a>
            </div>
    </form>

@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('first_name' , document.getElementById('first_name').value);
        formData.append('last_name' , document.getElementById('last_name').value);
        formData.append('email' , document.getElementById('email').value);
        // formData.append('password' , document.getElementById('password').value);
        // formData.append('image' , document.getElementById('image').files[0]);
        formData.append('birth_date' , document.getElementById('birth_date').value);
        formData.append('Country_id' , document.getElementById('Country_id').value);
        formData.append('status' , document.getElementById('status').value);
        formData.append('gender' , document.getElementById('gender').value);
        storeRoute('/cms/admin/update_admins/'+id,formData);
    }
</script>
@endsection
