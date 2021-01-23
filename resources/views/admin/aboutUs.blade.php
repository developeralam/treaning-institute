@extends('admin.layouts.master')
@section('title','About us')
@section('page-header')
    <i class="fa fa-plus-circle"></i> About Us
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

@stop


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
              </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('aboutUsPost') }}"  enctype="multipart/form-data">
                                  @csrf
                             <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Title</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1-1"  class="form-control" name="title" value="{{ $items->title??null }}" />
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="control-label col-md-3"> About-Us</label>
                                <div class="col-md-8">
        {{--                            <textarea rows="8" name="desc" class="form-control @error('about') is-invalid @enderror">{{ old('about', $items->about??null) }}</textarea>--}}
                                    <textarea id="summernote" name="about" col="20" rows="7">{{$items->about}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: 'About-us Description',
                                            tabsize: 2,
                                            height: 350
                                        });
                                    </script>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="control-label col-md-3">Upload Banner <h6>file size must be in <b>(1220x150)px</b> </h6></label>
                                <div class="col-md-8" title="file size must be in (510*382) ">
                                    <input name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $items->image??null) }}" type="file" onchange="readURL(this)" accept="image/*"> <br/>
                                    <img id="previewLogo" src="/uploads/aboutus/{{$items->image??null}}" height="60" width="215"/>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Banner Link</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1-1" placeholder="Enter image link" class="form-control" name="link" value="{{ $items->link??null }}" />
                                </div>
                             </div>

                            <hr style="border:1px solid black">

                            <div class="form-group row">
                                <label class="control-label col-md-3">Upload Boardimage <h6>file size must be in <b>(1220x150)px</b> </h6></label>
                                <div class="col-md-8" title="file size must be in (510*382) ">
                                    <input name="boardimage" class="form-control @error('boardimage') is-invalid @enderror" value="{{ old('boardimage', $items->image??null) }}" type="file" accept="image/*"> <br/>
                                    <img id="previewLogo2" src="/uploads/aboutus/{{$items->boardimage??null}}" height="60" width="215"/>
                                    @error('boardimage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Board Link</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1-1" placeholder="Enter image link" class="form-control" name="boardlink" value="{{ $items->boardlink??null }}" />
                                </div>
                             </div>

                            <hr style="border:1px solid black">

                            <div class="form-group row">
                                <label class="control-label col-md-3">Upload Banner <h6>file 2 size must be in <b>(1220x150)px</b> </h6></label>
                                <div class="col-md-8" title="file size must be in (510*382) ">
                                    <input name="image2" class="form-control @error('image2') is-invalid @enderror" value="{{ old('image2', $items->image??null) }}" type="file" accept="image/*"> <br/>
                                    <img id="previewLogo3" src="/uploads/aboutus/{{$items->image2??null}}" height="60" width="215"/>

                                    @error('image2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Banner Link</label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1-1" placeholder="Enter image link" class="form-control" name="link2" value="{{ $items->link2??null }}" />
                                </div>
                            </div> --}}


                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>

                                <div class="col-xs-12 col-sm-6">

                                    <button class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if($('#previewLogo')){
                        $('#previewLogo')
                            .attr('src', e.target.result);
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@stop