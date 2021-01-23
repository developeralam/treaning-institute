@extends('admin.layouts.master')
@section('title','Dashborad')
@section('page-header')
<i class="fa fa-list"></i> Admin
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" />
<style type="text/css">
    .pagination {
        padding-left: 0;
        margin-top: -30px;
        border-radius: 4px;
        margin-right: 20px;
    }
    /* shams pathan */
.homePageAdmin{
  display:flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-around;
  padding:2em;
}

.homePageAdmin >div{
    width:30%;
    margin-top:1em;
}
</style>
@stop
@section('content')
{{--<h3>Welcome to Dashboard</h3>--}}
<div class="homePageAdmin">
        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-users"></i>
            </div>
            <div class="infobox-data">
                <span class="infobox-data-number">{{$total_students}}</span>
                <div class="infobox-content">Activated Students</div>
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-users"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">{{$applied_student}}</span>
                <div class="infobox-content">Applied Student</div>
            </div>
        </div>

        <div class="infobox infobox-blue">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-tasks"></i>
            </div>
            <div class="infobox-data">
                <span class="infobox-data-number">{{$total_batches}}</span>
                <div class="infobox-content">Total Batch</div>
            </div>
        </div>

        <div class="infobox infobox-pink">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-graduation-cap"></i>
            </div>
            <div class="infobox-data">
                <span class="infobox-data-number">{{$total_courses}}</span>
                <div class="infobox-content">Total Course</div>
            </div>
        </div>

        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fas fa-dollar"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number">{{$total_income}}</span>
                <div class="infobox-content">Total Income</div>
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-dollar"></i>
            </div>
            <div class="infobox-data">
                <span class="infobox-data-number">{{$total_expense}}</span>
                <div class="infobox-content">Total Expense</div>
            </div>
        </div>
    </div>
    <!-- Pending Student List -->
    <div class="pending-student-list">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">Pending Student List</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Student Name</th>
                            <th>Session</th>
                            <th>Course</th>
                            <th>Batch</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\StudentProfile::getAllPendingStudent() as $student)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$student->student_name}}</td>
                            <td>{{$student->session->session_name}}</td>
                            <td>{{$student->course->title}}</td>
                            <td>{{$student->batch->batch_name}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{App\StudentProfile::statusCheck($student->status)}}</td>
                            <td>
                                <button type="button" class="" data-toggle="modal" data-target="#exampleModal">
                                  Approve
                                </button>
                                <button type="button" data-toggle="modal" data-target="#deleteModal">
                                  Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Approve Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Approve Student
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{route('student.approved', $student->id)}}" method="post">
                                    @csrf
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Approved</option>
                                    </select>
                                    <input type="submit" class="btn btn-success btn-sm" style="margin-top:10px;">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Student Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <h4>Are You Sure To Delete This Student</h4>
                                <form action="{{route('delete.student', $student->id)}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" style="margin-top:10px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top:10px;">Close</button>
                                </form>
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
        <script src="{{ asset('admin/assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>

        <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>

        <script src="{{ asset('admin/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/ace.min.js') }}"></script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            function delete_check(id) {
                Swal.fire({
                    title: 'Are you sure ?',
                    html: "<b>You want to delete permanently !</b>",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    width: 400,
                }).then((result) => {
                    if (result.value) {
                        $('#deleteCheck_' + id).submit();
                    }
                })

            }

            function delete_all_check() {
                Swal.fire({
                    title: 'Are you sure?',
                    html: "<b>You want to delete permanently !</b>",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    width: 400,
                }).then((result) => {
                    if (result.value) {
                        $('#deleteAllCheck').submit();
                    }
                })
            }
        </script>



        @stop