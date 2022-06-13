@extends('cms.parent')
@section('title','Viewer')
@section('styles')

@endsection
@section('main-title','Index Viewer')

@section('sub-title','index viewer')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('viewers.create')}}" type="submit" class="btn btn-success">Add New Viewer</a>

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
                <th>name</th>
                <th>status</th>
                <th>image</th>
                <th>email</th>
                {{-- <th>password</th> --}}
                <th>bio</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($viewers as $viewer )
                <tr>
                <td>{{$viewer->id}}</td>
                <td>{{$viewer->user ? $viewer->user->first_name . ' ' . $viewer->user->last_name : "Null"}}</td>
                <td>{{$viewer->user ? $viewer->user->status : "Null"}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/viewer/'.$viewer->user->image)}}" width="60" height="60" alt="User Image"> </td>
                <td>{{$viewer->email}}</td>
                {{-- <td>{{$viewer->password}}</td> --}}
                <td>{{$viewer->bio}}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('viewers.edit',$viewer->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$viewer->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a href="{{route('viewers.show',$viewer->id)}}" class="btn btn-success" title="Show">
                        <i class="fas fa-info"></i>
                    </a>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$viewer->links()}} --}}
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
