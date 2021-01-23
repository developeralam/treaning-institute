@extends('user.app')
@section('title', $siteConfig['name']??null )


@section('main-content')
    <div class="about_bg_area">
        <div class="container">
            <!--about section area -->
            <section class="about_section mb-60">
                <div class="row pt-5">
                    <div class="col-md-3">
                        <!-- <img src="{{ asset('uploads/message/') }}/{{!empty($page->image)?$message->image:''}}" alt="" style="height: 250px; weight: 350px; margin-top: 4px;"> -->
                        <!-- <img src="https://cdn5.vectorstock.com/i/1000x1000/50/29/user-icon-male-person-symbol-profile-avatar-vector-20715029.jpg" alt="" style="height: 250px; weight: 350px; margin-top: 4px;"> -->
                    </div>
                    <div class="col-md-12">
                        <div style="background-color: rgba(200, 200, 200,0.3); padding: 15px;">
                            <p class="pl-3">{!! !empty($page->description)? ucfirst($page->description):'' !!}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--about section end-->
        <!--testimonial area end-->
        </div>
    </div>

@endsection