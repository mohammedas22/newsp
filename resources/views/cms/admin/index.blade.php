@extends('cms.parent')
@section('title','Admin')
@section('styles')

@endsection
@section('main-title','Index Admin')

@section('sub-title','index admin')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('admins.create')}}" type="submit" class="btn btn-success">Add New Admin</a>

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
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin )
                <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->user ? $admin->user->first_name . ' ' . $admin->user->last_name : "Null"}}</td>
                <td>{{$admin->user ? $admin->user->status : "Null"}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->image)}}" width="60" height="60" alt="User Image"> </td>
                <td>{{$admin->email}}</td>
                {{-- <td>{{$admin->password}}</td> --}}
                <td>
                    <div class="btn-group">
                        <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-info" title="Edit">
                            <i class="fas fa-edit"></i></a>

                        <a href="#" onclick="performDestroy({{$admin->id}}, this)" class="btn btn-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </a>


                        </div>


                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$admins->links()}} --}}
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
    let url = '/cms/admin/admins' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
