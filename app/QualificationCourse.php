<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationCourse extends Model
{
    //
    protected $table ='tblapplicant_qualification_course';


    public function qualification(){
        return $this->belongsTo(Qualification::class,'id','applicant_qualification_id');
    }

}
