@extends('admin.layouts.master')
@section('title','Menu Lists')
@section('page-header')
    <i class="fa fa-list"></i> Pages Lists
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
        <a class="btn btn-xs btn-info" href="{{ route('createmenu') }}" role="button" class="blue" data-toggle="modal" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add New</a>

        <h1>
            @yield('page-header')
        </h1>
    </div>

    @include('admin.layouts.includes.msg')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @elseif (session('msg'))
            <div class="alert alert-danger">
                {{ session('msg') }}
            </div>
        @endif
        <div class="col-xs-12">
            <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th> Main Menu </th>
                        <th> Sub Menu </th>
                        <th> Description </th>
                        {{-- <th> Role </th> --}}
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $key=>$item)
                        <tr>
                            <td> {{ $key +1 }} </td>
                            <td>
                                <span>
                                    @if ($item->menuid == '0')
                                        <h6>{{$item->title}} <span class="bg-success" style="padding:5px 10px">primary</span></h6>
                                    @else
                                        @foreach(App\Menu::where('id',$item->menuid)->get() as $menu)
                                            <span>
                                                &nbsp;&nbsp;{{$menu->title}}
                                            </span>
                                        @endforeach
                                    @endif
                                </span>
                            </td>
                            <td>
                                @if ($item->menuid != '0')
                                {{ ucfirst($item->title) }}
                                @endif
                            </td>
                            <td> {!! substr( $item->description, 0, 100) !!}... </td>
                            <td>
                                <a href="{{ route('updatemenu',$item->id) }}" class="btn btn-sm btn-success" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {{--  <a class="btn btn-sm btn-danger" title="Delete" onclick="if(confirm('Are you sure to delete'));"
                                    href="{{ route('deletemenu',$item->id)}}">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>  --}}

                                <button class="btn btn-xs btn-danger" title="Delete" 
                                        onclick="delete_check('{{ route('deletemenu', $item->id) }}')" type="button">
                                    <i class="fa fa-trash"></i>
                                </button>                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form action="" id="deleteItemForm" method="POST">
        @csrf @method("DELETE")
    </form>
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

    <!-- inline scripts related to this page -->
    <script type="text/javascript">

        function delete_check(url)
        {
            Swal.fire({
                title: 'Are you sure ?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width:400,
            }).then((result) =>{
                if(result.value){
                    // $('deleteItemForm').attr({'action': url});
                    $('#deleteItemForm').attr('action', url).submit();
                } 
            })

        }

        function delete_all_check() {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width:400,
            }).then((result)=> {
                if(result.value)
                {
                    $('#deleteAllCheck').submit();
                }
            })
        }

    </script>


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

    <!--date range picker-->
    <script type="text/javascript">
        jQuery(function($) {


            $('.input-daterange').datepicker({autoclose:true});


            //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
            $('input[name=date-range-picker]').daterangepicker({
                'applyClass' : 'btn-sm btn-success',
                'cancelClass' : 'btn-sm btn-default',
                locale: {
                    applyLabel: 'Apply',
                    cancelLabel: 'Cancel'
                }
            })
                .prev().on(ace.click_event, function(){
                $(this).next().focus();
            });

        })
    </script>

    <!--datepicker plugin-->
    <script type="text/javascript">
        jQuery(function($) {

            $('.date-picker').datepicker({
                autoclose: true,
                format:'yyyy-mm-dd',
                todayHighlight: true
            })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                $(this).prev().focus();
            });

        })
    </script>

    <!--autocomplete-->
    <script type="text/javascript">
        jQuery(function($) {
            //autocomplete
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];
            $( "#tags" ).autocomplete({
                source: availableTags
            });

        });
    </script>


@stop