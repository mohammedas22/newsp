@extends('cms.parent')
@section('title','Viewer')
@section('styles')

@endsection
@section('main-title','Show Viewer')

@section('sub-title','Show viewer')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Show City</h3> --}}
        <a href="{{route('viewers.index')}}" type="submit" class="btn btn-success">retun to index</a>

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
                @foreach ($viewers as $viewer )
                <tr>
                <td>{{$viewer->id}}</td>
                <td>{{$viewer->user ? $viewer->user->first_name : "Null"}}</td>
                <td>{{$viewer->user ? $viewer->user->last_name : "Null"}}</td>
                <td>{{$viewer->user ? $viewer->user->email : "Null"}}</td>
                <td>{{$viewer->user ? $viewer->user->status : "Null"}}</td>
                <td>{{$viewer->user ? $viewer->user->gender : "Null"}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('/images/viewer/'.$viewer->image)}}" width="60" height="60" alt="User Image"> </td>
                <td>{{$viewer->user ? $viewer->user->birth_date : "Null"}}</td>
                <td>{{$viewer->bio}}</td>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>
@endsection

@section('script')
<script>
function performDestroy(id ,reference){
    let url = '/cms/admin/viewers/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
