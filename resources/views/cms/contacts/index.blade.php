@extends('cms.parent')
@section('title', 'Contacts')
@section('styles')

@endsection
@section('main-title', 'Index contacts')

@section('sub-title', 'index Contacts')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Index City</h3> --}}
                    {{-- <a href="{{ route('countries.create') }}" type="submit" class="btn btn-success">Add New country</a> --}}

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
                                <th>phone</th>
                                <th>email</th>
                                <th>message</th>
                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    {{-- <td>
                                        <div class="btn-group">
                                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-info"
                                                title="Edit">
                                                <i class="fas fa-edit"></i></a>

                                            <a href="#" onclick="performDestroy({{ $country->id }}, this)"
                                                class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>


                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$country->links()}} --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        function performDestroy(id, reference) {
            let url = '/cms/admin/contacts/' + id;
            confirmDestroy(url, reference);
        }
    </script>

@endsection
