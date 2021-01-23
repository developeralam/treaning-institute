@extends('admin.layouts.master')
@section('title','Party add')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Add Party

<a style="margin-top: 5px;margin-right: 10px" href="{{ route('party.index')}}" class="btn btn-sm btn-info btn-xs pull-right"> <i class="fa fa-plus"></i> Party List</a>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/daterangepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-colorpicker.min.css') }}" />


@stop


@section('content')


    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
                  </div>
              {{-- @include('admin.layouts.includes.msg') --}}
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('party.store') }}" >
                                  {{ csrf_field() }}

                             <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Name</label>

                                <div class="col-sm-7">
                                    <input type="text" id="form-field-1-1" placeholder="Name"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                                     @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-field-1-2"> Email</label>
    
                                    <div class="col-sm-7">
                                        <input type="email" id="form-field-1-2" placeholder="Email"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-3"> Phone</label>
        
                                        <div class="col-sm-7">
                                            <input type="text" id="form-field-1-3" placeholder="Phone"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control @error('phone') is-invalid @enderror" pattern="\d*" maxlength="11" minlength="11" name="phone" value="{{ old('phone') }}" />
                                             @error('phone')
                                               <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                             @enderror
                                        </div>
                                    </div>

                           
                         <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>

                                <div class="col-xs-12 col-sm-6">

                                    <button class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                                    
                                    <a href="{{ route('party.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>



@endsection

@section('js')

    <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/spinbox.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/autosize.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.inputlimiter.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-tag.min.js') }}"></script>


    <script src="{{ asset('admin/assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ace.min.js') }}"></script>

    <!-- Side Bar -->
    <script type="text/javascript">
        jQuery(function ($) {
            $('#sidebar2').insertBefore('.page-content');
            $('#navbar').addClass('h-navbar');
            $('.footer').insertAfter('.page-content');

            $('.page-content').addClass('main-content');

            $('.menu-toggler[data-target="#sidebar2"]').insertBefore('.navbar-brand');


            $(document).on('settings.ace.two_menu',
                function (e, event_name, event_val) {
                    if (event_name == 'sidebar_fixed') {
                        if ($('#sidebar').hasClass('sidebar-fixed')) $('#sidebar2').addClass('sidebar-fixed')
                        else $('#sidebar2').removeClass('sidebar-fixed')
                    }
                }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' , $('#sidebar').hasClass('sidebar-fixed')]);

            $('#sidebar2[data-sidebar-hover=true]').ace_sidebar_hover('reset');
            $('#sidebar2[data-sidebar-scroll=true]').ace_sidebar_scroll('reset', true);
        })
    </script>


    <!--  Select Box Search-->
    <script type="text/javascript">



        jQuery(function($){

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
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