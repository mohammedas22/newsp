@extends('cms.parent')
@section('title','contact_requests')
@section('styles')

@endsection
@section('main-title','Create contact_requests')

@section('sub-title','create contact_requests')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create contact_requests</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        @csrf
        <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
            </div>
            <div class="form-group col-sm-4">
                <label for="email">email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
            </div>
            <div class="form-group col-sm-4">
                <label for="mobile">mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile">
            </div>
            <div class="form-group col-sm-4">
                <label for="title">title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="title">
            </div>
            <div class="form-group col-sm-4">
                <label for="message">message</label>
                <input type="text" class="form-control" name="message" id="message" placeholder="message">
            </div>
            <div class="form-group col-sm-4">
                <label for="user_id">name_user</label>
                <select class="form-select form-select-sm" name="user_id" style="width: 100%;"
                    id="user_id" aria-label=".form-select-sm example">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }}</option>
    
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
            <a href="{{route('contact_requests.index')}}" class="btn btn-success">return to index</a>
            </div>
    </form>
</div>
@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@section('script')
<script>
    $('.user_id').select2({
        theme: 'bootstrap4'
    })
    function performStore(){
        let formData = new FormData ();
        formData.append('name' , document.getElementById('name').value);
        formData.append('email' , document.getElementById('email').value);
        formData.append('mobile' , document.getElementById('mobile').value);
        formData.append('title' , document.getElementById('title').value);
        formData.append('message' , document.getElementById('message').value);
        formData.append('user_id' , document.getElementById('user_id').value);
        store('/cms/admin/contact_requests',formData);
    }
</script>
@endsection
