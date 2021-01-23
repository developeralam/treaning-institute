<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Admission Slip</title>
 
</head>
<body >
  
<input type='button' id='btn' value='Print' onclick='printDiv();'>
    <div class="container" id='DivIdToPrint'>
        <div class="row">
            <style>
                .container{
                    max-width: 700px;
                    margin: 0 auto !important;
                    display: block;
                }
                .row {
                    /* border:2px solid  #ddd; */
                    width: 100%;
                    display: flow-root;
                    grid-gap: 10px;
                    padding: 10px;
                }
                .row > div {
                    /* background-color: rgba(255, 255, 255, 0.8); */
                    text-align: center;
                    padding: 10px 0;
                    font-size: 20px;
                }
                .col-sm-2{
                    display: inline-block;
                    width: 10%;            
                }
                .col-sm-8{
                    display: inline-block;  
                    width: 80%;    
                }
                .col-sm-12{
                    display: block;  
                    width: 100%;          
                }
                .float-left{
                    float: left;            
                }
                .float-right{
                    float: right;
                }
                #customers {
                  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }
                
                #customers td, #customers th {
                  /* border: 1px solid #ddd; */
                  padding: 10px 20px;
                  padding-right: 5px;
                }
                .border{
                    border:2px solid  #ddd;
                    padding-bottom:100px !important ;
                }
                
                #customers tr:nth-child(even){background-color: #f2f2f2;}
                
                #customers tr:hover {background-color: #ddd;}
                
                /* #customers th {
                  padding-top: 12px;
                  padding-bottom: 12px;
                  text-align: left;
                  background-color: #4CAF50;
                  color: white;
                } */
                #btn{
                    float: right;
                    padding: 10px 30px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;
                    cursor: pointer;
                    margin-right: 15%;
                    margin-top: 1%;
                }
                #btn:hover{
                    background-color: #62e666;
                    cursor: pointer;
                }
            </style>
            <div class="border">
                <!-- <div class="col-sm-2 float-left">
                    <div class="">
                        <img src="https://lh3.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="" width="100" height="100"/>
                    </div>
                </div> -->
                <div class="col-sm-12">
                    <div class="text-center">
                        <h3>{{ $siteConfig->name }}</h3>
                        <h4>{{ $siteConfig->address }}</h4>
                        <h4 style="margin-top: 50px; margin-bottom: 50px;">
                            Online Admission Slip
                        </h4>
                    </div>
                </div>
                <!-- <div class="col-sm-2 float-right">
                    <div class="">
                        <img src="https://lh3.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="" width="100" height="100"/>
                    </div>
                </div> -->

                <div class="col-sm-12">
                    <table id="customers" style="text-align: left;">
                        <tr>
                            <td>Student Name : <span>{{ $item->name }}</span></td>
                            <td>Email : <span>{{ $item->email }}</span></td>
                        </tr>
                        <tr>
                            <td>Course Name : <span>{{ App\Course::where('id',$item->course)->first()->title }}</span></td>
                            <td>Phone : <span>{{ $item->phone }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function printDiv() 
    {
    
      var divToPrint=document.getElementById('DivIdToPrint');
    
      var newWin=window.open('','Print-Window');
    
      newWin.document.open();
    
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
    
      newWin.document.close();
    
      setTimeout(function(){newWin.close();},10);
    
    }
    </script>