@extends('cms.parent')
@section('title','slider')
@section('styles')

@endsection
@section('main-title','Index slider')

@section('sub-title','index slider')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('sliders.create')}}" type="submit" class="btn btn-success">Add New slider</a>

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
                <th>title</th>
                <th>description</th>
                <th>images</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider )
                <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->title}}</td>
                <td>{{$slider->description}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/sliders/'.$slider->image)}}" width="60" height="60" alt="slider Image"> </td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$slider->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>


                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$sliders->links()}}
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
    let url = '/cms/admin/sliders/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection
