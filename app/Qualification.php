<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Block\Element\Document;

class Qualification extends Model
{
    //

    protected $table ='tblapplicant_qualification';


    public function qualificationtype(){
        return $this->belongsTo(QualificationType::class,'qualificationtype_id','id');
    }

    public function courses(){
        return $this->hasMany(QualificationCourse::class,'applicant_qualification_id','id');
    }

    public function document(){
        return $this->hasOne(Document::class,'applicant_id','applicant_id');
    }

    public function qualification_document(){
        return $this->hasOne(ApplicantQualificationDocument::class,'applicant_qualification_id','id');
    }
}
