@extends('cms.parent')
@section('title','Author')
@section('styles')

@endsection
@section('main-title','Show Author')

@section('sub-title','Show author')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Show City</h3> --}}
        <a href="{{route('authors.index')}}" type="submit" class="btn btn-success">retun to index</a>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
                </button>
            </div>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th>status</th>
                <th>gender</th>
                <th>image</th>
                <th>birth_date</th>
                <th>bio</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author )
                <tr>
                <td>{{$author->id}}</td>
                <td>{{$author->user ? $author->user->first_name : "Null"}}</td>
                <td>{{$author->user ? $author->user->last_name : "Null"}}</td>
                <td>{{$author->user ? $author->user->email : "Null"}}</td>
                <td>{{$author->user ? $author->user->status : "Null"}}</td>
                <td>{{$author->user ? $author->user->gender : "Null"}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/author/'.$author->user->image)}}" width="60" height="60" alt="User Image"> </td>
                <td>{{$author->user ? $author->user->birth_date : "Null"}}</td>
                <td>{{$author->bio}}</td>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$authors->links()}}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
@endsection

@section('script')
<script>
function performDestroy(id ,reference){
    let url = '/cms/admin/authors/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
