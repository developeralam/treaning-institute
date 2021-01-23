<?php

use App\Configuration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data[] = array(
		  		 array('data'=>'Day', 'batch'=> 1),
               array('data'=>'Evening', 'batch'=> 1)
		    );
		$data[] =   array(
		    	array('data'=>'Muslim', 'religion'=> 1),
		        array('data'=>'Hindu', 'religion'=> 1),
		        array('data'=>'Buddhist', 'religion'=> 1),
                array('data'=>'Christian', 'religion'=> 1),
		        array('data'=>'Others', 'religion'=> 1)
		    );
		$data[] =   array(
		    	array('data'=>'Male', 'gender'=> 1),
		      array('data'=>'Female', 'gender'=> 1),
		       array('data'=>'Others', 'gender'=> 1)
		     );
		$data[] =   array(
		    	array('data'=>'2010', 'session'=> 1),
		        array('data'=>'2011', 'session'=> 1),
		    	array('data'=>'2012', 'session'=> 1),
               array('data'=>'2013', 'session'=> 1),
               array('data'=>'2014', 'session'=> 1),
               array('data'=>'2015', 'session'=> 1),
               array('data'=>'2016', 'session'=> 1)
		     );
	$data[] = array(
		    	array('data'=>'A+', 'bloodGroup'=> 1),
	            array('data'=>'Ab+', 'bloodGroup'=> 1),
                array('data'=>'Ab-', 'bloodGroup'=> 1),
                array('data'=>'B+', 'bloodGroup'=> 1),
                array('data'=>'B-', 'bloodGroup'=> 1),
                array('data'=>'A-', 'bloodGroup'=> 1)
		    );
	foreach($data as $datum){
		DB::table('configurations')->insert($datum);
      // Configuration::insert($datum); // Eloquent approach
	}
    }
}
