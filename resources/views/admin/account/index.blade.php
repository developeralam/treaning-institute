@extends('admin.layouts.master')
@section('title','Table')
@section('page-header')
    <i class="fa fa-list"></i> Chart of Accounts
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
        <a class="btn btn-xs btn-info" href="{{ url('admin/account/create') }}" role="button" class="blue" data-toggle="modal" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add New</a>

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
                        <th> Name Of Account </th>
                        <th> Type Of Account </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($items1); --}}
{{--                          @foreach($items1 as $key=>$account) --}}
                    @foreach($accounts as $key=>$account)
                    <tr>
                       <td> {{ $key +1 }} </td>
                               {{-- @dd($items1); --}}
                        <td> {{ $account->name_of_account }} </td>
                        <td> {{ ucfirst($account->type) }} </td>
                        <td>
            <a href="{{ route('account.edit',$account->id) }}" class="btn btn-sm btn-success" title="Edit">
                                <i class="fa fa-edit"></i>
            </a>
         <a  class="btn btn-sm btn-danger" title="Delete" onclick="if(confirm('Are you sure to delete')){
            event.preventDefault();
            document.getElementById('delete-form-{{ $account->id }}').submit();
        }else {
            event.preventDefault();
        }"><span class="glyphicon glyphicon-trash"></span></a>
                            <form action="{{ route('account.destroy',$account->id)}}" id="delete-form-{{ $account->id }}" method="POST">
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

    @if(Session::has('success'))
        <script>
            Swal.fire({
                title: "Updated!",
                text: "Process Successfully done",
                button: "Aww yiss!",
                type:'success',
                timer:1000
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Please Try Again',
                timer:1000,
            })
        </script>
    @endif

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

    <!--  Select Box Search-->
    <script type="text/javascript">



        jQuery(function($){

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                // .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': '300px'});
                            // $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                        // $this.next().css({'width': $this.parent().width()});
                    })
                });


                $('#chosen-multiple-style .btn').on('click', function(e){
                    var target = $(this).find('input[type=radio]');
                    var which = parseInt(target.val());
                    if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                    else $('#form-field-select-4').removeClass('tag-input-style');
                });
            }

        })
    </script>




@stop