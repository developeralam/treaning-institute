@extends('user.app')
 @section('title', $siteConfig['name']??null )
 @section('main-content')
      <div class="blog_bg_area">
        <div class="container">
            <!--blog area start-->
            <div class="row">
                <div class="col-12">
                    <div class="blog_wrapper blog_nosidebar">
                        <div class="blog_header">
{{--                            <h1 style="line-height: 17px; padding-top: 18px;">List of Portfolio</h1>--}}
                        </div>
                        <div class="blog_wrapper_inner row" style="margin-bottom : 37px">
                            @foreach($items as $item)
                         <div class="col-md-6 mb-3">
                             <article class="single_blog">
                                 <figure>
                                    <div class="blog_thumb" style="width: 24%">
                                        <a href="#">
                                            <img src="{{ asset('uploads/portfolio/'.$item->image) }}"
                                                 class="img-thumbnail"
                                                 style="height: 110px; width: 100%;">
                                        </a>
                                    </div>
                                    <figcaption class="blog_content" style="line-height: 7px; padding-bottom: 3px; padding-top: 0px;">
                                        <h4 class="post_title"><b>{{ $item->title }}</b></h4>
                                        <div class="blog_desc pt-1">
                                            {{--  <p>{!! ucfirst(substr($item->description,0,250)) !!}</p>  --}}
                                            <p style="text-align: justify;">
                                            <?php echo substr(strip_tags($item->description),0,700) . "..."; ?>
                                        </p>
                                        </div>
                                    </figcaption>
                                 </figure>
                             </article>
                         </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--blog area end-->
        </div>
    </div>
    
@endsection