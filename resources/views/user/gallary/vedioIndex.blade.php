@extends('user.app')
@section('content')
<div class="video-gallery mt-3 mb-3">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">ভিডিও গ্যালারি</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(App\VedioGallary::getAllVideo() as $video)
                        <div class="col-lg-4">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/B01Cwq_cpqs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')