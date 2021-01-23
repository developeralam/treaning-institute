 <footer class="footer_widgets d-print-none">

     <div class="footer_top">
         <div style="font-size: 17px!important;" class="container">
             <div class="row">

                 <div class="col-lg-4 col-md-4 col-sm-5">
                     <div class="widgets_container widget_menu">
                         <h3 style="font-size: 20px!important;">বিজনেজ পার্টনার</h3>
                         <div class="footer_menu">
                             <ul>
                                 @if($siteConfig)
                                 <li>
                                     <span style="font-size:25px;" > {{ !empty($siteConfig->name)?$siteConfig->name:''}}</span>
                                </li>
                                 <li><i class="fa fa-home" aria-hidden="true"></i>
                                     {{ !empty($siteConfig->address)?$siteConfig->address:'' }} </li>
                                 <li>
                                     <i class="fa fa-phone" aria-hidden="true"></i>
                                     {{ !empty($siteConfig->phone_number1)?$siteConfig->phone_number1:'' }}&nbsp;,
                                     {{ !empty($siteConfig->phone_number2)?$siteConfig->phone_number2:'' }}
                                 </li>
                                 <li>
                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        {{ !empty($siteConfig->email)?$siteConfig->email:'' }}&nbsp;,
                                    <span style="padding-left:1em">&nbsp;{{ !empty($siteConfig->email2)?$siteConfig->email2:'' }}</span>
                                 </li>

                                 <li>
                                    @php
                                      $social = App\Social::where('status','1')->get();
                                    @endphp
                                    @foreach($social as $val)
                                    {{--  @dd($val);  --}}
                                    <div style="display: inline-block;">
                                        <a class="social-footer" href="{{ $val->link ?? '' }}" target="blank">
                                            <style>
                                                .social-footer{
                                                    font-size: 20px !important;
                                                    background: #000;
                                                    color:{{ $val->color }};
                                                    border-radius: 100%;
                                                    padding: 7px 10px;
                                                }
                                                .social-footer:hover{
                                                    /* background: #444; */
                                                    color:#C40316;
                                                }
                                            </style>                                            
                                            {!! $val->icon !!}
                                        </a>
                                    </div>
                                    @endforeach
                                </li>
                                 
                                 {{-- <li><a href="#"><i class="fa fa-globe" aria-hidden="true"></i>
                                {{ $siteConfig->facebook??null }}</a></li> --}}
                                 @endif

                             </ul>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-4 col-sm-6">
                     <div class="widgets_container widget_menu">
                         <h3 style="font-size: 20px!important;">আমাদের সাথে থাকুন </h3>
                         <div class="footer_menu">
                            {{--  <div width="container">
                                <style>
                                    iframe {
                                        position: inherit;
                                        top: 0;
                                        left: 0;
                                        bottom: 0;
                                        right: 0;
                                        width: 100%;
                                        height: 100%;
                                        border: none;
                                    }
                                </style>
                                {!! $siteConfig->google_map !!}
                             </div>  --}}

                             {{--  <div class="fb-page" data-href="{!! !empty($siteConfig->facebook)?$siteConfig->facebook:'' !!}" data-tabs="" 
                                data-width="400" data-height="150" data-small-header="true" data-adapt-container-width="false"
                                  data-hide-cover="false" data-show-facepile="false">
                                <blockquote cite="{!! !empty($siteConfig->facebook)?$siteConfig->facebook:'' !!}" class="fb-xfbml-parse-ignore">
                                    <a href="{!!!empty($siteConfig->facebook)?$siteConfig->facebook:''!!}">Facebook</a>
                                </blockquote>
                            </div>  --}}

                            <style>
                                @media only screen and (max-width: 400px) and (min-width: 360px){
                                    iframe{
                                        width: 340px !important;
                                    }
                                }
                            </style>
                            <div class="fb-page" data-href="{!! !empty($siteConfig->facebook)?$siteConfig->facebook:'' !!}" 
                                data-tabs="timeline" data-width="400" data-height="150" data-small-header="false" 
                                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="{!! !empty($siteConfig->facebook)?$siteConfig->facebook:'' !!}"
                                    class="fb-xfbml-parse-ignore">
                                    <a href="{!!!empty($siteConfig->facebook)?$siteConfig->facebook:''!!}">Facebook</a>
                                </blockquote>
                            </div>


                            
                         </div>
                     </div>
                 </div> 
                 <div class="col-lg-4 col-md-4 col-sm-5">
                     <div class="widgets_container widget_menu footer_grid_style">
                         <h3 style="font-size: 20px!important;padding-left: 15%;">প্রধান কার্যালয়</h3>
                         <div class="footer_menu">
                             <ul style="padding-left: 15%;">
                                <li>
                                    <span style="font-size:25px;" >এম এম আইটি সফট লিঃ</span>
                                </li>
                                 <li><i class="fa fa-home" aria-hidden="true"></i>
                                 হক ম্যানশন ( ৬ষ্ঠ তলা ), ২১/১ জিগাতলা,<br />
                                    <span style="padding-left:1em">ধানমন্ডি, ঢাকা -১২০৯<span>
                                    </li>
                                 <li>
                                     <i class="fa fa-phone" aria-hidden="true"></i>
                                     <span>হটলাইন: ০১৮৬০-৪২৪৩৪৪ ,</span>
                                     <span>০১৮৬০-৪২৪৩৪৪</span>
                                 </li>
                                 <li><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <span>mmitsolution18@gmail.com ,</span>
                                    <span style="padding-left:1em">&nbsp;mmitsolution18@gmail.com </span>
                                 </li>

                                <li>                                                                      
                                    <div style="display: inline-block;">
                                        <a href="https://www.facebook.com/mmitsoftltd" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                                                        
                                    <div style="display: inline-block;">
                                        <a href="https://twitter.com/mmitsoftltd" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                                                        
                                    <div style="display: inline-block;">
                                        <a href="https://www.linkedin.com/in/mmitsoftltd/" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                                                        
                                    <div style="display: inline-block;">
                                        <a href="https://www.instagram.com/mmitsoftltd/" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                                                        
                                    <div style="display: inline-block;">
                                        <a href="https://www.pinterest.com/mmitsoftltd/" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-pinterest-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                                                        
                                    <div style="display: inline-block;">
                                        <a href="https://www.youtube.com/channel/UCnIjPr81dr_otZuDQiUXInA" style="font-size: 20px;
                                                   background:#000000;
                                                   border-radius: 100%;
                                                   padding: 7px 10px;" target="blank">
                                            <i class="fa fa-youtube-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>                                 


                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer_bottom">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-4 col-md-4">
                     <div class="copyright_area">
                         <p style="font-size: 18px!important;">কপিরাইট&nbsp;&copy;&nbsp;<?php echo date("Y"); ?>&nbsp;<a style="color: #fff;text-decoration: none;" href="{{url('/')}}" target="_blank">{{ !empty($siteConfig->name)?$siteConfig->name:'' }}</a></p>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-4"> 
                 </div>

                 <div class="col-lg-4 col-md-4">
                     <div class="footer_payment text-right">
                        <span style="font-size: 18px;">Powered by :</span>
                         <a style="font-size: 18px!important;color: #fff;" href="https://mmitsoft.com/" target="_blank"> MM IT SOFT LTD.</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 @section('js')
 @show
 <!--footer area end-->


 <!-- JS
============================================ -->

 <!-- Plugins JS -->
 <script src="{{ asset('user/assets/js/plugins.js') }}"></script>

 <!-- Main JS -->
 <script src="{{ asset('user/assets/js/main.js') }}"></script>

 <!--owlcarusol-->
 <div id="fb-root"></div>
 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="bd6TFdw1"></script>

 <script>
     $(document).ready(function() {
         var owl = $('.owl-carousel');
         owl.owlCarousel({
             margin: 10,
             nav: false,
             loop: true,
             autoplay: true,
             autoplayTimeout: 900,
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 2
                 },
                 1000: {
                     items: 3

                 }
             }
         })
     })
 </script>