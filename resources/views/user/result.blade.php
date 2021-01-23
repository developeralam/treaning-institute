@extends('user.app')
 @section('title', $siteConfig['name']??null )
 @section('main-content')
 <style>
     td{
         text-transform: capitalize;
         text-align: justify;
     }
     #print{
         margin-top: 2px;
         background:#294A70;
         color: white;
     }
    #print:hover{
         background:#3c74b4;
    }    
 </style>
      <div class="blog_bg_area">
        <div class="container">
            <!--blog area start-->
            <div class="row">
                <div class="col-12">
                    <div class="blog_wrapper blog_nosidebar" style="margin-bottom: 3%;">
                        <div class="blog_header  d-print-none"
                            style="
                                margin-bottom:0px;
                                margin-top:30px;
                                background:#294A70;">
                            <h4 class="p-2"
                                style="text-align: left;
                                       color:white;
                                       margin-bottom:0px;">My Result</h4>

                            @if (\Session::has('warning'))
                                <div class="alert alert-warning">
                                    {!! \Session::get('warning') !!}
                                </div>
                            @endif                                        
                        </div>
                        <div class="blog_wrapper_inner row" style="margin:0px !important; margin-bottom : 37px">
                            <div class="col-sm-6 d-print-none">
                                <div class="p-2">
                                    <form method="GET" action="{{ route('resultsearch') }}"  enctype="multipart/form-data" class="form-horizontal">
                                        <input type="text" class="form-control" name="search" placeholder="Student ID">
                                        <div class="my-2">
                                            <button class="btn btn-success form-control" style="background:#294A70;">
                                                <i class="fa fa-search">&nbsp;Search&nbsp;</i>
                                            </button>
                                        </div>
                                    </form>                                
                                </div>
                            </div>

                            @if($profile != '')
                            <div class="col-sm-6"
                                style="border: 3px solid #294A70; "
                                id="printableArea">
                                <style>
                                    @media print {
                                        form{
                                            margin: 0px !important;                                            
                                            margin-top:50px !important;
                                            margin-left:70px !important;
                                            margin-right:70px !important;
                                        }
                                        td{
                                            font-size:18px;
                                            line-height: 2.2;
                                        }
                                        #print_image{
                                            width: 200px !important;
                                            height: 250px !important;
                                        }
                                        html, body {
                                            height: 99%;    
                                        }                                        
                                    }
                                        
                                </style>
                                <div class="printresult p-2">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <table>
                                                    <tr>
                                                        <td>Session&nbsp;:</td>
                                                        <td>{{ $profile->studentSession->session_name??'' }}</td>
                                                        <input type="hidden" name="print_session" value="{{ $profile->studentSession->session_name??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>Course&nbsp;Name&nbsp;:</td>
                                                        <td>{{ $profile->courses[0]->title??'' }}</td>
                                                        <input type="hidden" name="print_course" value="{{ $profile->courses[0]->title??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>Batch&nbsp;Name&nbsp;:</td>
                                                        <td>{{ $profile->studentBatches[0]->batch_name??'' }}</td>
                                                        <input type="hidden" name="print_batch" value="{{ $profile->studentBatches[0]->batch_name??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>Student&nbsp;Name&nbsp;:</td>
                                                        <td>{{ $profile->name??'' }}</td>
                                                        <input type="hidden" name="print_name" value="{{ $profile->name??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>Student&nbsp;ID&nbsp;:</td>
                                                        <td>{{ $result->student_id??'' }}</td>
                                                        <input type="hidden" name="print_id" value="{{ $result->student_id??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>Total Marks&nbsp;:</td>
                                                        <td>{{ $result->total??'' }}</td>
                                                        <input type="hidden" name="total_mark" value="{{ $result->total??'' }}" />
                                                    </tr>
                                                    <tr>
                                                        <td>GPA&nbsp;:</td>
                                                        <td>{{ $result->gpa??'' }}</td>
                                                        <input type="hidden" name="gpa" value="{{ $result->gpa??'' }}" />
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                @php
                                                    $image = $profile->image??'';
                                                @endphp
                                                @if($image != '')
                                                    <img src="{{ asset($image) }}" class="img-tumbnail" id="print_image" style="width:150px; height:150px;" />
                                                    <input type="hidden" name="print_image" value="{{ asset($image) }}" />
                                                    <div class="form-horizontal">
                                                        <button type="submit"
                                                                class="btn form-control d-print-none"
                                                                id="print"
                                                                onclick="printDiv('printableArea')"
                                                                value="print a div!">Print</button>
                                                    </div>
                                                @else
                                                    <img src="https://cdn2.vectorstock.com/i/1000x1000/91/76/girl-user-icon-simple-vector-18149176.jpg" class="img-tumbnail" width="250" height="250" />
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div>
                            @endif                            
                        </div>
                    </div>
                </div>
            </div>
            <!--blog area end-->
        </div>
    </div>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>    
@endsection