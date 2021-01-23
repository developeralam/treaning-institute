@extends('admin.layouts.master')
@section('title','Expense Report')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Expense Report
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
    <style>
        @media print {

        }
    </style>
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
                        <form action="{{url('search-expense')}}" method="post">
                            @csrf
                            <div class="row hidden-print">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group hidden-print">
                                        <label for="from_date">From Date</label>
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="from_date" name="from_date" type="text" name="to_date" data-date-format="dd-mm-yyyy" placeholder="Search From" required>
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group hidden-print">
                                        <label for="to_date">To Date</label>
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="to_date" type="text" name="to_date" data-date-format="dd-mm-yyyy"  placeholder="Search To" required>
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for=""></label>
                                    <div style="margin-top: 8px;" class="form-group">
                                        <button style="margin-left: -24px;" type="submit" class="btn btn-sm btn-success"> <i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                                <div class="col-md-1" style="margin-top:25px;">
                                    <span id="print_btn" class="btn btn-sm">
                                        <i class="ace-icon fa fa-print"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5"></div>
                    <div class="row" id="expense_report" style="width: 100%!important;">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <h2 style="margin-bottom: -10px;" class="text-center visible-print">{{$basicData->name}}</h2>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <h5 class="text-center">Expense Report <p style="padding-top: 15px;font-size: 14px;"> {{!empty($ff_date)?'Date: '.$ff_date :''}}  {{!empty($tt_date)?' - '.$tt_date:''}}</p></h5>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Party Name</th>
                                    <th>Account Head</th>
                                    <th>Description</th>
                                    <th>Payment Date</th>
                                    <th>Payable Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($expences as $expence)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{App\Expense::partyName($expence->party_id)}}</td>
                                        <td>{{App\Expense::accountName($expence->type)}}</td>
                                        <td>{{$expence->description}}</td>
                                        <td>{{$expence->payment_date}}</td>
                                        <td>{{$expence->payable_amount}}</td>
                                        <td>{{$expence->paid_amount}}</td>
                                        <td>{{$expence->due_amount}}</td>
                                    </tr> 
                                    @endforeach
                                   <!-- <tr>
                                      <td class="text-right" colspan="2">Total = </td>
                                      <td></td>
                                   </tr> -->
                                </tbody>
                            </table>
                        </div> 
                        @if(!empty($expenseData))
                            <div style="margin-top: -15px;margin-left: 10px;" class="col-md-12">
                                <span>{{Helper::convertNumberToWords($sum)}}</span>
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

{{--    <link rel="stylesheet" href="https://jasonday.github.io/printThis/assets/css/normalize.css">--}}
{{--    <link rel="stylesheet" href="https://jasonday.github.io/printThis/assets/css/skeleton.css">--}}

{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <!-- printThis -->
    <script type="text/javascript" src="{{ asset('admin/assets/js/printThis.js') }}"></script>
    <!-- Side Bar -->

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
    <script type="text/javascript">
        // $('#print_btnn').on('click',function () {
        //     var printContents = document.getElementById('expense_report').innerHTML;
        //     var originalContents = document.body.innerHTML;
        //     document.body.innerHTML = printContents;
        //     window.print();
        //     document.body.innerHTML = originalContents;
        // })
        $('#print_btn').on("click", function () {
            $('#expense_report').printThis({
                importCSS: true,
                // header: "<h1>Look at all of my kitties!</h1>",
                // base: "https://jasonday.github.io/printThis/"
            });
        });
    </script>
@stop