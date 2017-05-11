@extends('admin/layout')

@section('title')
    All Category
    @parent
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Category
                <small>Add Category</small>
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
                            <h3 class="box-title">Add New Category</h3>
                        </div>
                        <form role="form" method="post" action="{{route('category.add')}}">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tittle">Category Tittle</label>
                                    <input type="text" class="form-control" id="tittle" name="title" placeholder="Enter Category Tittle">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add New</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>



        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Categories</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(($catigories) as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td>{!! isset($category->created_at) ? @$category->created_at->diffForHumans() : 'Not Set'!!}</td>
                            <td>

                                    <a href="{{route('category.edit' , $category->id)}}"><i class="fa fa-fw fa-pencil text-warning"></i></a>

                                     <a href="#"><i class="fa fa-fw fa-eye text-primary"></i></a>

                                <a onclick="return confirm('Are you sure to delete ?')" href="{{route('category.delete' , $category->id)}}"><i class="fa fa-fw fa-times text-danger"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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

