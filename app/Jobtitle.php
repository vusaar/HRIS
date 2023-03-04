<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    //

    protected $table = 'tbljobtitle';



    public function jobhierarchy(){
        return $this->hasOne(Jobhierarchy::class,'id','jobhierarchy_id');
    }
}
