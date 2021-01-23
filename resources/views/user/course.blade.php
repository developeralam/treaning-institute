@extends('user.app')
@section('title', $siteConfig['name'] )
@section('main-content')
    <div class="blog_bg_area">
        <div class="container">
            <!--blog area start-->
            <div class="row">
                <div class="col-12">
                    <div class="blog_wrapper blog_nosidebar mb-60">
                        <div class="blog_header">
                        </div>
                        <div class="blog_wrapper_inner"  >
                            {{-- @dd($courses); --}}
                          @foreach($course_info as $course)
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="{{ url('course/details',$course->id) }}"><img src="{{ asset('uploads/course/'.$course->image) }}" alt="" style="height:200px; width: 250px;"></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h4 class="post_title"><a href="{{ url('course/details',$course->id) }}">Course Name: {{ ucfirst($course->title) }}</a></h4> 
                                            <p style="text-align: justify;">
                                            @php
                                              echo strip_tags(str_limit($course->desc,500));
                                            @endphp
                                            <a style="text-decoration: none;"
                                                class="text-primary" href="{{ url('course/details',$course->id) }}">আরও পড়ুন</a>
                                            </p>  
                                        <p class="course-duration MsoNormal">
                                            <span class="mr-2"
                                                style="font-size:13.0pt;
                                                mso-bidi-font-size:20.0pt;
                                                line-height:115%;
                                                font-family:Times New Roman,serif;
                                            ">
                                                Course Duration
                                            </span>
                                            <b>: </b> {{ $course->duration }}
                                        </p>
                                        <p class="course-info MsoNormal">
                                            <span class="mr-2"
                                                  style="font-size:13.0pt;
                                                mso-bidi-font-size:20.0pt;
                                                line-height:115%;
                                                font-family:Times New Roman,serif;
                                            ">
                                            Day/Weekly Class 
                                            </span>
                                            <b>:</b> {{ $course->day }} 
                                        </p>
                                        <p class="course-info MsoNormal">
                                            <span class="mr-2"
                                                  style="font-size:13.0pt;
                                                mso-bidi-font-size:20.0pt;
                                                line-height:115%;
                                                font-family:Times New Roman,serif;
                                            ">
                                                Hours
                                            </span>
                                            <b>:</b> {{ $course->hour }} 
                                        </p>
                                        <p class="course-info MsoNormal">
                                            <span class="mr-2"
                                                  style="font-size:13.0pt;
                                                mso-bidi-font-size:20.0pt;
                                                line-height:115%;
                                                font-family:Times New Roman,serif;
                                            ">
                                               Course Fees
                                            </span>
                                            <b>:</b> {{ $course->fees }} 
                                        </p>                                        
                                        <div class="btn_more">
                                            <button  class="btn btn-sm btn-success pull-left ApplyNowBtn ">  <a class="text-white" href="{{ url('apply-now') }}">আবেদন করুন</a> </button> 
                                        </div>
                                    </figcaption>
                                </figure>
                                {{--  <div class="contact_textarea">  --}}
                                    {{--  <button  class="btn btn-sm btn-success pull-left ApplyNowBtn ">  <a class="text-white" href="{{ url('apply-now') }}">আবেদন করুন</a> </button>   --}}
                                {{--  </div>  --}}
                            </article>
                  @endforeach
                        </div>
                    </div> 
                    <!--blog pagination area end-->
                    <div class="blog_pagination">
                        {{-- <div class="pagination"> --}}
                            <ul>
                              {{ $course_info->links() }}
                            </ul>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <!--blog area end-->
        </div>
    </div>
    
@endsection