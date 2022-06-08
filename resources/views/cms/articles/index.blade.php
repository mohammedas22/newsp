@extends('cms.parent')
@section('title','Article')
@section('styles')

@endsection
@section('main-title','Index Article')

@section('sub-title','index article')

@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        {{-- <h3 class="card-title">Index City</h3> --}}
        <a href="{{route('articles.create')}}" type="submit" class="btn btn-success">Add New Article</a>

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
                <th>short_description</th>
                <th>full_description</th>
                <th>images</th>
                <th>seen_count</th>
                <th>Seeting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article )
                <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->short_description}}</td>
                <td>{{$article->full_description}}</td>
                <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image)}}" width="60" height="60" alt="article Image"> </td>
                <td>{{$article->seen_count}}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('articles.edit',$article->id)}}" class="btn btn-info" title="Edit">
                        <i class="fas fa-edit"></i></a>

                    <a href="#" onclick="performDestroy({{$article->id}}, this)" class="btn btn-danger" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    

                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$article->links()}} --}}
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
    let url = '/cms/admin/articles/' +   id;
    confirmDestroy(url ,reference);
}
</script>

@endsection