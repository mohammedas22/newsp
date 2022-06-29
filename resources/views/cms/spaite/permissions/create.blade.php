@extends('cms.parent')

@section('title',' الصلاحيات')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">عرض بيانات الصلاحيات</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="guard_name">النوع الوظيفي </label>
                                    <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                                        id="guard_name" aria-label=".form-select-sm example">
                                        <option value="admin">الأدمن</option>
                                        <option value="web">المستخدم</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name"> الصلاحية </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="أدخل الصلاحية ">
                                </div>


                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-primary">Stroe</button>
                            <a href="{{route('permissions.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الصلاحيات </button></a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('script')


<script>

$('.guard_name').select2({
      theme: 'bootstrap4'
    })


    function performStore() {

        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('guard_name',document.getElementById('guard_name').value);
        
        store('/cms/admin/permissions',formData);
    }

</script>

@endsection
