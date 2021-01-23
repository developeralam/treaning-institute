@extends('user.app')
@section('content')
    <div class="notice-details mt-3 mb-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center font-weight-bold">{{$item->title}}</h4>
                </div>
                <div class="card-body">
                    <p>{{$item->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection('content')