<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $table ='tblapplicant';

     public function applications(){

        return $this->hasMany(Applications::class,'applicant_id','id');
     }


     public function qualifications(){
        return $this->hasMany(Qualification::class,'applicant_id','id');
     }


     public function experiences(){
        
        return $this->hasMany(Experience::class,'applicant_id','id');
         
     }


     public function documents(){
        return $this->hasMany(Document::class,'applicant_id','id');
     }

}
