<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
		'name', 'desc'
     ];  
     
     public function user(){

        return   $this->belongsTo(User::class);

      } 
}
