@extends('admin.layouts.master')
@section('title','Students Profile Form')
@section('page-header')
<i class="fa fa-plus-circle"></i> Students Profile
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
   .mr-1{
      margin-right: 2px;
   }
   .mt-2{
      margin-top:10px;
   }
   .panel-heading{
      padding:1px 15px!important;
   }
   .panel-heading h2{
      font-size:20px!important;
      padding-bottom:5px!important;
   }
   .panel{
      margin-bottom:-2px!important;
      border-bottom:0px!important;
   }
</style>
@stop
@section('content')
<!-- Academic Information -->
<div class="student-admission-form">
   <form action="{{route('admin.studentAdmission')}}" method="post" enctype="multipart/form-data">
      @csrf
<!--       {{method_field('PUT')}}
 -->      <!-- <input type="hidden" name="_method" value="PUT">
 -->   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Academic Information</h2>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-grou row">
                  <div class="col-md-2">
                     <label for="year_id">Year<sup class="text-denger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="year_id" required="" id="year_id" class="form-control">
                        @foreach(App\Year::getAllYear() as $year)
                           <option value="{{$year->id}}">{{$year->year}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div><!-- .col-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="session_id">Session<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="session_id" required="" id="session_id" class="form-control">
                        @foreach(App\StudentSession::getAllSession() as $session)
                           <option value="{{$session->id}}">{{$session->session_name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="course_id">Course<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="course_id" required="" id="course_id" class="form-control">
                        @foreach(App\Course::getAllCourse() as $course)
                           <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="batch_id">Batch<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="batch_id" required="" id="batch_id" class="form-control">
                        @foreach(App\StudentBatch::getAllBatch() as $batch)
                           <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="student_serial">Student Id</label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" value="Autometic Genrated" readonly="" class="form-control">
                  </div>
               </div>
            </div>
         </div><!-- .row end -->
      </div><!-- .panel-body -->
   </div>
   <!-- Academic Information end -->
   <!-- Personal Information Start -->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Personal Information</h2>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="student_name">Student Name<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" id="student_name" required="" name="student_name" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="blood_group">Blood Group<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="blood_group" id="blood_group" required="" class="form-control">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                     </select>
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="date_of_birth">Date Of Birth<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="date" class="form-control" required="" id="date_of_birth" name="date_of_birth">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="gender">Gender<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="gender" id="gender" required="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other's">Other's</option>
                     </select>
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="religion">Religion<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="religion" id="religion" required="" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="kristian">kristian</option>
                        <option value="Buddha">Buddha</option>
                     </select>
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="nationality">Nationality<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" value="Bangladeshi" required="" id="nationality" name="nationality" class="form-control">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="photo">Photo<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="file" class="form-control-file" id="photo" name="photo">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
         </div>
      </div> 
   </div>
   <!-- Personal Information End -->

   <!-- Educational Information Start -->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Educational Information</h2>
      </div>
      <div class="panel-body">
         <div class="wrapper">
            

            <div class="form-wrapper">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>Exam Name</th>
                        <th>Institute Name</th>
                        <th>Board</th>
                        <th>Roll</th>
                        <th>Year</th>
                        <th>Results</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td width="10%"><input type="text" name="exam_name[]" class="form-control"></td>
                        <td width="30%"><input type="text" name="institute_name[]" class="form-control"></td>
                        <td><input type="text" name="board[]" class="form-control"></td>
                        <td><input type="text" name="roll[]" class="form-control"></td>
                        <td><input type="text" name="year[]" class="form-control"></td>
                        <td><input type="text" name="result[]" class="form-control"></td>
                        <td><span class="btn btn-success btn-sm mr-1 add-more">Add More</span></td>
                     </tr>
                  </tbody>
               </table>
           
               
            </div><!-- .form-wrapper end -->
         </div><!-- .wrapper end -->
      </div><!-- .panel-body end -->
   </div><!-- .panel end -->
   <!-- Educational Information End -->
   <!-- Other's Information Start -->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Other's Information</h2>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3">
               <div class="form-group row">
                  <div class="col-md-4">
                     <label for="profession">Profession<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-8">
                     <input type="text" id="profession" required="" name="profession" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-4">
                     <label for="organization_name">Organization Name<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" required="" id="organization_name" name="organization_name">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-3 col-lg-3 col-xl-3">
               <div class="form-group row">
                  <div class="col-md-4">
                     <label for="designation">Designation<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-8">
                     <input type="text" class="form-control" required="" id="designation" name="designation">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
         </div>
      </div> 
   </div>
   <!-- Other's Information End -->

   <!-- Contact Information Start -->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Contact Information</h2>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="phone">Phone<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" id="phone" name="phone" required="" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="email">Email<sup class="text-danger"></sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="email" class="form-control" required="" id="email" name="email">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="present_address">Present Address<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" class="form-control" required="" id="present_address" name="present_address">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="permanent_address">Permanent Address<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" class="form-control" required="" id="permanent_address" name="permanent_address">
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
         </div>
      </div> 
   </div>
   <!-- Contact Information End -->

   <!-- Gurdian Information Start -->
   <div class="panel panel-default">
      <div class="panel-heading">
         <h2 class="">Gurdian Information</h2>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="father_name">Fathers Name<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" id="father_name" required="" name="father_name" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="father_phone">Fathers Phone<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" id="father_phone" required="" name="father_phone" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="mother_name">Mother's Name<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <input type="text" id="mother_name" required="" name="mother_name" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="mother_phone">Mother's Phone
                  </label>
               </div>
                  <div class="col-md-10">
                     <input type="text" id="mother_phone" required="" name="mother_phone" class="form-control">
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="form-group row">
                  <div class="col-md-2">
                     <label for="status">Status<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-md-10">
                     <select name="status" id="status" required="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                     </select>
                  </div>
               </div>
            </div><!-- .col-md-6 end -->
         </div><!-- .row end -->
         <input type="submit" class="btn btn-success" value="Submit">
      </div> 
   </div>
   <!-- Gurdian Information End -->
   </form>
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

<!-- Add More Education Section -->
<script>

$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add-more'); //Add button selector
    var wrapper = $('.wrapper'); //Input field wrapper
    var fieldHTML = '<div class="form-wrapper"><table class="d-block table table-striped mt-2"><thead><tr><th>Exam Name</th><th>Institute Name</th><th>Board</th><th>Roll</th> <th>Year</th><th>Results</th></tr></thead><tbody><tr><th><input type="text" name="exam_name[]" class="form-control"></th><th><input type="text" name="institute_name[]" class="form-control"></th><th><input type="text" name="board[]" class="form-control"></th><th><input type="text" name="roll[]" class="form-control"></th><th><input type="text" name="year[]" class="form-control"></th><th><input type="text" name="result[]" class="form-control"></th></tr></tbody><a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.delete', function(e){
        e.preventDefault();
        $(this).parent('div.form-wrapper').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@stop


<!-- script Section -->

<!-- Side Bar -->
<!-- <script>
    function makeStudentCode(sessionId, batchId, courseId){
        $.ajax({
            url: '{{ route("generate-id") }}',
            type: 'GET',
            data: {
                'sessionId': sessionId,
                'batchId': batchId,
                'courseId': courseId
            },
            success:function(res){
                $('#student_id').val(res);
            }
        });
    }
    $('#studentProfile').on('change', function(){
        var sessionId = $('#std_session').val();
        var batchId = $('#std_batch').val();
        var courseId = $('#std_course').val();
        makeStudentCode(sessionId, batchId, courseId);
    });
</script> -->
<!--  Select Box Search-->
<!-- <script type="text/javascript">
   jQuery(function($){

       if(!ace.vars['touch']) {
           $('.chosen-select').chosen({allow_single_deselect:true});
           //resize the chosen on window resize

           $(window)
               .off('resize.chosen')
               .on('resize.chosen', function() {
                   $('.chosen-select').each(function() {
                       var $this = $(this);
                       $this.next().css({'width': $this.parent().width()});
                   })
               }).trigger('resize.chosen');
           //resize chosen on sidebar collapse/expand
           $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
               if(event_name != 'sidebar_collapsed') return;
               $('.chosen-select').each(function() {
                   var $this = $(this);
                   $this.next().css({'width': $this.parent().width()});
               })
           });
           $('#chosen-multiple-style .btn').on('click', function(e){
               var target = $(this).find('input[type=radio]');
               var which = parseInt(target.val());
               if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
               else $('#form-field-select-4').removeClass('tag-input-style');
           });
       }
   })
</script> -->
<!--Drag and drop-->
<!-- <script type="text/javascript">
   jQuery(function($) {
       $('#id-input-file-3').ace_file_input({
           style: 'well',
           btn_choose: 'Drop files here or click to choose',
           btn_change: null,
           no_icon: 'ace-icon fa fa-cloud-upload',
           droppable: true,
           thumbnail: 'small'//large | fit
       }).on('change', function(){
           //console.log($(this).data('ace_input_files'));
           //console.log($(this).data('ace_input_method'));
       });
   });

</script> -->
<!--date range picker-->
<!-- <script type="text/javascript">
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
</script> -->
<!--datepicker plugin-->
<!-- <script type="text/javascript">
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
</script> -->
<!--autocomplete-->
<!-- <script>
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
</script>
{{--<script type="text/javascript">--}}
{{--   $("input").intlTelInput({--}}
{{--   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"--}}
{{--   });--}}
{{--</script>--}}

-->