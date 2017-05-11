@extends('admin/layout')

@section('title')
    Edit Category
    @parent
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Category
                <small>Edit Category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Category</li>
            </ol>
        </section>
        @include('admin.alerts.alert')

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <form role="form" method="post" action="{{route('category.update' , $category->id)}}">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tittle">Category Tittle</label>
                                    <input type="text" class="form-control" id="tittle" name="title" value="{{$category->title}}" placeholder="Enter Category Tittle">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update New</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('footer_scripts')

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    <script>
        $(document).ready(function () {

        });
    </script>

@endsection

