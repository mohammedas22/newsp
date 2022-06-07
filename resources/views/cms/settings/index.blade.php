@extends('cms.parent')
@section('title','Setting')
@section('styles')

@endsection
@section('main-title','Index Setting')

@section('sub-title','index setting')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('settings.create')}}" type="submit" class="btn btn-success">Add New Setting</a>

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
                <th>phone</th>
                <th>mobile</th>
                <th>working_time</th>
                <th>box_office</th>
                <th>address</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting )
                <tr>
                <td>{{$setting->id}}</td>
                <td>{{$setting->email}}</td>
                <td>{{$setting->phone}}</td>
                <td>{{$setting->mobile}}</td>
                <td>{{$setting->working_time}}</td>
                <td>{{$setting->box_office}}</td>
                <td>{{$setting->address}}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('countries.edit',$setting->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$setting->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    

                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$Setting->links()}} --}}
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
    let url = '/cms/admin/settings/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection