@extends('admin.layouts.master')
@section('title','Courses')
@section('page-header')
    <i class="fa fa-list"></i> Courses
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" />
    <style type="text/css">
        .pagination {
            padding-left: 0;
            margin-top: -30px;
            border-radius: 4px;
            margin-right: 20px;
        }
    </style>
@stop
@section('content')
    <div class="page-header">
        <form action="" id="deleteAllCheck" method="POST">
            @csrf
            <img src="">
        </form>
        <a class="btn btn-xs btn-info" href="{{ route('course.create') }}" role="button" class="blue" data-toggle="modal" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add New</a>
        <h1>
            @yield('page-header')
        </h1>
    </div>
    @include('admin.layouts.includes.msg')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th> Title </th>
                        <th> Image </th>
                        <th> Course Code </th>
                        <th> Duration </th>
                        <th> Fees </th>
                        <th width="10%"> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td> {{ $key +1 }} </td>
                            <td> {{ ucwords($item->title) }} </td>
                            <td>
                                @if(!($item->image=='no'))
                                    <img class="img-responsive img-thumbnail" src="{{ asset('uploads/course/'.$item->image) }}"  style="height: 40px; width: 40px;" alt="">
                                @else
                                    <img class="img-responsive img-thumbnail" src="{{ asset('uploads/no.png') }}" style="height: 40px; width: 40px;" alt="">
                                @endif
                            </td>
                            <td> {{$item->short_code}} </td>
                            <td> {{$item->duration}} </td>
                            <td> {{ $item->fees }} </td>
                            <td>
                                <a href="{{ route('course.edit',$item->id) }}" class="btn btn-sm btn-success" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a  class="btn btn-sm btn-danger" title="Delete" onclick="if(confirm('Are you sure to delete')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                        }else {
                                        event.preventDefault();
                                        }"><span class="glyphicon glyphicon-trash"></span></a>
                                <form action="{{ route('course.destroy',$item->id)}}" id="delete-form-{{ $item->id }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ace.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('#dynamic-table').DataTable({
                "ordering": false,
                // install laravel datatable this package
                // https://github.com/yajra/laravel-datatables
                // processing: true,
                // serverSide: true,
                {{--ajax: '{{ url('') }}',--}}
                // columns:[
                //     {"data":"first_name"},
                //     {"data":"last_name"},
                // ],
                "bPaginate": true,
            });

        })
    </script>
    <!--Drag and drop-->
    <script type="text/javascript">
        jQuery(function($) {
            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small'//large | fit

            }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });


        });

    </script>
@stop