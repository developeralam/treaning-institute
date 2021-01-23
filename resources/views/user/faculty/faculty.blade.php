@extends('user.app')
@section('content')
    <div class="teacher mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h4 class="font-weight-bold text-center">সকল প্রশিক্ষক</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(App\Faculty::getAllTeacher() as $teacher)
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="t-img">
                                        <img src="{{asset('uploads/faculty/'.$teacher->image)}}" class="w-100" alt="">
                                    </div>
                                    <div class="t-details p-3">
                                        <h5 class=" font-weight-bold font-italic">{{$teacher->name}}</h5>
                                        <p> {{$teacher->phone}}</p>
                                        <p> {{$teacher->email}}</p>
                                        <p> {{$teacher->tranning}}</p>
                                    </div><!-- .t-details end -->
                                </div><!-- .card-body end -->
                            </div><!-- .card end -->
                        </div><!-- .col-12 end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection