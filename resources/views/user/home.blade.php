@extends('user.app')
@section('content')

  <div class="content">
    <div class="row mt-2">
      <div class="col-lg-9">
        <div class="slider">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              @php
                $i=0;
              @endphp
              @foreach(App\Slider::getAllSlider() as $slider)
              @php
                $i++;
              @endphp
              @if($i==1)
              <div class="carousel-item active">
                <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{$slider->title}}</h5>
                </div>
              </div><!-- .carousel-item end -->
              @else
              <div class="carousel-item">
                <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{$slider->title}}</h5>
                </div>
              </div><!-- .carousel-item end -->
              @endif
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- .carousel end -->
        </div><!-- .slider end -->
        <div class="news-update mt-2">
          <div class="row">
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
              <span class="btn bg-custom text-dark" style="padding: 10px 13px; border:none!important;">নিউজ আপডেট</span>
              
            </div>
            <div class="col-8 col-sm-8 col-md-10 col-lg-10 col-xl-10" style="/*border: 1px dashed #000;*/left: -32px;">
              <marquee onMouseOver="this.stop()" onMouseOut="this.start()" class="marquee " behavior="" direction="" style="padding:10px; ">
                 @foreach(App\NoticeBoard::getAllNotice() as $notice)
                    <a href="" class="text-dark">{{$notice->title}} . </a>
                 @endforeach
              </marquee>
            </div>
          </div><!-- .row end -->
        </div><!-- .news-update end -->
      </div>
      <div class="col-lg-3">
        <div class="message shadow">
          <h4 class="bg-custom text-dark text-center font-weight-bold p-2 custom-border">অধ্যক্ষ</h4>
            <div class="msg-image p-3">
                <img class="w-100" src="{{asset('uploads/message/'.App\Message::getAllMessage()->image)}}" alt="">
            </div>
            <div class="msg-content pb-1">
              <h6 class="text-center mt-3">{{App\Message::getAllMessage()->name}}</h6>
              <p class="text-center mt-2">{{App\Message::getAllMessage()->by}}</p>
            </div>
        </div><!-- .message end -->
      </div>
    </div><!-- .row end -->
    <div class="row mb-4 mt-3">
      <div class="col-lg-9">
        <div class="about-us shadow">
          <div class="card">
            <div class="card-header bg-custom">
              <h4 class="text-dark">আমাদের সম্পর্কে</h4>
            </div>
            <div class="card-body">
              {{strip_tags(str_limit(App\AboutUs::getMessage()->about,2000))}}
              <a href="{{route('user.aboutUs')}}">আরও পড়ুন</a>
            </div>
          </div>
        </div><!-- .about-us end -->
      </div>
      <div class="col-lg-3">
        <div class="notice shadow">
          <div class="card">
            <div class="card-header bg-custom">
              <h4 class="text-dark text-center">নোটিশ বোর্ড</h4>
            </div>
            <div class="card-body">
              <marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="" direction="up" style="height: 137px!important;">
                @foreach(App\NoticeBoard::getAllNotice() as $title)
                  <p><a style="text-decoration: none;" href="{{route('notice-details', $title->id)}}">{{$title->title}}</a></p>
                @endforeach
              </marquee>
            </div>
          </div>
        </div><!-- .notice end -->
      </div>
    </div><!-- .row end -->

    <div class="row">
      <div class="col-lg-9">
        <div class="row">
          <div class="col-12">
            <div class="success-student shadow">
              <div class="card">
                <div class="card-header">
                  <h4 class=" text-center font-weight-bold">সফল শিক্ষার্থী</h4>
                </div><!-- .card-header end -->
                <div class="card-body">
                  <div class="owl-carousel owl-theme">
                    @foreach(App\SuccessStu::getAllSuccessStu() as $success)
                    <div class="card item">
                      <div class="card-body">
                        <img src="{{asset('uploads/successstudent/'.$success->image)}}" class="img-fluid" alt="" style="height: 195px;">
                        <p class="text-center pt-2">{{$success->name}}</p>
                        <p class="text-center pb-3">{{$success->post}}</p>
                      </div>
                    </div>
                    @endforeach
                  </div><!-- .owl-carousel end -->
                </div><!-- .card-body end -->
              </div><!-- .card end -->
              
            </div><!-- .success-student end -->
          </div>
        </div><!-- .row end -->
      </div><!-- .col-lg-8 end -->
      <div class="col-lg-3">
        <div class="service shadow">
            <div class="card">
              <div class="card-header bg-custom">
                <p class="text-dark text-center">এমএম আইটি স‍ফট এর সেবাসমূহ</p>
              </div>
              <div class="card-body">
                @foreach(App\Service::getAllService() as $service)
                <p>{{$service->name}}</p>
                @endforeach
              </div>
            </div>  
        </div><!-- .service end -->
      </div>
    </div><!-- .row end -->

  </div><!-- .content end -->
  <div class="course mt-3">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center font-weight-bold">কোর্স সমূহ</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme">
                @foreach(App\Course::getAllCourse() as $course)
                  <div class="card item">
                    <div class="card-body">
                      <img src="{{asset('uploads/course/'.$course->image)}}" class="img-fluid" alt="" style="height: 195px;">
                      <h5 class="text-center mt-2 border-bottom pb-2 pt-3">{{$course->title}}</h5>
                      <h5 class="text-center mt-2 border-bottom pb-2"><span class="float-left">কোর্সের সময়কাল</span> {{$course->duration}}</h5>
                      <h5 class="text-center mt-2 border-bottom pb-2"><span class="float-left">কোর্স ফি</span> {{$course->fees}} টাকা</h5>
                      <a href="{{route('course-details', $course->id)}}" class="btn btn-primary btn-sm">আরও পড়ুন</a><a href="{{route('applyNow')}}" class="btn btn-danger btn-sm float-right">আবেদন করুন</a>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
  </div><!-- .course end -->
  <div class="course mt-3">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center font-weight-bold">শিক্ষক</h4>
          </div>
          <div class="card-body">
            <div class="owl-carousel owl-theme">
                @foreach(App\Faculty::getAllTeacher() as $teacher)
                  <div class="card item">
                    <div class="card-body">
                      <img src="{{asset('uploads/faculty/'.$teacher->image)}}" class="img-fluid" alt="" style="height: 195px;">
                      <table class="table table-bordered">
                        <tr>
                            <td class="text-center" colspan="2">{{$teacher->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{$teacher->designation}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{$teacher->phone}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
  </div><!-- .course end -->
  <div class="add-section mb-3 mt-4">
    <div class="contaienr">
       <div class="row">
          <div class="col-lg-4">
           <a href="https://api.schoolsoftware-bd.com/1" target="_blank">
             <img src="https://api.schoolsoftware-bd.com/image/banner/banner1.jpg" class="w-100" alt="">
           </a>
          </div>
          <div class="col-lg-4">
           <a href="https://api.schoolsoftware-bd.com/2" target="_blank">
             <img src="https://api.schoolsoftware-bd.com/image/banner/banner2.jpg" class="w-100" alt="">
           </a>
          </div>
          <div class="col-lg-4">
           <a href="https://api.schoolsoftware-bd.com/3" target="_blank">
             <img src="https://api.schoolsoftware-bd.com/image/banner/banner3.jpg" class="w-100" alt="">
           </a>
          </div>
       </div> 
    </div><!-- .container end -->
  </div><!-- .add-section end -->
@endsection('content')