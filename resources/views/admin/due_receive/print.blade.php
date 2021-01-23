@extends('admin.layouts.master')
@section('title','Due Payment')
@section('page-header')
   <i class="fa fa-plus-circle"></i> Institute Income Preview
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stop
@section('content')


   <div  class="row">
      <div class="col-xs-12">
         <!-- PAGE CONTENT BEGINS -->
         <div class="less-margin"></div>
         <div class="row">
            <div class="col-sm-10">
               <div class="widget-box transparent">
                  <div class="widget-header widget-header-large"  style="border: none !important;">
                     
                     <img height="100px" width="100px" src="{{asset('uploads/siteconfig/')}}/{{$basicData->faviconImage}}"
                          alt="{{$basicData->faviconImage}}"
                          style="position: absolute;left: 0;margin-left: 40px;margin-top: -20px;">
                     <div class="widget-header widget-header-large text-center" style="background:none;">
                        <h2 class="widget-title grey lighter"
                            style="font-weight:600; font-size: 30px;"><b>{{$basicData->name}}</b></h2>
                        <h5>{{!empty($basicData->address)?$basicData->address:''}}</h5>
                        <h5>
                           Phone: <span style="display: inline-block">
                                          {{!empty($basicData->phone_number1)?$basicData->phone_number1:''}}
                                       </span>,
                           Email: <span style="display: inline-block">
                                          {{!empty($basicData->address)?$basicData->email:''}}
                                       </span>
                        </h5>
                  </div>
                  <div class="widget-body">
                     <div class="widget-main padding-24">
                        <div class="row">
                           <div class="row">
                              <style>
                                 .reciept{
                                    text-align: center;
                                    background:none;
                                    color: #000;
                                 }
                                 .spaced>li {
                                    margin-top:0px;
                                    margin-bottom:0px;
                                }
                              </style>
                              <div class="col-xs-11 reciept"
                                   style="border: none">
                                 <b><h2 style="margin-top: 0px;" >Money Receipt</h2></b>
                              </div>
                              <div class="">
                                 <a style="font-size: 26px;" href="#">
                                    <i onclick="printFunction()" class="ace-icon fa fa-print hidden-print"></i>
                                 </a>
                              </div>                              
                           </div>
                        <div class="col-sm-12  col-md-6  col-xs-6">
                            <div class="widget-toolbar no-border invoice-info" style="float:left;">

                                <ul class="list-unstyled  spaced">
                                    @php
                                        $student =\App\StudentProfile::where('id','=',$datas['student_id'])->firstOrFail();
                                        $course =\App\course::where('id','=',$student->courseName)->select('title')->first();
                                    @endphp
                                    {{-- @dd($student->toArray()); --}}
                                    <li>
                                        Student Name : {{!empty($student->studentId)?$student->name:''}}
                                    </li>
                                    <li>
                                        Course Name : {{$course['title']}}
                                    </li>
                                    <li>
                                        Email : {{$student->email}}
                                    </li>
                                    <li>
                                        Phone :  {{$student->phoneNo}}
                                    </li>
                                </ul>
                            </div>
                        </div>


                           <div class="col-sm-12 col-md-6 col-xs-6">
                              <div class="widget-toolbar no-border invoice-info">
                              <ul class="list-unstyled  spaced">
                                 @php
                                    $student =\App\StudentProfile::where('id','=',$datas['student_id'])->firstOrFail();
                                    $session =\App\StudentSession::where('id','=',$student->session)->select('session_name')->first();
                                 @endphp
                                 <li>
                                    Student Id : {{!empty($student->studentId)?$student->studentId:''}}
                                 </li>
                                 <li>
                                    Session : {{!empty($student->session)?$session->session_name:''}}
                                 </li>
                                 <li>
                                    <span class="invoice-info-label">Date:</span>
                                    <span class="blue">@php
                                        echo date("dM, Y");
                                    @endphp</span>
                                 </li>
                                  <li>
                                    <span class="red">Voucher No: {{$id}}</span>
                                 </li> 
                              </ul>
                                 <br />
                              </div>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="space"></div>
                        <div>
                           <table class="table table-striped table-bordered">
                              <thead>
                              <tr>
                                  {{-- @dd($datas); --}}
                                 <th>Sl</th>
                                 <th>Payment Info</th>
                                 <th>Due Amount</th>
                                 <th>Paid Amount</th>
                              </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td>{{'1'}}</td>
                                    <td>{{ $datas['payment_info'] }}</td>
                                    <td>{{ $datas['due_amount'] }}</td>
                                    <td>{{ $datas['payment_amount'] }}</td>                                 
                                </tr>
                              </tbody>
                           </table>
                           <div class="row">
                              <div class="col-md-6">
                                 <h5 style="margin-top: -15px;margin-bottom: 15px;">
                                    In words : {{str_replace("Only.","Taka Only .",Helper::convertNumberToWords($datas['payment_amount'])) }}
                                 </h5>
                              </div>
                              <div class="col-md-6">

                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              {{-- <div style="border-top:2px dashed #000;width: 30%;padding-top: 5px;margin-top: 13px;" class="signature-border pull-right"><center>Student Signature</center></div>
                              <p  class="text-right stignature"> </p> --}}
                           </div>
                           <div class="col-md-6">
                              <div style="border-top:2px dashed #000;width: 30%;padding-top: 5px;margin-top: 13px;" 
                                   class="signature-border pull-right">
                                 <center>Prepared By</center></div>

                              {{-- <div style="border-top:2px dashed #000;width: 30%;padding-top: 5px;margin-top: 13px;"
                                    class="signature-border pull-left"><center>Prepared By</center></div> --}}
                              <p  class="text-right stignature"> </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- PAGE CONTENT ENDS -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   </div><!-- /.page-content -->
   </div>
</div><!-- /.main-content -->
&nbsp;
   <div class="footer" style="padding-top: 5px;">
      <div class="footer-inner" >
         <div class="footer-content" style="border: none !important; text-align:center;" >
               <strong class="bigger-120">Powered By&nbsp;<a>MM IT SOFT LTD.</a></strong>
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
         function printFunction() {
            window.print();
         }
         window.onload = function() { window.print(); }
      </script>
   <style>
   .stignature-border{
      background-color:  #ff0000;
      height: 2px;
      width: 50%;
   }
      @media print {
         .signature-borde{
            margin-top: 30px;
            margin-bottom: -200px;
         }
         .less-margin{
            margin-top: -40px;
         }
      }
      .d-print-none{
         display: none;
      }
   </style>
@stop