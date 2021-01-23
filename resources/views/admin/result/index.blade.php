@extends('admin.layouts.master')
@section('title','Students Result')
@section('page-header')
<i class="fa fa-list"></i> Students Result
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
</style>
@stop
@section('content')
@section('bread-link')
    <a href="{{route('result.create')}}" class="btn btn-danger btn-sm" style="float:right; margin-top:2px;">Add Result</a>
@endsection
<div class="page-header">
   <h1>
      @yield('page-header')
   </h1>
</div>
@include('admin.layouts.includes.msg')
<div class="row">
   <div class="col-xs-12">
      <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
        <div style=" padding: 10PX; display: flow-root; padding-bottom: 20px; border-bottom:2px dashed #000; margin-bottom:20px;">
            <div class="form-group" style="width: 50%; margin:0 auto;">
              <label for="batch_id" style="font-weight: bold; font-style: italic;">Please Select A Batch</label>
              <select name="batch_id" id="batch_id" class="form-control">
                @foreach(App\StudentBatch::getAllBatch() as $batch)
                    <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                @endforeach
              </select>
            </div>
                   
        </div>
            @if (\Session::has('status'))
                <div class="alert alert-success">
                    {!! \Session::get('status') !!}
                </div>
            @endif             
         <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Student Id</th>
                  <th>Written</th>
                  <th>Practical</th>
                  <th>Viva</th>
                  <th>GPA</th>
                  <th>Total</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="tbody">
              
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
<script>
  $(document).ready(function(){
      $("#batch_id").change(function(){
          var batch = $("#batch_id").val();
          var u = "{{route('getResult', 'id')}}";
          var url = u.replace('id', batch);
          var value = "";
          $.get(url, function(data){
            data.forEach(function(element){
              value += '<tr><td>'+element.id+'</td><td>'+element.student_id+'</td><td>'+element.written+'</td><td>'+element.practical+'</td><td>'+element.viva+'</td><td>'+element.total+'</td><td>'+element.gpa+'</td><td><a class="btn btn-sm btn-danger" href="">Delete</a></td></tr>'
            });
            $("#tbody").html(value);
          });
      });
  }); 
</script>

@stop