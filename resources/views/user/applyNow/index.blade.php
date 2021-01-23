@extends('user.app')
@section('content')
    <div class="online-admission mt-3 mb-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-bold text-center">অনলাইন আবেদন</h3>
                </div>
                <div class="card-body">
                    <div class="student-admission-form">
                        <form action="{{route('applyNowStore')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="">Academic Information</h2>
                                </div>
                                <div class="card-body">
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
                                </div><!-- .card-body -->
                            </div>
                           <!-- Academic Information end -->
                           <!-- Personal Information Start -->
                           <div class="card">
                                <div class="card-header">
                                    <h2 class="">Personal Information</h2>
                                </div>
                                <div class="card-body">
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
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="">Educational Information</h2>
                                </div>
                                <div class="card-body">
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
                                </div><!-- .card-body end -->
                            </div><!-- .card end -->
                           <!-- Educational Information End -->
                           <!-- Other's Information Start -->
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="">Other's Information</h2>
                                </div>
                                <div class="card-body">
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
                                    </div><!-- .row end -->
                                </div><!-- .card-body end -->
                            </div><!-- .card end -->
                           <!-- Other's Information End -->

                           <!-- Contact Information Start -->
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="">Contact Information</h2>
                                </div>
                                <div class="card-body">
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
                                </div><!-- .card-body end -->
                            </div><!-- .card-end -->
                           <!-- Contact Information End -->

                           <!-- Gurdian Information Start -->
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="">Gurdian Information</h2>
                                </div>
                                <div class="card-body">
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
                                       <!--  <div class="col-md-6 col-lg-6 col-xl-6">
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
                                        </div> --><!-- .col-md-6 end -->
                                    </div><!-- .row end -->
                                 <input type="submit" class="btn btn-success" value="Submit">
                                </div><!-- .card-body end -->
                            </div>
                            <!-- Gurdian Information End -->
                        </form>
                    </div><!-- .student-admission-form end -->   
                </div>
            </div>
            
        </div><!-- .container end -->
    </div><!-- .online-admission end -->
@endsection('content')

