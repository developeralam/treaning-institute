	@extends('admin.layouts.master')
@section('title','Student Due Recive List')
@section('page-header')
   <span class="hidden-print"><i class="fa fa-plus-circle"></i> Expence Due Recive List</span> 
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
        <div class="col-sm-12 col-sm-offset-0">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> @yield('page-header')</h4>
                </div>
                {{-- @include('admin.layouts.includes.msg') --}}
                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('search-student-payment-report')}}" method="post">
                            @csrf
                            <div class="row">
                                
                               
                                    <a href="#" class="btn btn-sm" style="float:right; margin-right: 10px;" id="print_btn">
                                    <i class="ace-icon fa fa-print hidden-print"></i>
                                    </a>
                            </div>
                        </form>
                        <div class="mt-5"></div>
                    <div class="row" id="student_payment_report"> 
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <h2 style="margin-bottom: -10px;" class="visible-print text-center">{{$basicData->name}}</h2>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <h5 class="text-center">Student Payment Due Recive List</h5>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Paid Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $students)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$students->payment_date}}</td>
                                            <td>{{$students->due_amount}}</td>
                                            <td>{{$students->pay_amount}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        @if(!empty($std_income))
                           <div style="margin-top: -10px;margin-left: 10px;" class="col-md-12">
                              <span><!-- {{Helper::convertNumberToWords($sum)}} --></span>
                           </div>
                        @endif
                    </div>
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

    <script type="text/javascript" src="{{ asset('admin/assets/js/printThis.js') }}"></script>
    \
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

    <script>
        $('#print_btn').on("click", function () {
            $('#student_payment_report').printThis({
                importCSS: true,
                // header: "<h1>Look at all of my kitties!</h1>",
                // base: "https://jasonday.github.io/printThis/"
            });
        });
    </script>
@stop