@extends('user.app')
@section('content')
    <div class="contact mt-3 mb-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center font-weight-bold">যোগাযোগ</h4>
                </div>
                <div class="card-body">
                    <div class="contact-address">
                        <table class="table">
                            <tr>
                                <td>{{App\SiteConfig::getAllConfig()->address}}</td>
                            </tr>
                            <tr>
                                <td>{{App\SiteConfig::getAllConfig()->phone_number1}} / {{App\SiteConfig::getAllConfig()->phone_number2}}</td>
                            </tr>
                            <tr>
                                <td>{{App\SiteConfig::getAllConfig()->email}}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="contact-map">
                        {!! App\SiteConfig::getAllConfig()->google_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')