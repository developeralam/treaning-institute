@extends('admin.layouts.master')
@section('title','Students Profile Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Students Profile
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
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
                        <form class="form-horizontal" id="studentProfile" method="POST" action="{{ route('studentProfile.store',$item->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Select Session</label>--}}
{{--                                <div class="col-sm-3" >--}}
{{--                                    <select class="chosen-select form-control @error('session') is-invalid @enderror" id="form-field-select-3" data-placeholder="Choose a Session..." name="session" >--}}
{{--                                        @foreach($configurations as $conf)--}}
{{--                                            @if($conf->session == 1)--}}
{{--                                                <option> </option>--}}
{{--                                                <option value="{{ $conf->id }}"  {{ old('session') == $conf->id ? 'selected' : '' }} > {{ $conf->data }} </option>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('session')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Select Batch</label>--}}
{{--                                    <div class="col-sm-3" style="padding-right:35px;">--}}
{{--                                        <select class="chosen-select form-control  @error('batch') is-invalid @enderror" id="form-field-select-3" data-placeholder="Choose a Batch..." name="batch">--}}
{{--                                            @foreach($configurations as $conf)--}}
{{--                                                @if($conf->batch == 1)--}}
{{--                                                    <option> </option>--}}
{{--                                                    <option value="{{ $conf->id }}" {{ old('batch') == $conf->id ? 'selected' : '' }} >--}}
{{--                                                        {{ $conf->data }}--}}
{{--                                                    </option>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error('batch')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                           <strong>{{ $message }}</strong>--}}
{{--                           </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Select Course </label>--}}
{{--                                <div class="col-xs-12 col-sm-9">--}}
{{--                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Course..." name="courseName">--}}
{{--                                        @foreach($courses as $course)--}}
{{--                                            <option value="{{ $course->title }}"--}}
{{--                                                    @if($item->course == $course->id)--}}
{{--                                                    selected--}}
{{--                                                    @endif--}}
{{--                                            >{{ $course->title }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    <input   type="hidden" name="apply_id" value="{{$item->id}}">--}}
{{--                                    <input   type="hidden" name="approve" value="1">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="form-field-1-1"> Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control @error('name') is-invalid @enderror " name="name" value="{{$item->name}}"  />
                                            <input type="hidden" name="apply_id" value="{{$item->id}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
{{--                                        <label class="control-label"> Photo </label>--}}
                                        <img class="form-control pull-right" id="previewLogo" src="{{url('/')}}/{{$item->image}}" alt="{{$item->image}}" style="height: 100px;width: 100px;margin-right: 30px"/>
                                        <input type="hidden" name="applyImage" value="{{$item->image}}">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="std_session" class="col-xs-12 col-sm-3 col-md-3 control-label">Search Session</label>
                                <div class="col-sm-3" >
                                    <select class="chosen-select session form-control @error('session') is-invalid @enderror " id="std_session" data-placeholder="Choose a Session..." name="session" >
                                        @foreach($sessions as $session)
                                            <option value="">  </option>
                                            <option value="{{ $session->id }}"  {{ old('session') == $session->id ? 'selected' : '' }} >{{ $session->session_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('session')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="std_batch" class="col-xs-12 col-sm-3 col-md-3 control-label">Select Batch</label>
                                    <div class="col-sm-3" style="padding-right:35px;">
                                        <select class="chosen-select form-control batch @error('batch') is-invalid @enderror " id="std_batch" data-placeholder="Choose a Batch..." name="batch" >
                                            <option></option>
                                            @foreach($batches as $batch)
                                                <option value="{{ $batch->id }}" {{ old('batch') == $batch->id ? 'selected' : '' }}>{{$batch->batch_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('batch')
                                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="course_name" class="col-xs-12 col-sm-3 col-md-3 control-label">Select Course </label>
                                <div class="col-xs-12 col-sm-9">
                                    <select class="chosen-select course form-control @error('courseName') is-invalid @enderror " id="std_course" data-placeholder="Choose a Course..." name="courseName">
                                        @foreach($courses as $course)
                                            <option value="">  </option>
                                            <option value="{{ $course->id }}"
                                                    @if($item->course == $course->id)
                                                    selected
                                                    @endif
                                            >{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('courseName')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="student_id"> Student Id</label>
                                <div class="col-sm-5">
                                    <input type="text" id="student_id" placeholder="Student Id" class="form-control @error('studentId') is-invalid @enderror" name="studentId" value="{{ old('studentId') }}" readonly/>
                                    @error('studentId')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Fathers Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Fathers Name" class="form-control @error('fatherName') is-invalid @enderror " name="fatherName" value="{{$item->fatherName}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Mothers Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Mothers Name" class="form-control @error('motherName') is-invalid @enderror " name="motherName" value="{{$item->motherName}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth" class="col-xs-12 col-sm-3 col-md-3 control-label" > Date of Birth</label>
                                <div class="col-sm-5">
                                    {{--   <input type="text" id="form-field-1-1" placeholder="Enter Date of Birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Date of Birth'" class="form-control @error('dob') is-invalid @enderror " name="dob" value="{{ old('dob',$items->dob??null) }}" /> --}}
                                    <input class="form-control date-picker @error('dob') is-invalid @enderror " name="dob" id="date_of_birth" value="{{ old('dob',$items->dob??null) }}" type="text" data-date-format="dd-mm-yyyy" / placeholder="Date of birth">
                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Nid/Birth Certificate</label>
                                <div class="col-sm-5">
                                    <input type="text" id="form-field-1-1" placeholder="Enter Date of Birth" class="form-control @error('dob') is-invalid @enderror " name="nid" value="{{$item->dob}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Blood Group </label>
                                <div class="col-sm-3">
                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a blood group..." name="bloodGroup">
                                        @foreach($configurations as $conf)
                                            @if($conf->bloodGroup == 1)
                                                <option value="{{ $conf->id }}"
                                                        @if($item->bloodGroup == $conf->id)
                                                        selected
                                                        @endif
                                                >{{ $conf->data }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label">Religion </label>
                                    <div class="col-sm-3" style="padding-right:35px;">
                                        <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Religion..." name="religion">
                                            @foreach($configurations as $conf)
                                                @if($conf->religion == 1)
                                                    <option value="{{ $conf->id }}"
                                                            @if($item->religion == $conf->id)
                                                            selected
                                                            @endif
                                                    >{{ $conf->data??'' }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"> Gender</label>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="radio">
                                        @foreach($configurations as $conf)
                                            @if($conf->gender == 1)
                                                <label>
                                                    <input name="gender" type="radio" class="ace" value="{{ $conf->id }}" @if($item->gender == $conf->id) checked @endif>
                                                    <span class="lbl" > {{ $conf->data }}</span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Phone No</label>
                                <div class="col-sm-6">
                                    <input type="text" id="form-field-1-1" placeholder="Enter Phone No......" class="form-control @error('phoneNo') is-invalid @enderror"  pattern="\d*" maxlength="11" minlength="11" name="phoneNo" value="{{$item->phone}}" />
                                    @error('phoneNo')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1">Guardian Phone No</label>
                                <div class="col-xs-6">
                                    <input type="text" id="form-field-1-1" placeholder="Enter Guardian Phone No......" class="form-control @error('guardianPhoneNo') is-invalid @enderror" pattern="\d*" maxlength="11" minlength="11" name="guardianPhoneNo"  value="{{$item->guardianPhone}}" />
                                    @error('guardianPhoneNo')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Email</label>
                                <div class="col-sm-9">
                                    <input type="email" id="form-field-1-1" placeholder="Enter email address...." class="form-control" name="email"  value="{{$item->email}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Present Address</label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Enter Present address...." class="form-control" name="presentAddress"  value="{{$item->presentAddress}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Parmanent Address</label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1-1" placeholder="Enter Parmanent address...." class="form-control" name="parmanentAddress"  value="{{$item->permanentAddress}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-field-1-1"> Last Qualification </label>
                                <div class="col-sm-9">
                        <textarea  name="body"
                                   style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; ">{{$item->lastEduProfile}}</textarea>
                                </div>
                            </div>
                            {{-- @dd($item->image); --}}

                        {{--
                        <div class="form-group row">
                           <label class="control-label col-md-3" for="photo"> Photo </label>
                           <div class="col-md-8" title="file size must be in (2x2)px">
                              <input name="image" id="photo" class="form-control @error('image') is-invalid @enderror" value="{{  $item->image??null) }}" type="file" onchange="readURL(this)" accept="image/*"> <br/>
                              <img id="previewLogo" src="/uploads/studentprofile/{{$item->image??null}}" height="60" width="215"/>
                           </div>
                        </div>
                        --}}
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1-1">Status</label>
                        <div class="col-sm-9">
                            <label> <input type="radio" name="status" checked value="1"> Active</label> &nbsp;&nbsp;
                            <label> <input type="radio" name="status" value="0"> In-Active</label>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-bottom: 6%;">
                            <label for="inputError" class="col-xs-12 col-sm-3 col-md-3"></label>
                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
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
    <script>
        function makeStudentCode(sessionId, batchId, courseId){
            $.ajax({
                url: '{{ route("generate-id") }}',
                type: 'GET',
                data: {
                    'sessionId': sessionId,
                    'batchId': batchId,
                    'courseId': courseId
                },
                success:function(res){
                    $('#student_id').val(res);
                    console.log(res);
                }
            });
        }
        $('#studentProfile').on('change', function(){
            var sessionId = $('#std_session').val();
            var batchId = $('#std_batch').val();
            var courseId = $('#std_course').val();
            makeStudentCode(sessionId, batchId, courseId);
        });
    </script>

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
                    $('#previewLogo')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop