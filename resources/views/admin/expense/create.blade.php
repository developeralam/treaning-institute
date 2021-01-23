@extends('admin.layouts.master')
@section('title','Institute Expense')
@section('page-header')
<i class="fa fa-plus-circle"></i> Institute Expense 
<a style="margin-top: 5px;margin-right: 10px" href="{{ route('expense.index')}}" class="btn btn-sm btn-info btn-xs pull-right"> <i class="fa fa-plus"></i> Expense List</a>
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
<div class="row">
   <div class="col-sm-8 col-sm-offset-2">
      <div class="widget-box" style="margin: 3px -150px;">
         <div class="widget-header">
            <h4 class="widget-title"> @yield('page-header')</h4>
         </div>
         @include('admin.layouts.includes.msg')
         {{-- 
         <div class="widget-body">
            --}}
            <div class="widget-main" style="margin-bottom: 114px;">
               <form class="form-horizontal" method="POST" action="{{ route('expense.store') }}" role="form" >
                  {{ csrf_field() }}
                  {{-- select box option search --}}
                  {{-- 
                  <select class="form-control selectpicker" id="select-country" data-live-search="true">
                     <option data-tokens="china">China</option>
                     <option data-tokens="malayasia">Malayasia</option>
                     <option data-tokens="singapore">Singapore</option>
                  </select>
                  --}}
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="50%">
                              <label class="col control-label label_style" for="form-field-1-1">  Party Name</label>
                           </th>
                           <th  width="50%">
                              <label class="col control-label label_style" for="form-field-1-1"> Payment Date </label>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <td class="col-sm-1">
                           <select class="chosen-select form-control" data-placeholder="Choose a account..." name="party_id"  id="form-field-select-3" required>
                              <option value="">----Party Name----</option>
                              @foreach ($parties as $party)
                              <option value="{{$party->id}}">{{$party->name}}</option>
                              @endforeach   
                           </select>
                        </td>
                        <td class="col-sm-3">
                           <div class="input-group">
                              <input class="form-control date-picker" id="id-date-picker-1" type="date"  data-date-format="dd-mm-yyyy" name ="payment_date"   value="<?php echo date('Y-m-d'); ?>"  />
                              <span class="input-group-addon">
                              <i class="fa fa-calendar bigger-110"></i>
                              </span>
                           </div>
                        </td>
                     </tbody>
                  </table>
                  <table id="addInput" style="width: 100%" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>
                              <label class="col control-label label_style" for="form-field-1-1"> Chart of account </label>
                           </th>
                           <th>                                
                              <label class="col control-label label_style" for="form-field-1-1"> Description </label>   
                           </th>
                           <th>
                              <label class="col control-label payable label_style" for="form-field-1-1">  Payable Amount </label>
                           </th>
                           <th>
                              <label class="col control-label payable label_style" for="form-field-1-1">  Paid Amount </label>
                           </th>
                           <th>
                              <label class="col control-label payable label_style" for="form-field-1-1"> Action </label>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <td class="col-sm-3">
                           <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a account..." name="type"> 
                              <option value="">----Select Account-----</option>
                              @foreach ($accounts as $account)
                              <option value="{{$account->id}}">{{$account->name_of_account}}</option>
                              @endforeach
                           </select>
                        </td>
                        <td class="col-sm-3" >
                           <input type="text" name="description" placeholder="Description" class="form-control"  value="{{ old('description')??'' }}" required />
                        </td>
                        <td class="col-sm-3">
                           <input type="number" keyup="hello" name="payable" id="payable" placeholder="Payable ammount" class="form-control paid-input" value="{{ old('payable') }}" required />
                        </td>
                        <td class="col-sm-3">
                           <input type="number" keyup="hello" name="paid" id="paid" placeholder="Paid ammount" class="form-control paid-input" value="{{ old('paid') }}" required />
                        </td>
                     </tbody>
                     <br/>
                  </table>
                  <br/>
                  <div class="form-group " style="margin-left: 50%">
                     <div class="form-group">
                                <label class="col-sm-5 control-label" for="form-field-1-1"> Payable ammount </label>
                                <div class="col-sm-6">
                                    <input type="number"  placeholder="Payable ammount" class="form-control payable-amount" name="payable_amount" id="payable_amount" value="" readonly style="margin-bottom: 8px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="form-field-1-1"> Paid ammount </label>
                                <div class="col-sm-6">
                                    <input type="number"  placeholder="Paid ammount" class="form-control paid-amount" name="paid_amount" id="paid_amount" value="" readonly style="margin-bottom: 8px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label" for="form-field-1-1"> Due ammount </label>
                                <div class="col-sm-6">
                                    <input type="text" id="due-amount" placeholder="Due ammount" 
                                           class="form-control" name="due_amount"
                                        style="margin-bottom: 8px" />
                                </div>
                            </div>
                     <script>
                        let paid = document.querySelectorAll('.paid-input');
                        console.log(paid);
                        paid.forEach(function(pd){
                          console.log(pd);
                            var total = 0;
                        pd.addEventListener('keyup', function (){
                               total = parseFloat($(this).val());
                              $('#paidTotal').val((total).toFixed(2));
                              var payableAmount = $(".payable-amount").val(); 
                              var paidAmount = $(".paid-amount").val(); 
                              $('.due-amount').val((payableAmount-paidAmount).toFixed(2));
                          }, false);  
                        });
                        
                        console.log(paid);
                        
                        function hello(){
                          console.log("hi");
                        }
                     </script> 
                  </div>
                  <br/>
                  <div class="form-group">
                     <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>
                     <div class="col-lg-8 col-xs-12 col-sm-3">
                        <button type="submit" class="btn btn-info pull-right"> <i class="fa fa-save" ></i>  Bill Pay</button>
                     </div>
                  </div>
               </form>
            </div>
            {{-- 
         </div>
         --}}
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
{{-- snippets --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
        
        $(document).ready(function(){

            //Amount Calculation 
            $("#payable").keyup(function(){
                var payable = $("#payable").val();
                $("#payable_amount").val(payable);
            })

            $("#paid").keyup(function(){
                var paid = $("#paid").val();
                $("#paid_amount").val(paid);
            })

            $("#paid").blur(function(){
                var payable = $("#payable").val();
                var paid = $("#paid").val();
                var due = (payable-paid);
                $("#due-amount").val(due);
            });



        });

    </script>
@stop