@extends('admin.layouts.master')
@section('title','Sms Panel')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Sms Panel
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
    <style>
        .custom{
            font-weight: bold;
            font-style: italic;
        }
        /* The switch - the box around the slider */
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }

        /* The slider */
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
        .float-right{
            float:right;
        }
        .m-top{
            margin-top:3px;
        }
        .sms-switch h3{
            font-size:15px;
        }
    </style>
@stop


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
                </div><!-- .widget-header end -->
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="panel panel-default sms-switch-wrapper">
                            <div class="panel-heading">
                                <h3>SMS Settings (On/Off)</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{route('admin_sms_switch.store')}}" method="post">
                                    @csrf
                                    <div class="sms-switch">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="student_addmission_online_switch" value="1" {{$switch->student_addmission_online_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Student Admission Sms Online</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="student_addmission_manual_switch" value="1" {{$switch->student_addmission_manual_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Student Admission Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="student_approve_switch" value="1" {{$switch->student_approve_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Student Addmission Approve Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="student_fee_collection_switch" value="1" {{$switch->student_fee_collection_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Student Fee Collection Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="institute_income_switch" value="1" {{$switch->institute_income_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Institute Income Switch</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="institute_expence_switch" value="1" {{$switch->institute_expence_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Institute Expence Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="student_payment_due_switch" value="1" {{$switch->student_payment_due_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Student Payment Due Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="expence_payment_due_switch" value="1" {{$switch->expence_payment_due_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Expence Payment Due Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <!-- Rounded switch -->
                                                        <label class="switch float-right">
                                                          <input type="checkbox" name="income_payment_due_switch" value="1" {{$switch->income_payment_due_switch == 1? 'checked': ''}}>
                                                          <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <h3 class="custom m-top">Income Payment Due Sms</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </difv>
                                        <input type="submit" value="Save" class="btn btn-success">
                                    </div><!-- .sms-switch end -->
                                </form>
                            </div>
                        </div><!-- .sms-switch-wrapper end -->
                        <div class="panel panel-default sms-content-wrapper">
                            <div class="panel-heading">
                                <h3>SMS Content Settings</h3>
                            </div>
                            <div class="panel-body">
                                <div class="sms-content">
                                    <form action="{{route('admin_sms.store')}}" method="post" class="sms-content-form">
                                        @csrf
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="student_addmission" class="custom">Student Admission Online</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="student_admission_online" id="student_addmission" class="form-control" cols="30" rows="7">{{$sms->student_admission_online}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="student_admission_manual" class="custom">Student Admission Manual</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="student_admission_manual" id="student_admission_manual" class="form-control" cols="30" rows="7">{{$sms->student_admission_manual}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="student_approved" class="custom">Student Approved</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="student_approved" id="student_approved" class="form-control" cols="30" rows="7">{{$sms->student_approved}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="student_fee_collection" class="custom">Student Fee Collection</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="student_fee_collection" id="student_fee_collection" class="form-control" cols="30" rows="7">{{$sms->student_fee_collection}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="institute_income" class="custom">Institute Income</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="institute_income" id="institute_income" class="form-control" cols="30" rows="7">{{$sms->institute_income}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="institute_expence" class="custom">Institute Expence</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="institute_expence" id="institute_expence" class="form-control" cols="30" rows="7">{{$sms->institute_expence}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 cPol-lg-3">
                                                        <label for="student_payment_due" class="custom">Student ayment Due</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="student_payment_due" id="student_payment_due" class="form-control" cols="30" rows="7">{{$sms->student_payment_due}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3">
                                                        <label for="income_due" class="custom">Income Due</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="income_due" id="income_due" class="form-control" cols="30" rows="7">{{$sms->income_due}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <div class="row">
                                                    <div class="col-md-3 cPol-lg-3">
                                                        <label for="expence_due" class="custom">Expence Due</label>
                                                    </div>
                                                    <div class="col-md-9 col-lg-9">
                                                        <textarea name="expence_due" id="expence_due" class="form-control" cols="30" rows="7">{{$sms->expence_due}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Save" class="btn btn-success">
                                    </form>
                                </div><!-- .sms-content end -->
                            </div>
                        </div><!-- .sms-content-wrapper end -->
                    </div>
                </div>
            </div><!-- .widget-box end -->
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


@stop