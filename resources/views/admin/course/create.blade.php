@extends('admin.layouts.master')
@section('title','Course Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Course Create
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
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('course.store') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Copurse Name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="form-field-1-1" placeholder="Title"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="short_code">Course Code <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" id="short_code" placeholder="Course Code"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control @error('title') is-invalid @enderror" name="short_code" value="{{ old('short_code') }}"/>
                                    @error('short_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="control-label col-md-3" for="desc">Description <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                            <div class="widget-body">
                            <div class="widget-main no-padding">
{{--                            <textarea name="desc" id="desc" data-provide="markdown" data-iconlibrary="fa" rows="10" placeholder="*** Write down course details here ***">{{old('desc')}}</textarea>--}}
                                <textarea id="summernote" name="desc"></textarea>
                                <script>
                                    $('#summernote').summernote({
                                        placeholder: 'Hello bootstrap 4',
                                        tabsize: 2,
                                        height: 100
                                    });
                                </script>
                            </div>
                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <!-- PAGE CONTENT ENDS -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="duration"> Duration <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="duration"  class="form-control  @error('duration') is-invalid @enderror " name="duration" value="{{ old('duration') }}" />
                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="day"> Day/Weekly Class  <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="day"  class="form-control  @error('day') is-invalid @enderror " name="day" value="{{ old('day') }}" />
                                    @error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="hour"> Class Hours <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="hour"  class="form-control  @error('hour') is-invalid @enderror " name="hour" value="{{ old('hour') }}" />
                                    @error('hour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="fees"> Fees</label>
                                <div class="col-sm-8">
                                    <input type="number" id="fees"  class="form-control " name="fees" value="{{ old('fees') }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">
                                    Upload Course image
                                    <h6>File size must be in <b>(510x382)px</b> </h6>
                                </label>
                                <div class="col-xs-12 col-sm-6">
                                    <input multiple="" type="file" id="id-input-file-3" name="image" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>
                                <div class="col-xs-12 col-sm-6">
                                    <button class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                                    {{-- <button class="btn btn-gray" type="Reset"> <i class="fa fa-refresh"></i> Reset</button> --}}
                                    <a href="{{ route('course.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
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
            });
        });
    </script>
    <!-- Drag & Drop End -->
    <!-- page specific plugin scripts -->
    <script src="{{ asset('admin/assets/')}}/js/markdown.min.js"></script>
    <script src="{{ asset('admin/assets/')}}/js/bootstrap-markdown.min.js"></script>
    <script src="{{ asset('admin/assets/')}}/js/jquery.hotkeys.index.min.js"></script>
    <script src="{{ asset('admin/assets/')}}/js/bootstrap-wysiwyg.min.js"></script>
    <script src="{{ asset('admin/assets/')}}/js/bootbox.js"></script>
    <!-- inline scripts related to this page -->
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($){
            $('textarea[data-provide="markdown"]').each(function(){
                var $this = $(this);

                if ($this.data('markdown')) {
                    $this.data('markdown').showEditor();
                }
                else $this.markdown()

                $this.parent().find('.btn').addClass('btn-white');
            })
            function showErrorAlert (reason, detail) {
                var msg='';
                if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
                else {
                    //console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
            }
            //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons
            //but we want to change a few buttons colors for the third style
            $('#editor1').ace_wysiwyg({
                toolbar:
                    [
                        'font',
                        null,
                        'fontSize',
                        null,
                        {name:'bold', className:'btn-info'},
                        {name:'italic', className:'btn-info'},
                        {name:'strikethrough', className:'btn-info'},
                        {name:'underline', className:'btn-info'},
                        null,
                        {name:'insertunorderedlist', className:'btn-success'},
                        {name:'insertorderedlist', className:'btn-success'},
                        {name:'outdent', className:'btn-purple'},
                        {name:'indent', className:'btn-purple'},
                        null,
                        {name:'justifyleft', className:'btn-primary'},
                        {name:'justifycenter', className:'btn-primary'},
                        {name:'justifyright', className:'btn-primary'},
                        {name:'justifyfull', className:'btn-inverse'},
                        null,
                        {name:'createLink', className:'btn-pink'},
                        {name:'unlink', className:'btn-pink'},
                        null,
                        {name:'insertImage', className:'btn-success'},
                        null,
                        'foreColor',
                        null,
                        {name:'undo', className:'btn-grey'},
                        {name:'redo', className:'btn-grey'}
                    ],
                'wysiwyg': {
                    fileUploadError: showErrorAlert
                }
            }).prev().addClass('wysiwyg-style2');
            /**
             //make the editor have all the available height
             $(window).on('resize.editor', function() {
   var offset = $('#editor1').parent().offset();
   var winHeight =  $(this).height();

   $('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
   }).triggerHandler('resize.editor');
             */
            $('[data-toggle="buttons"] .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                var toolbar = $('#editor1').prev().get(0);
                if(which >= 1 && which <= 4) {
                    toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
                    if(which == 1) $(toolbar).addClass('wysiwyg-style1');
                    else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
                    if(which == 4) {
                        $(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
                    } else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
                }
            });
            //RESIZE IMAGE

            //Add Image Resize Functionality to Chrome and Safari
            //webkit browsers don't have image resize functionality when content is editable
            //so let's add something using jQuery UI resizable
            //another option would be opening a dialog for user to enter dimensions.
            if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {

                var lastResizableImg = null;
                function destroyResizable() {
                    if(lastResizableImg == null) return;
                    lastResizableImg.resizable( "destroy" );
                    lastResizableImg.removeData('resizable');
                    lastResizableImg = null;
                }
                var enableImageResize = function() {
                    $('.wysiwyg-editor')
                        .on('mousedown', function(e) {
                            var target = $(e.target);
                            if( e.target instanceof HTMLImageElement ) {
                                if( !target.data('resizable') ) {
                                    target.resizable({
                                        aspectRatio: e.target.width / e.target.height,
                                    });
                                    target.data('resizable', true);

                                    if( lastResizableImg != null ) {
                                        //disable previous resizable image
                                        lastResizableImg.resizable( "destroy" );
                                        lastResizableImg.removeData('resizable');
                                    }
                                    lastResizableImg = target;
                                }
                            }
                        })
                        .on('click', function(e) {
                            if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
                                destroyResizable();
                            }
                        })
                        .on('keydown', function() {
                            destroyResizable();
                        });
                }
                enableImageResize();
                /**
                 //or we can load the jQuery UI dynamically only if needed
                 if (typeof jQuery.ui !== 'undefined') enableImageResize();
                 else {//load jQuery UI if not loaded
   //in Ace demo ./components will be replaced by correct components path
   $.getScript("assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
   enableImageResize()
   });
   }
                 */
            }
        });
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836836 = new Ya.Metrika({id:25836836,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
                } catch(e) { }
            });
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="//mc.yandex.ru/watch/25836836" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-38894584-2', 'auto');
        ga('send', 'pageview');
    </script>
@stop