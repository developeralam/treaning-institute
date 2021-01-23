@extends('user.app')
@section('content')
    <div class="service mt-3 mb-3">
        <div class="scontainer">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center font-weight-bold">এম এম আইটি সেবা সমুহ</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach(App\Service::GetAllServic() as $service)
                        <div class="col-lg-6">
                            <div class="single-service">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('uploads/service/'.$service->image)}}" alt="" class="w-100">
                                    </div>
                                    <div class="col-8">
                                        <h4 class="font-weight-bold">{{$service->name}}</h4>
                                        <p class="font-weight-bold">{{substr(strip_tags($service->description),0,700)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')