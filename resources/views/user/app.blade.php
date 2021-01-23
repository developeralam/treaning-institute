<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('user/assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user/assets/css/owl.theme.default.min.css')}}" />
    
    <!-- Font Awesome -->
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/assets/css/fontawesome.min.css')}}" />
    <style>
        @import  url('https://fonts.maateen.me/kalpurush/font.css');
        body{
            font-family: 'Kalpurush', Arial, sans-serif !important;
        }
        .header-top select{
            height: 32px!important;
            font-size: 13px!important;
            padding: 4px!important;
        }
        .nav-item{
            padding:0px 5px!important;
        }
        .nav-link{
            color:#000!important;
            font-size:18px!important;
        }
        .marquee a{
            text-decoration: none;
        }
        .footer-bottom{
            background-color:#DFE0E3;
        }
        .footer-top{
            background-color:#EBECEF;
        }
        .fb-page span, iframe{
            height:160px!important;
        }
        .bg-custom{
            background-color:#DFE0E3!important;
        }
        .custom-border{
            border-top-left-radius:10px;
            border-top-right-radius:10px;
        }
        /*Success Student Section Css*/
        .success-student p{
            margin-bottom: 0px!important;
        }
        .success-student .item .card-body{
            padding:0px!important;
        }

        /*All Course Section*/
        .course .container{
            padding-left:0px!important;
            padding-right:0px!important;
        }
        .contact-map iframe{
            height: 329px!important;
            width: 100%!important;
        }
        .header-menu .dropdown-menu .dropdown-divider:last-child{
            border-top:0px!important;
        }

        /*Back To Top*/
        #myBtn {
          display: none; /* Hidden by default */
          position: fixed; /* Fixed/sticky position */
          bottom: 20px; /* Place the button at the bottom of the page */
          right: 30px; /* Place the button 30px from the right */
          z-index: 99; /* Make sure it does not overlap */
          border: none; /* Remove borders */
          outline: none; /* Remove outline */
          background-color: red; /* Set a background color */
          color: white; /* Text color */
          cursor: pointer; /* Add a mouse pointer on hover */
          padding: 15px; /* Some padding */
          border-radius: 10px; /* Rounded corners */
          font-size: 18px; /* Increase font size */
        }

        #myBtn:hover {
          background-color: #555; /* Add a dark-grey background on hover */
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/responsive.css')}}">
    <title>MM IT SOFT Treaning Center</title>
  </head>
  <body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=786357888600012&autoLogAppEvents=1" nonce="55ZTYvRZ"></script>
    <div class="header-top bg-custom">
        <div class="container pt-2 pb-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                    <div class="header-top-logo">
                        <img class="w-25" src="{{asset('/uploads/siteconfig/'. App\SiteConfig::getAllConfig()->logo)}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="header-filter">
                        <form action="">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">বিভাগ</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">জেলা</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">উপজেলা</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">প্রতিষ্ঠান</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 h-serch-btn">
                    <input type="submit" class="btn btn-primary btn btn-sm" value="অনুসন্ধান">
                </div>
            </div>
        </div><!-- .container end -->
    </div><!-- .header-top end -->

    <div class="header-banner">
        <img class="w-100" src="{{asset('/uploads/siteconfig/'. App\SiteConfig::getAllConfig()->image)}}" alt="">
    </div><!-- .header-banner end -->

    <div class="header-menu bg-custom">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <nav class="navbar navbar-expand-lg navbar-light">
              <!-- <a class="navbar-brand" href="#">Navbar</a> -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.home')}}">হোম <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.aboutUs')}}">প্রতিষ্ঠান সম্পর্কে</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      কোর্স সমূহ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(App\Course::getAllCourse() as $course)
                          <a class="dropdown-item" href="{{route('course-details', $course->id)}}">{{$course->title}}</a>
                          <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('teacher')}}">শিক্ষক</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('service')}}">এম এম আইটি সেবা সমুহ</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        গ্যালারি
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('photo-gallery')}}">ফটো গ্যালারী</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{route('vedio-gallary')}}">ভিডিও গ্যালারী</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">যোগাযোগ</a>
                  </li>
                  <li class="nav-item">
                    
                  </li>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li> -->
                </ul>

              </div>
            </nav>
                </div>
                <div class="col-2">
                    <a href="{{route('applyNow')}}" class="btn btn-danger btn-sm mt-2 p-2 float-right">আবেদন করুন</a>
                </div>
            </div>
            
        </div><!-- .container end -->
    </div><!-- .header-menu end -->

    <div class="main-content">
      <div class="container">
        @yield('content')
      </div><!-- .container end -->
    </div><!-- .main-content end -->

    <div class="footer-top pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xl-4">
                    <h4 class="font-weight-bold pb-2">বিজনেজ পার্টনার</h4>
                    <h5>{{App\SiteConfig::getAllConfig()->name}}</h5>
                    <p>{{App\SiteConfig::getAllConfig()->address}}</p>
                    <p> {{App\SiteConfig::getAllConfig()->phone_number1}}, {{App\SiteConfig::getAllConfig()->phone_number2}}</p>
                    <p>{{App\SiteConfig::getAllConfig()->email}}</p>
                </div>
                <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xl-4">
                    <h4 class="font-weight-bold pb-2">আমাদের সাথে থাকুন</h4>
                    <div class="fb-page" data-href="{{App\SiteConfig::getAllConfig()->facebook}}" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{App\SiteConfig::getAllConfig()->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{App\SiteConfig::getAllConfig()->facebook}}">MMIT SOFT LTD.</a></blockquote></div>
                </div>
                <div class="col-lg-4 col-12 col-md-12 col-sm-12 col-xl-4">
                    <h4 class="font-weight-bold pb-2">প্রধান কার্যালয়</h4>
                    <h5>এম এম আইটি সফট লিঃ</h5>
                    <p>হক ম্যানশন ( ৬ষ্ঠ তলা ), ২১/১ জিগাতলা,ধানমন্ডি, ঢাকা -১২০৯</p>
                    <p>হটলাইন: ০১৮৬০-৪২৪৩৪৪ , ০১৮৬০-৪২৪৩৪৪</p>
                    <p>mmitsolution18@gmail.com  <br>  mmitsolution18@gmail.com</p>
                </div>
            </div>
        </div><!-- .container end -->
    </div><!-- .footer-top end -->

    <div class="footer-bottom p-3">
        <div class="container">
            <span class="text-dark text-left">কপিরাইট © 2021 {{App\SiteConfig::getAllConfig()->name}}</span>
            <span class="text-dark float-right">Powered by : MM IT SOFT LTD.</span>
        </div><!-- .container end -->
    </div><!-- .footer-bottom end -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('user/assets/js/owl.carousel.js')}}" ></script>
    <script>
    $('.owl-carousel').owlCarousel({
        items:3, 
        loop:true,
        margin:20,
        autoplay:true,
        autoplayTimeout:500,
        autoplayHoverPause:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

    //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0; // For Safari
          document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

    </script>
  </body>
</html>