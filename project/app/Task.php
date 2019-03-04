<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   public $timestamps = false;
   protected $fillable = ['task_name','devloper_id','duration','assign_by','status'];
   public function createdby()
   {
   	 return $this->belongsTo('App\User','assign_by','id');
   }
   public function devloper()
   {
   	return $this->belongsTo('App\User','devloper_id','id');
   }
  
}
