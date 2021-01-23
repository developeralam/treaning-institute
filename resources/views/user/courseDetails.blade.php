@extends('user.app')
@section('content')
    <div class="course-details mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">{{$course->title}}</h4>
            </div>
            <div class="card-body">
                <div class="course-desc mb-5">
                    {{strip_tags($course->desc)}}
                </div><!-- .course-desc end -->
                <div class="row">
                    <div class="col-lg-8 col-12 col-sm-12 col-md-12 col-xl-8">
                        <div class="course-table">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="font-weight-bold" width="30%">কোর্স ফি</td>
                                    <td class="font-weight-bold">{{$course->fees}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" width="30%">কোর্সের সময়কাল</td>
                                    <td class="font-weight-bold">{{$course->duration}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" width="30%">সাপ্তাহিক ক্লাস</td>
                                    <td class="font-weight-bold">{{$course->day}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" width="30%">ক্লাসের সময়</td>
                                    <td class="font-weight-bold">{{$course->hour}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 col-sm-12 col-md-12 col-xl-4">
                        <div class="course-img">
                            <img src="{{asset('uploads/course/'.$course->image)}}" class="w-100" alt="">
                        </div><!-- .course-img end -->
                    </div>
                </div>
                
            </div>
        </div>
    </div><!-- .course-details end -->
@endsection