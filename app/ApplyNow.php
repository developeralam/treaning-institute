<?php
namespace App;
use App\Configuration;
use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApplyNow extends Model
{
    public function courses(){
    	return  $this->hasOne(Course::class,'id','course');
    }
    public function configurations(){
    	return  $this->belongsToMany(Configuration::class);
    }
//    public static function findName($id){
//    	return DB::table('courses')->select('title')->where('id',$id)->first()->title;
//    	// return DB::table('configurations')->select('data')->where('id',$id)->first()->data;
//    }
    // public static function findReligion($id){
    // 	// return DB::table('courses')->select('title')->where('id',$id)->first()->title;
    // 	// return DB::table('configurations')->select('data')->where('id',$id)->first()->data;
    // }
}
