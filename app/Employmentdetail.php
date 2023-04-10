<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employmentdetail extends Model
{
    //

 protected $table ='tblemploymentdetails';


 public function employee(){
    return $this->belongsTo(Employee::class,'employeeid','employeeid');
 }



 public function departmentjobtitle(){
    return $this->hasOne(DepartmentJobtitle::class,'id','departmentjobtitle_id');
 }


 public function contract(){
     return $this->hasOne(Contract::class,'id','contract_id');
 }

}