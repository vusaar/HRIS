<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //

    protected $table = 'tblvacancy';



    public function departmentjobtitle(){
        return $this->hasOne(DepartmentJobtitle::class,'id','departmentjobtitle_id');
    }

    public function contract(){
        return $this->hasOne(Contract::class,'id','contract_id');
    }


    public function applications(){

        return $this->hasMany(Application::class,'vacancy_id','id');
    }
}
