@extends('admin.layouts.master')
@section('title','Students Profile')
@section('page-header')
<i class="fa fa-list"></i> Students Profile
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/chosen.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datepicker3.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<style type="text/css">
   .pagination {
        padding-left: 0;
        margin-top: -30px;
        border-radius: 4px;
        margin-right: 20px;
   }
   .m-r{
      margin-right:2px;
   }
</style>
@stop
@section('content')
<div class="page-header">
   <form action="" id="deleteAllCheck" method="POST">
      @csrf
      <img src="">
   </form>
   <a class="btn btn-xs btn-info" href="{{ route('studentProfile.create') }}" role="button" class="blue" data-toggle="modal" style="float: right; margin: 0 2px;"> <i class="fa fa-plus"></i> Add New</a>
   <h1>
      @yield('page-header')
   </h1>
</div>
@include('admin.layouts.includes.msg')
<div class="row">
   <div class="col-xs-12">
      <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
        <div style=" padding: 10PX; display: flow-root;">
            
        </div>
         <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Student Id</th>
                  <th>Session</th>
                  <th>Batch</th>
                  <th>Course</th>
                  <th>Email</th>
                  <th>Phone</th>
                   <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
              @foreach(App\StudentProfile::getAllStudent() as $student)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$student->student_name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->session->session_name}}</td>
                    <td>{{$student->batch->batch_name}}</td>
                    <td>{{$student->course->title}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{App\StudentProfile::statusCheck($student->status)}}</td>
                    <td><a href="" class="m-r"><i class="far fa-eye"></i></a><a href="" class="m-r"><i class="far fa-edit"></i></a><a href=""><i class="far fa-trash-alt"></i></a></td>
                </tr>
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

@stop