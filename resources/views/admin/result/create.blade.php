@extends('admin.layouts.master')
@section('title','Result Form')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Result Form
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
@section('bread-link')
    <a href="{{route('result.index')}}" class="btn btn-danger btn-sm" style="float:right; margin-top:2px;">Result List</a>
@endsection
<div class="row">
   <div class="col-sm-8 col-sm-offset-2">
      <div class="widget-box">
         <div class="widget-header">
            <h4 class="widget-title"> @yield('page-header')</h4>
         </div>
         <div class="widget-body">
           <div class="widget-main">
             <form action="{{route('result.store')}}" method="post">
              @csrf
              <div class="batch" style="border-bottom: 1px dashed #000;padding-bottom:20px; margin-bottom: 20px;">
                <label for="batch_id">Please Select A Batch</label>
                <select name="batch_id" id="batch_id" class="form-control w-50">
                    @foreach(App\StudentBatch::getAllBatch() as $batch)
                      <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                    @endforeach
                </select>
              </div>
              <table class="table table-striped" style="">
                <thead>
                  <tr>
                    <th width="20%">Student Name</th>
                    <th>Written</th>
                    <th>Practical</th>
                    <th>Viva</th>
                    <th>Total</th>
                    <th>GPA</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  
                </tbody>
              </table>
               <input type="submit" class="btn btn-success btn-sm" value="Submit">
             </form>
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
<script>
  $(document).ready(function(){
    $("#batch_id").change(function(){

      var batch = $("#batch_id").val();
      var u = "{{route('getstufrresult', 'id')}}";
      var url = u.replace('id', batch);
      console.log(url);
      var value = '';
      $.get(url, function(data){
        data.forEach(function(element){
          value += '<tr><td>'+element.student_name+'</td><input type="hidden" value="'+element.id+'" name="student_id[]" /><td><input type="text" name="written[]" class="form-control"/></td><td><input type="text" name="practical[]" class="form-control"/></td><td><input type="text" name="viva[]" class="form-control"/></td><td><input type="text" name="total[]" class="form-control"/></td><td><input type="text" name="gpa[]" class="form-control"/></td></tr>';
        });
        $("#tbody").html(value);
      });
    });
  });
</script>

@stop