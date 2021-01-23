@extends('admin.layouts.master')
@section('title','Students payment Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Students payment
    <a style="margin-top: 5px;margin-right: 10px" href="{{ route('student-payment.index')}}" class="btn btn-sm btn-info btn-xs pull-right"> <i class="fa fa-plus"></i>    Students Payment List</a>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery.gritter.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}"/>
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
                     <form class="form-horizontal" method="POST" action="{{ route('student-payment.store') }}"  >
                        {{ csrf_field() }}
                        <table style="width: 100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Year
                                    </th>
                                    <th>
                                        Course
                                    </th>
                                    <th>
                                        Batch
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <td class="col-sm-3">
                                     <select name="year_id" id="year_id" class="form-control">
                                        @foreach(App\Year::getAllYear() as $year)
                                         <option value="{{$year->year_id}}">{{$year->year}}</option>
                                        @endforeach
                                     </select>

                                </td>
                                <td class="col-sm-3">
                                    <select name="course_id" id="course_id" class="form-control">
                                        @foreach(App\Course::getAllCourse() as $course)
                                         <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                     </select>
                                </td>
                                <td class="col-sm-3">
                                    <select name="batch_id" id="batch_id" class="form-control">
                                        
                                     </select>
                                </td>
                                <td class="col-sm-3">
                                    <select name="student_id" id="student_id" class="form-control">
                                        <option value="">Select One....</option>
                                    </select>
                                </td>
                            </tbody>
                        </table>
                        <table id="addInput" style="width: 100%" class="table table-bordered " >
                            <thead>
                            <tr>
                                <th>
                                    <label class="col control-label label_style" for="form-field-1-1"> Chart of account </label>
                                </th>
                                <th>
                                    <label class="col control-label label_style" for="form-field-1-1"> Description </label>
                                </th>
                                <td>
                                    <label class="col control-label label_style" for="form-field-1-1"> Date </label>
                                </td>
                                <th>
                                    <label class="col control-label payable label_style" for="form-field-1-1"> Payable Amount </label>
                                </th>
                                <th>
                                    <label class="col control-label payable label_style" for="form-field-1-1"> Paid Amount </label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <td class="col-sm-3">
                                <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a account..." name="type" required>
                                    <option value=""> -----Select Account----- </option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name_of_account }}</option>
                                    @endforeach
                                </select>
                            </td>
                            
                            <td class="col-sm-3" >
                                <input type="text" name="description" placeholder="Description" class="form-control"  value="{{ old('description') }}"/>
                            </td>
                            <td>
                                <input type="date" name="date" class="form-control">
                            </td>
                            <td class="col-sm-3">
                                <input type="number" name="payable" id="payable" placeholder="Payable ammount"
                                       class="form-control payable-input" value="{{ old('payable') }}" required/>
                            </td>
                            <td class="col-sm-3">
                                <input type="number" keyup="hello" name="paid" id="paid" placeholder="Paid ammount" class="form-control paid-input" value="{{ old('paid') }}" required/>
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
                                <label class="col-sm-5 control-label" for="form-field-1-1"> Discount amount </label>
                                <div class="col-sm-6">
                                    <input type="number"  placeholder="Discount Amount" class="form-control discount" min="0"
                                            name="discount_amount" id="discount_amount" value="0%" style="margin-bottom: 8px" />
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
                            
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label"></label>
                            <div class="col-lg-8 col-xs-12 col-sm-3">
                                <input type="submit" onClick="window.print(): void"  class="btn btn-info pull-right" value="submit">
                                {{-- <a href="{{ route('student-payment.index') }}" class="btn btn-info "> <i class="fa fa-arrow-left"></i> Back</a> --}}
                            </div>
                        </div>
                    </form><!-- form end -->
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.full.js"></script>
    <script type="text/javascript" src="{{asset('admin/assets/js/select2loads.js')}}"></script>
    <script>
        
        $(document).ready(function(){

            
            //Get Batch
            $("#course_id").blur(function(){
                var course = $("#course_id").val();
                var u = "{{route('getBatch', 'id')}}";
                var url = u.replace('id', course);
                var value = "";
                $.get(url, function(data){
                    data.forEach(function(element){
                        value += '<option value="'+element.id+'">'+element.batch_name+'</option>';
                    });
                    $("#batch_id").html(value);
                })
            })

            //Get Student
            $("#batch_id").change(function(){
                var batch = $("#batch_id").val();
                var u = "{{route('getstu', 'id')}}";
                var url=  u.replace('id', batch);
                var value="";
                $.get(url, function(data){
                    data.forEach(function(element){
                        value += '<option value="'+element.id+'">'+element.student_name+'</option>';
                    })
                    $("#student_id").html(value);
                })
            })

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









    <!-- <script type="text/javascript">
        let rowIndex = 1;


        $("#addrows").click(function () {

            $('#addInput tr:last').after(`<tr>
        <td class="col-sm-2">
         <select class="form-control item_unit" name="account_type[]">
           <option value="">  </option>
          @foreach($accounts as $account)

            <option value="{{ $account->id }}">{{ $account->name_of_account }}</option>

           @endforeach
            </select>
        </td>
      <td class="col-sm-2"><input type="text" class="form-control" name="description[]"/></td>
      <td class="col-sm-2"><input type="number" class="form-control payable-input" id="payable" onchange="addPayable()" name="payable[]"/></td>
      <td class="col-sm-1"><input type="number" class="form-control paid-input" id="paid" onchange="addPaid()"  name="paid[]"/></td>
      <td>
      <a href="#" type="submit" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i>
      </a> </td>    </tr>`);

            $(".delete").click(function() {
                $(this).closest("tr").remove();
            });
            rowIndex++;

        });
    </script>
    <script>
        function  addPayable(){
            let payables = document.querySelectorAll('.payable-input');
            let totalPayable = 0;
            //
            let GPayable = document.querySelector('#payableTotal');
            //
            for(let i=0; i<payables.length; i++){
                totalPayable += parseFloat(payables[i].value);
                console.log(payables[i].value);
            }
            GPayable.value = totalPayable;
            console.log(payables);

        }

    </script>
    <script>
        function  addPaid(){
            let paidables = document.querySelectorAll('.paid-input');
            let totalPaid = 0;
            //
            let GPaid = document.querySelector('#paidTotal');
            //
            for(let i=0; i<paidables.length; i++){
                totalPaid += parseFloat(paidables[i].value);
                console.log(paidables[i].value);
            }
            GPaid.value = totalPaid;
            console.log(paidables);

        }

    </script>
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
    </script> -->
@stop