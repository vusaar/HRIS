<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobhierarchy extends Model
{
    //

      protected $table = 'tbljobtitlehierarchy';


      public function parent(){
        return $this->hasOne(Jobhierarchy::class,'id','hierarchy_parent');
      }
}
