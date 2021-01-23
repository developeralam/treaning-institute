@extends('admin.layouts.master')
@section('title','Students Profile Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Students due list
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
    @livewireAssets
@stop
@section('content')
@section('bread-link')
    <a href="{{route('studentduelist')}}" class="btn btn-danger btn-sm" style="float:right; margin-top:2px;">Student Due Payment List</a>
@endsection
    <div class="row d-print-none" >
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div>
                <table id="dynamic-table" class="table table-striped item-table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>StudentName</th>
                            <th>Session</th>
                            <th>Batch Name</th>
                            <th>Student ID</th>
                            <th>Course</th>
                            <th>Payable Amount</th>                            
                            <th>Paid Amount</th>
                            <th>Discount</th>
                            <th>Due Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{App\StudentPayment::studentName($student->student_id)}}</td>
                                <td>{{App\StudentPayment::sessionName($student->student_id)}}</td>
                                <td>{{App\StudentPayment::batchName($student->student_id)}}</td>
                                <td>{{App\StudentPayment::studentId($student->student_id)}}</td>
                                <td>{{App\StudentPayment::courseName($student->student_id)}}</td>
                                <td>{{$student->paybale_amount}}</td>
                                <td>{{$student->paid_amount}}</td>
                                <td>{{$student->discount_amount}}</td>
                                <td>{{$student->due_amount}}</td>
                                <td><button data-target="#exampleModal" class="btn btn-info btn-sm" data-toggle="modal">Pay Due</button></td>
                            </tr>
                            <!-- Button trigger modal --> 

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pay Due Amount</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="{{route('duePayment')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="student_name">Student Name</label>
                                                <input type="text" class="form-control" id="student_name" name="student_name" value="{{App\StudentPayment::studentName($student->student_id)}}" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="student_id">Student Id</label>
                                                <input type="text" class="form-control" id="student_id" value="{{$student->student_id}}" name="student_id" readonly="">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="due_amount">Due Amount</label>
                                                        <input type="text" class="form-control" value="{{$student->due_amount}}" name="due_amount" readonly=""> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="pay_amount">Pay Amount</label>
                                                        <input type="text" class="form-control" name="pay_amount"> 
                                                    </div>
                                                </div>
                                            </div><!-- .row end -->
                                            <input type="submit" class="btn btn-success btn-sm" value="Save">
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        @endforeach
                    </tbody>
                </table>
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
        
        <!-- page specific plugin scripts -->
       
        <script src="{{ asset('admin/')}}/assets/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/buttons.flash.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/buttons.html5.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/buttons.print.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/buttons.colVis.min.js"></script>
        <script src="{{ asset('admin/')}}/assets/js/dataTables.select.min.js"></script>

        <script>
                $(".pay_amount").keyup(function(){
                    var cashAmount = parseInt(Number($(this).val()));
                    var dueAmount = parseInt(Number(this.parentNode.parentNode.parentNode.querySelector('#due_amount').value));
                    if(cashAmount > dueAmount){
                        alert("Due Amount Is Too Large");
                        // location.reload();
                    }
                });
        </script>

    <script type="text/javascript">
        jQuery(function($) {
            $('#dynamic-table').DataTable({
                "ordering": false,
                // install laravel datatable this package
                // https://github.com/yajra/laravel-datatables
                // processing: true,
                // serverSide: true,
                {{--ajax: '{{ url('') }}',--}}
                // columns:[
                //     {"data":"first_name"},
                //     {"data":"last_name"},
                // ],
                "bPaginate": true,
            });

        });
        
        {{--  $(document).ready(function(){
            $('#dynamic-table_filter').find('input').val('#text')
            console.log('################################################################')
            console.log($('#dynamic-table_filter').html())
            var tbl = $('#dynamic-table_filte').DataTable({
                "oSearch": {"sSearch": "Initial search"}
            });
        });  --}}

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

        @if(Session::has('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Due Payment Success',
                    imageUrl: '{{asset('admin/assets/images/taka1.png')}}',
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    timer:2000,
                })
            </script>
        @endif
        @if(Session::has('payment_failure'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Try Again',
                    imageUrl: '{{asset('admin/assets/images/payment_failure.png')}}',
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    timer:4000,
                })
            </script>
        @endif

       
@stop