@extends('cms.parent')
@section('title','Author')
@section('styles')

@endsection
@section('main-title','Index Author')

@section('sub-title','index author')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('authors.create')}}"  class="btn btn-success">Add New Author</a>

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
                <th>email</th>
                <th>password</th>
                <th>add_files</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($authors as $Author )
                <tr>
                <td>{{$Author->id}}</td>
                <td>{{$Author->email}}</td>
                <td>{{$Author->password}}</td>
                <td>{{$Author->add_files}}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('authors.edit',$Author->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$Author->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>


                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$author->links()}} --}}
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
    let url = '/cms/admin/authors/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
