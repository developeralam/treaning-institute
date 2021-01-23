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

<div class="page-header">
		<h1>
			User Profile Page
			
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			

			

			{{-- <div>
				<div id="user-profile-1" class="user-profile row">
					<div class="col-xs-12 col-sm-3 center">
						<div>
							<span class="profile-picture">
								<img id="avatar" class="editable img-responsive" alt="User Profile Image" src="" />
							</span>

							<div class="space-4"></div>

							<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
								<div class="inline position-relative">
									<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
										<i class="ace-icon fa fa-circle light-green"></i>
										&nbsp;
										<span class="white">{{Auth::user()->name}}</span>
									</a>


								</div>
							</div>
						</div>

						<div class="space-6"></div>

						

						

						<div class="hr hr16 dotted"></div>
					</div>

					<div class="col-xs-12 col-sm-9">
						

						<div class="space-12"></div>

						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> Username </div>

								<div class="profile-info-value">
									<span class="editable" id="username">{{Auth::user()->name}}</span>
								</div>
							</div>

							

							<div class="profile-info-row">
								<div class="profile-info-name"> Email </div>

								<div class="profile-info-value">
									<span class="editable" id="age">{{Auth::user()->email}}</span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Joined </div>

								<div class="profile-info-value">
									<span class="editable" id="signup">{{Auth::user()->created_at}}</span>
								</div>
							</div>

							
						</div> <br/><br/><br/>

						<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
										<div class="profile-info-name"> Password </div>
		
										<div class="profile-info-value">
											
									<input type="" class="editable" id="age"  value="{{Auth::user()->password }}" />
									<a href="{{ route('user.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
								</div>
									</div>
						</div>

						

						
					</div>
				</div>
			</div> --}}









            <div class="">
					<div id="user-profile-2" class="user-profile">
						<div class="tabbable">
							<ul class="nav nav-tabs padding-18">
								<li class="active">
									<a data-toggle="tab" href="#home">
										<i class="green ace-icon fa fa-user bigger-120"></i>
										Profile
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#feed">
										<i class="orange ace-icon fa fa-key bigger-120"></i>
										Password
									</a>
								</li>

								
							</ul>

							<div class="tab-content no-border padding-24">
								<div id="home" class="tab-pane in active">
									<div class="row">
										<div class="col-xs-12 col-sm-3 center">
											<span class="profile-picture">
												<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="">
											</span>

											<div class="space space-4"></div>

											
										</div><!-- /.col -->

										<div class="col-xs-12 col-sm-9">
											<h4 class="blue">
												<span class="middle">{{Auth::user()->name}}</span>

												<span class="label label-purple arrowed-in-right">
													<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
													online
												</span>
											</h4>

											<div class="profile-user-info">
												<div class="profile-info-row">
													<div class="profile-info-name"> Username </div>

													<div class="profile-info-value">
														<span>{{Auth::user()->name}}</span>
													</div>
												</div>

												

												<div class="profile-info-row">
													<div class="profile-info-name"> Email </div>

													<div class="profile-info-value">
														<span>{{Auth::user()->email}}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Joined </div>

													<div class="profile-info-value">
														<span>{{Auth::user()->created_at}}</span>
													</div>
												</div>

												
                                            </div>             
                                            <a href="{{route('user.edit',Auth::user()->id)}}" class="btn btn-sm btn-success" title="Edit">
                                                {{-- <i class="fa fa-edit"></i> --}} Edit
                                             </a> 

											<div class="hr hr-8 dotted"></div>

											
										</div><!-- /.col -->
									</div><!-- /.row -->

									<div class="space-20"></div>

								</div><!-- /#home -->

                                
                                
                                <div id="feed" class="tab-pane">
                     <form  role="form" method="POST" action="{{ route('user.password',Auth::user()->id)  }}">  
                            @csrf
                            @method('PUT')
									<div class="profile-feed row">
										
									 <div id="edit-password" class="tab-pane">
									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Current Password</label>

										<div class="col-sm-9">
											<input type="password" id="old_password" name="old_password" placeholder="Password" style="margin-left: -106px"  />
										</div>
									</div> &nbsp;

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">New Password</label>

										<div class="col-sm-9">
											<input type="password"  id="new_password" name="new_password" placeholder="Password" style="margin-left: -106px" />
										</div>
									</div>  &nbsp;
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password</label>

										<div class="col-sm-9">
											<input type="password"  id="confirm_password" name="new_password" placeholder="Password" style="margin-left: -106px" />
										</div>
									</div>  &nbsp;
                                    <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                        </div>
								</div>

                          </div><!-- /.row -->
                                    
                          <button type="submit" class="btn btn-sm btn-success" title="Edit" style="margin-top:34px; margin-left:284px;">
                            {{-- <i class="fa fa-edit"></i> --}} Save
                         </button> 
                    </form>

									<div class="space-12"></div>

									
								</div><!-- /#feed -->

								
							</div>
						</div>
					</div>
				</div>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
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


      {{-- Check password Ma --}}
   <script>

            function checkPasswordMatch() {
                var password = $("#new_password").val();
                var confirmPassword = $("#confirm_password").val();

                if (password != confirmPassword)
                    $("#divCheckPasswordMatch").html("<span>Passwords do not match!</span>");
                else
                    $("#divCheckPasswordMatch").html("<span style='margin-left: 183px'>Passwords match.</span>");
            }

            $(document).ready(function () {
            $("#confirm_password").keyup(checkPasswordMatch);
            });


       </script>





    <!-- inline scripts related to this page -->
    <script type="text/javascript">

        function delete_check(id)
        {
            Swal.fire({
                title: 'Are you sure ?',
                html: "<b>You want to delete permanently !</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width:400,
            }).then((result) =>{
                if(result.value){
                    $('#deleteCheck_'+id).submit();
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
                width:400,
            }).then((result)=> {
                if(result.value)
                {
                    $('#deleteAllCheck').submit();
                }
            })
        }

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

        })
    </script>

    <!--  Select Box Search-->
    <script type="text/javascript">



        jQuery(function($){

            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                // .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({'width': '300px'});
                            // $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                        // $this.next().css({'width': $this.parent().width()});
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
    </script>

    <!--Drag and drop-->
    <script type="text/javascript">

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

    </script>

    <!--date range picker-->
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

    <!--autocomplete-->
    <script type="text/javascript">
        jQuery(function($) {
            //autocomplete
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];
            $( "#tags" ).autocomplete({
                source: availableTags
            });

        });
    </script>


@stop