@extends('cms.parent')
@section('title','Contact_request')
@section('styles')

@endsection
@section('main-title','Index Contact_request')

@section('sub-title','index contact_request')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('contact_requests.create')}}" type="submit" class="btn btn-success">Add New Contact_request</a>

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
                <th>email</th>
                <th>mobile</th>
                <th>title</th>
                <th>message</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($contact_requests as $Contact_request )
                <tr>
                <td>{{$Contact_request->id}}</td>
                <td>{{$Contact_request->name}}</td>
                <td>{{$Contact_request->email}}</td>
                <td>{{$Contact_request->mobile}}</td>
                <td>{{$Contact_request->title}}</td>
                <td>{{$Contact_request->message}}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('contact_requests.edit',$Contact_request->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$Contact_request->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>


                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$Contact_request->links()}} --}}
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
    let url = '/cms/admin/Contact_requests/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
