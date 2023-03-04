<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateVerification extends Model
{
    //

    protected $table ='tblcertificate_verification';


    public function document(){
        return $this->belongsTo(ApplicantQualificationDocument::class,'id','documenttype_id');
    }

}
