@extends('cms.parent')
@section('title','contact_requests')
@section('styles')

@endsection
@section('main-title','Edit contact_requests')

@section('sub-title','edit contact_requests')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit contact_requests</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form>
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$contact_requests->name}}" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$contact_requests->email}}" placeholder="email">
        </div>
        <div class="form-group">
            <label for="mobile">mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$contact_requests->mobile}}" placeholder="mobile">
        </div>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" id="title"  value="{{$contact_requests->title}}" placeholder="title">
        </div>
        <div class="form-group">
            <label for="message">message</label>
            <input type="text" class="form-control" name="message" id="message" value="{{$contact_requests->message}}" placeholder="message">
        </div>
        <div class="form-group">
            <label for="user_id">name_user </label>
            <select class="form-select form-select-sm" name="user_id" style="width: 100%;"
                id="user_id" aria-label=".form-select-sm example">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->first_name }}</option>

                @endforeach
            </select>
        </div>
        <div class="card-footer">
            <button type="button" onclick="performUpdate({{$contact_requests->id}})" class="btn btn-primary">Update</button>
            <a href="{{route('contact_requests.index')}}" class="btn btn-success">return to index</a>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function performUpdate(id){
        let formData = new FormData ();
        formData.append('name' , document.getElementById('name').value);
        formData.append('email' , document.getElementById('email').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        formData.append('title' , document.getElementById('title').value);
        formData.append('message' , document.getElementById('message').value);
        formData.append('user_id' , document.getElementById('user_id').value);
        storeRoute('/cms/admin/update_contact_requests/'+id,formData);
    }
</script>
@endsection
