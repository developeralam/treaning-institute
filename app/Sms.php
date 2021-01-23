<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
	//Get All Sms Content
	public static  function getAllSmsContent()
	{
		return Sms::all();
	}


   public static function techno_bulk_sms($mobileNo,$message){
	$url = 'https://mmitsms.com/api/bulkSmsApi';
	$data = array('sender_id' => 84,
	 'apiKey' => 'TU1JVEhPU1BJVEFMOk1NSVRAIyQyMDIw',
	 'mobileNo' => $mobileNo,
	 'message' =>$message	
	 );

	 $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
	    $output = curl_exec($curl);
	    curl_close($curl);

	    echo $output;
	}
	 

}
