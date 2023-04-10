<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;


class EmployeeController extends Controller
{

    public function index(Request $request){


        $query = $request->input('query')!==null?trim($request->input('query')):"";

        $employee_result = Employee::with(['employmentdetails'=>function($employmentdetails){
            $employmentdetails->with(['departmentjobtitle'=>function($departmentjobtitle){
                $departmentjobtitle->with(['supervisor'=>function($supervisor){
                    $supervisor->with(['employmentdetail'=>function($employmentdetail){
                        $employmentdetail->with('employee');
                    },'jobtitle']);
                },'jobtitle','department','section']);
            },'contract']);
        }]);


        if($request->has('query')){
         
            $search = $request->input('query');
    
            $employee_result = $employee_result->Wherehas('employmentdetails.departmentjobtitle.jobtitle',function ($q) use($search){
                 $q->where('jobtitlename','like','%'.$search.'%');
            })->orWhere('forenames','like','%'.$search.'%')->orWhere('surname','like','%'.$search.'%');
          }
       
        $employees = $employee_result->get();

         //dd($employees);

         /*
            return as json
         */
        if($request->has('query')){

            return response()->json([
              'data' => json_encode($employees)
          ], 201);
          }

        return view('employee.index',compact('employees'))->withData(json_encode($employees));
    }

}


?>