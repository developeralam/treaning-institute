@extends('user.app')
@section('content')
    <div class="card mt-3 mb-3">
        <div class="card-header bg-custom">
            <h4 class="text-center">আমাদের সম্পর্কে</h4>
        </div>
        <div class="card-body p-5">
            {{strip_tags(App\AboutUs::getMessage()->about)}}
        </div>
    </div>
@endsection('content')