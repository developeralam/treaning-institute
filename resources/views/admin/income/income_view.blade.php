@extends('admin.layouts.master')
@section('title','Institute Income')
@section('page-header')
<i class="fa fa-plus-circle"></i> Institute Income
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
                        <div class="space-6"></div> 
                        <div class="row">
                           <div class="col-sm-10">
                              <div class="widget-box transparent">
                                 <div class="widget-header widget-header-large" style="border: none !important;">
                                    <img height="100px" width="100px" src="{{asset('uploads/siteconfig/')}}/{{$basicData->logo}}"
                                         alt="{{$basicData->faviconImage}}"
                                         style="position: absolute;left: 0;margin-left: 40px;margin-top: -20px;">

                                    <div class="widget-header widget-header-large text-center" style="background:none;">
                                       <h2 class="widget-title grey lighter"><b> {{$basicData->name}} </b></h2>
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
                                    <div class="widget-main padding-24" style="padding-top: 5px">
                                       <div class="row">
{{--                                          <div class="col-sm-12 col-md-6 col-xs-6">--}}
{{--                                             <div class="row">--}}
{{--                                                <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">--}}
{{--                                                   <b>Company Information</b>--}}
{{--                                                </div>--}}
{{--                                             </div>--}}

{{--                                             <div>--}}
{{--                                                <ul class="list-unstyled spaced">--}}
{{--                                                   <li>--}}
{{--                                                      <i class="ace-icon fa fa-caret-right blue"></i> {{$basicData->name}}--}}
{{--                                                   </li>--}}

{{--                                                   <li>--}}
{{--                                                      <i class="ace-icon fa fa-caret-right blue"></i> {{!empty($basicData->phone_number1)?$basicData->phone_number1:''}}--}}
{{--                                                   </li> --}}
{{--                                                   <li>--}}
{{--                                                      <i class="ace-icon fa fa-caret-right blue"></i>{{!empty($basicData->address)?$basicData->address:''}}--}}
{{--                                                   </li>  --}}
{{--                                                   <li class="divider"></li>  --}}
{{--                                                </ul>--}}
{{--                                             </div>--}}
{{--                                          </div><!-- /.col --> --}}

                                          <div class="row">
                                             <div class="col-xs-12 text-center">
                                                <h3 style="margin-top: 0px;" ><b>Credit Voucher</b></h3>
                                             </div>
                                          </div> 
                                          <div class="col-sm-12  col-md-6  col-xs-6">
                                             <div>
                                                <ul class="list-unstyled  spaced">
                                                   <li>
                                                      <i class="ace-icon fa fa-caret-right green"></i>Name : {{$data->party->name}}
                                                   </li> 
                                                   {{--  <li>
                                                      <i class="ace-icon fa fa-caret-right green"></i>Email : {{$data->party->email}}
                                                   </li>  --}}
                                                   <li>
                                                      <i class="ace-icon fa fa-caret-right green"></i>Phone : {{$data->party->phone}}
                                                   </li> 
                                                </ul>
                                             </div>
                                          </div><!-- /.col -->
                                          <div class="col-sm-12 col-md-6 col-xs-6">
                                             <div class="widget-toolbar no-border invoice-info">
                                                <span class="red">Voucher No: {{$data->id}}</span>

                                                <br />
                                                <span class="invoice-info-label">Date:</span>
                                                <span class="blue">{{$data->payment_date}}</span>
                                             </div>

                                             <div class="widget-toolbar hidden-480">
                                                <a style="font-size: 26px;" href="#">
                                                   <i onclick="printFunction()" class="ace-icon fa fa-print hidden-print"></i>
                                                </a>
                                             </div>
                                          </div>
                                       </div><!-- /.row -->

                                       <div class="space"></div>

                                       <div>
                                          <table class="table table-striped table-bordered">
                                             <thead>
                                                <tr>
                                                   <th>Sl</th>
                                                   <th>Account Name</th>
                                                   <th>Description</th>
                                                   <th>Payable Amount</th>
                                                   <th>Paid Amount</th>
                                                   <th>Due Amount</th>
                                                </tr>
                                             </thead>

                                             <tbody>
                                                
                                                <tr>
                                                   <td>{{01}}</td>
                                                   <td>{{$accountName}}</td>
                                                   <td>{{$data->description}}</td>
                                                   <td>{{$data->payable_amount}}</td>
                                                   <td>{{$data->paid_amount}}</td>
                                                   <td>{{$data->due_amount}}</td>
                                                </tr> 
                                                <tr>
                                                   <td colspan="5"><span class="pull-right">Total :</span></td>
                                                   <td>
                                                      <span class="red">৳{{$data->paid_amount}}</span>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>

                                          <div class="row">
                                             <div class="col-md-6">
                                                
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

                        <!-- PAGE CONTENT ENDS -->
                     </div><!-- /.col -->
                  </div><!-- /.row -->
               </div><!-- /.page-content -->
            </div>
         </div><!-- /.main-content -->
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
 