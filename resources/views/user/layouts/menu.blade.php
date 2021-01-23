    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div id="menu" class="text-left" style="font-family: 'Kalpurush', Arial, sans-serif !important;">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a class="active" href="{{ route('user.home') }}">হোম</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">আমাদের সম্পর্কে</a>
                                    <ul class="sub-menu">
                                       <li><a href="{{ route('user.aboutUs') }}">আমাদের সম্পর্কে</a></li>
                                       <li><a href="{{ route('user.message') }}">পরিচালকের বাণী</a></li>
                                    </ul>
                                </li>
                                 <li class="menu-item-has-children">
                                    <a href="{{ route('user.course') }}">কোর্স সমূহ</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('user.course') }}">সমস্ত কোর্স</a></li>
                                        @if($course??null)
                                               @foreach($course as $new)
                                              <li><a href="{{ url('course/details',$new->id??null) }}"> {{ $new->title??null }}</a></li>
                                               @endforeach
                                         @endif
                                    </ul>
                                </li>
                                  <li><a href="{{ url('faculty') }}"> শিক্ষক</a></li>
                                  <li><a href="{{ url('service') }}">এমএম আইটি সেবাসমূহ</a></li>

                                 <li class="menu-item-has-children">
                                    <a href="#">গ্যালারি</a>
                                    <ul class="sub-menu">
                                       <li><a href="{{ url('photo-gallary') }}">ফটো গ্যালারি</a></li>
                                       <li><a href="{{ url('vedio-gallary') }}">ভিডিও গ্যালারি</a></li>
                                    </ul>
                                  </li>
                                     
                                        
                                        <li><a href="{{ route('user.portfolio') }}"> পোর্টফোলিও</a></li>
                                        <li><a href="{{ route('user.contact') }}"> যোগাযোগ</a></li>
                                        <li style="background-color:red;border-radius: 0px solid red;border: 0px solid red;color: #fff;" class="pl-3"><a class="btn btn-success" style="background-color:red;border-radius: 0px solid red;border: 0px solid red;display: block;font-size: 17px;font-weight: bold;" href="{{ route('user.applyNow') }}">আবেদন করুন</a></></li>
                            </ul>
                        </div>
                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i>{{ !empty($siteConfig->email)?$siteConfig->email:'' }}</a></span>
                            <ul>
                                <li class="facebook"><a href="{{ !empty($siteConfig->facebook)?$siteConfig->facebook:'' }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                               {{--  <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="selector-point pt-2 pb-2">
        <div class="container">
            <div class="row">
        
<style>
    @media only screen and (max-width: 414px) and (min-width:300px) {
        .float-left {
            float: unset !important;
        }
    }
    @media only screen and (max-width: 360px) and (min-width:30px) {
        .btn-outline-white {
            margin-left: 0px !important;
        }
        #weblink {
            margin-top: 10px !important;
        }
    }
</style>                
                    <div class="col-lg-2 col-md-2">
                        <div class="top-select-text">
                            <a href="https://mmitsoft.com/" target="_blank">  
                          <img href="https://mmitsoft.com/" src="{{ asset('user/assets/new.png') }}" alt="" style="height: 20px; width: 50px; margin-left: 20px;" > </a>
                        <p style="line-height: 15px; margin-top: -17px; margin-left: 84px;"> নির্বাচন করুন</p>
                        </div>
                     </div>
  
                     {{--  @dd($divisions);  --}}
                     <div class="col-lg-10 col-md-10">
                         <div class="top-selsector-option float-left">
                             <select id="division" name="division">
                              <option value="">বিভাগ</option>
                              @if(isset($divisions->data)):
                              @foreach($divisions->data as $key=>$item)
                                  <option value="{{ $item->id??null }}"> {{ $item->bn_name??null }} </option>
                                 @endforeach
                                 @endif
                            </select>
                         </div> 
                        <div class="top-selsector-option float-left">
                             <select id="district" name="district">
                              <option value="">জেলা</option>
                    
                            
                            </select>
                         </div> 

                         <div class="top-selsector-option float-left">
                             <select id="upazila" name="upazila">
                              <option value="">উপজেলা</option>
                              
                            </select>
                         </div>
                          <div class="top-selsector-option float-left">
                             <select id="institute" name="institute">
                              <option value="">প্রতিষ্ঠান</option>
                              
                          
                            </select>
                         </div>
                   <a href="#" id="weblink" target="_blank" class="btn btn-outline-white">অনুসন্ধান</a>

                 <script> 
                               
                                 $('#division').on('change', function(e) {
// console.log('hi');
                                      let $id = e.target.value;
                                      let $selectDistrict = $('#district');
                                      //console.log($id);
                                      $.get('/get-districts?division_id='+$id+'', function(data) {
                                          //success data
                                              $selectDistrict.empty();
                                              // console.log(data[0]);
                                              $selectDistrict.append('<option >জেলা</option>');
                                              $.each(data, function(Index, Obj){
                                                // console.log(Obj);

                                                  $selectDistrict.append('<option value='+ Obj.id +'>' + Obj.bn_name + '</option>');
                                              });
                                         });
                                  });
                                 $('#district').on('change', function(e) {

                                      let $id = e.target.value;
                                      let $selectUpazila = $('#upazila');
                                      //console.log($id);
                                      $.get('/get-upazilas?district_id='+$id+'', function(data) {
                                          //success data
                                              $selectUpazila.empty();
                                                // console.log(data);
                                              $selectUpazila.append(' <option >উপজেলা</option>');
                                              $.each(data, function(Index, Objj){
                                                // console.log(Objj);
                                                    $.each(Objj, function(Index, Obj){
                                                      console.log(Obj);
                                                  $selectUpazila.append('<option value='+ Obj.id +'>' + Obj.bn_name + '</option>');
                                                });
                                              });
                                         });
                                  });
                                 $('#upazila').on('change', function(e) {

                                      let $id = e.target.value;
                                      let $selectInstitute = $('#institute');
                                      //console.log($id);
                                      $.get('/get-institutes?upazila_id='+$id+'', function(data) {
                                          //success data
                                              $selectInstitute.empty();
                                              $selectInstitute.append('<option> প্রতিষ্ঠান </option>');
                                              $.each(data, function(Index, Objj){
                                                // console.log(Objj);
                                                    $.each(Objj, function(Index, Obj){
                                                      console.log(Obj);
                                                      var option = "<option value='"+Obj.website+"'>"+Obj.name+"</option>";
                                                  $selectInstitute.append(option);
                                                });
                                              });
                                         });
                                  });
                                  $('#institute').on('change', function(e) {

                                      let link = e.target.value;
                                      let button = document.querySelector('#weblink');
                                      button.href = link;
                                      console.log(button.href);
                                      
                                  });
                            </script>


                        
                     
                     </div>
                </div>
            
        </div>
    </section>