<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'tblemployee';

    public function employmentdetails(){
        return $this->hasOne(Employmentdetail::class,'employeeid','employeeid');
    }



    public static function nextEmployeeNumber(){

        
          $ec_no = "0001";
        
        $ec_no_result = (new static)::orderBy('employeeid','desc')->first();

        //return $ec_no_result;

        if($ec_no_result!==null){
           
            $nxt = intval($ec_no_result['employeeid'])+1;

            $ec_no = str_pad(strval($nxt),4,"0",STR_PAD_LEFT);
              
        }

        return $ec_no;
    }



}
