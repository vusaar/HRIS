<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    protected $table = "tbldepartment";


    public function section(){
        return $this->belongsTo(Section::class,'sectioncode','sectioncode');
    }
}
