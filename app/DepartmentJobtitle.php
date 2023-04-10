<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentJobtitle extends Model
{
    //

    protected $table = 'tbldepartmentjobtitle';


    public function jobtitle(){
        return $this->hasOne(Jobtitle::class,'id','jobtitle_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }

    public function supervisor(){
        return $this->hasOne(DepartmentJobtitle::class,'id','supervisor_id');
    }

    public function grade(){
        return $this->hasOne(Employeegrade::class,'id','grade_id');
    }

    public function hierarchylevel(){
        return $this->hasOne(Jobhierarchy::class,'id','jobhierarchy_id');
    }

    public function employmentdetail(){
        return $this->hasOne(Employmentdetail::class,'departmentjobtitle_id','id');
    }
}
