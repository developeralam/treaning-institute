<header>
        <div class="logo">
{{--            <div class="">--}}
                <div class="row">
                    <a href="">
                        <style>
                            .logo{
                                width: 98.9% !important;
                            }
                            .top-banner{                                
                                {{--  height:120px;  --}}
                                {{--  height:auto;  --}}
                                margin-top: -20px;
                            }
                            @media only screen and (max-width: 768px) and (min-width: 416px) {
                                .top-banner{
                                    width: 98.6% !important;
                                }
                                .logo{
                                    width: 99.5% !important;
                                }                                
                            }
                            @media only screen and (max-width: 414px) and (min-width: 374px) {
                                .top-banner{
                                    margin-top: -30px;
                                    width: 98.6% !important;
                                }
                                .logo{
                                    margin-top: 20px;
                                    width: 97.9% !important;
                                }                                
                            }
                            @media only screen and (max-width: 375px) and (min-width: 361px){
                                .top-banner{
                                    margin-top: -30px;
                                    width: 98.6% !important;
                                }
                                .logo{
                                    margin-top: 20px;
                                    width: 97.4% !important;
                                }                                
                            }
                            @media only screen and (max-width: 360px){
                                .top-banner{
                                    width: 97.5% !important;
                                }
                                .logo{
                                    width: 98.5% !important;
                                }                                
                            }
                            @media only screen and (max-width: 320px){
                                .top-banner{
                                    width: 97.5% !important;
                                }
                                .logo{
                                    width: 98.0% !important;
                                }                                
                            }
                        </style>  
                        <img class="top-banner" src="{{ url('uploads/siteconfig/')}}/{{!empty($siteConfig->image)?$siteConfig->image:''}}" alt=""
                             style="">
                    </a>
                </div>
{{--            </div>--}}
        </div>
        <div class="main_header">
            <div class="container">
                <div class="header_middle sticky-header">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="main_menu menu_position text-left">
                                <nav style="font-family: 'Kalpurush', Arial, sans-serif !important;">
                                    <ul>
                                        <li>
                                            <a class="active" href="{{ route('user.home') }}">হোম</a>
                                       </li>
                                    <li>
                                        <a href="javascript:void()">প্রতিষ্ঠান সম্পর্কে<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{ route('user.aboutUs') }}">প্রতিষ্ঠান সম্পর্কে</a></li>
												{{-- <li><a href="{{ route('user.message') }}">পরিচালকের বাণী</a></li> --}}
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0)"> কোর্স সমূহ<i class="fa fa-angle-down"></i></a>
                                           <ul class="sub_menu pages">
                                               <li><a href="{{ route('user.course') }}">সমস্ত কোর্স</a></li>
                                             {{-- @dd($course) --}}
                                                  @foreach($training_courses as $new)
                                              <li>
                                                  <a href="{{ url('course/details',$new->id??null) }}"> {{ $new->title??null }}</a>
                                              </li>
                                                    @endforeach
                                            </ul>
                                        </li>
                                         <li><a href="{{ url('teacher') }}"> শিক্ষক</a></li>
                                         <li><a href="{{ url('service') }}"> এমএম আইটি সেবাসমূহ</a></li>
                                         <li><a href="javascript:void()">গ্যালারি<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="{{ url('photo-gallary') }}">ফটো গ্যালারি</a></li>
                                                <li><a href="{{ url('vedio-gallary') }}">ভিডিও গ্যালারি</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('user.portfolio') }}"> পোর্টফোলিও</a></li>

                                        @foreach(App\Menu::where('menuid','0')->get() as $menu)
                                            @if (App\Menu::where('menuid',$menu->id)->first() == '')
                                                <li><a href="{{ route('userpage',$menu->id) }}">{{$menu->title}}</a></li>
                                            @else
                                            <li>
                                                <a href="javascript:void()">{{$menu->title}}<i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu pages">
                                                    @foreach(App\Menu::where('menuid',$menu->id)->get() as $me)
                                                        <li><a href="{{ route('userpage',$me->id) }}">{{$me->title}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                        

                                        <li><a href="javascript:void(0)"> রেজাল্ট <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="http://www.bteb.gov.bd/" target="_blank">বোর্ড রেজাল্ট</a></li>
                                                <li><a href="{{ url('result') }}" target="_blank"> ইন্সটিটিউট রেজাল্ট</a></li>
                                            </ul>
                                        </li>                                        
                                        <li><a href="{{ route('user.contact') }}"> যোগাযোগ</a></li>
                                        <li class="pl-3 pull-right" style="background-color:red;border-radius: 0px;display: block;"><button  style="background-color: red; color:#fff;margin-left: -8px" class="btn btn-block applyBtn" type="submit" ><a  style="background-color: red; color:#fff;font-size: 17px;font-weight: bold;" class="applyBtn" href="{{ route('user.applyNow') }}">আবেদন করুন</a></button></li>
                                    </ul>
                                </nav>
                            </div>
                    </div>       
                 </div>
                     
             </div>                 
         </div>  

    </header>