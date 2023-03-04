<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table ='tblapplication';

    public function vacancy(){
         return $this->belongsTo(Vacancy::class,'vacancy_id','id');
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class,'applicant_id','id');
    }
}
