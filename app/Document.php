<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //

    protected $table ='tblapplicant_documents';

    public function documents(){

          return $this->belongsTo(Applicant::class,'applicant_id','id');
    }

    public function qualificationtype(){
        return $this->belongsTo(QualificationType::class,'documenttype_id','id');
    }

    public function certificate_verification(){
        return $this->hasOne(CertificateVerification::class,'applicant_document_id','id');
    }
}
