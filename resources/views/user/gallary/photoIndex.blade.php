@extends('user.app')
@section('content')
<div class="photo-gallery mt-3 mb-3">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center font-weight-bold">ফটো গ্যালারি</h4>
      </div>
      <div class="card-body">
        <div class="gallery P-3">
          <div class="row">
            @foreach(App\PhotoGallary::getAllPhoto() as $photo)
            <div class="col-lg-3 mb-3">
              <img src="{{asset('uploads/photogallary/'.$photo->image)}}" class="w-100" alt="">
            </div>
            @endforeach
          </div>
        </div><!-- .gallery end -->
      </div>
    </div>
    
  </div>
</div><!-- .photo-gallery end -->
@endsection('content')