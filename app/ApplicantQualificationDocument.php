<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantQualificationDocument extends Model
{
    //
    protected $table ='tblapplicant_qualification_documents';

    public function qualificationtype(){
        return $this->belongsTo(QualificationType::class,'documenttype_id','id');
    }

    public function certificate_verification(){
        return $this->hasOne(CertificateVerification::class,'applicant_document_id','id');
    }
}
