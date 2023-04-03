<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Section;

class DepartmentController extends BaseController
{
    //


    public function index(Request $request){


      $query = $request->input('query')!==null?trim($request->input('query')):"";

        $department_results = Department::with('section');

        if($request->has('query')){

          $search = $request->input('query');

          $department_results = $department_results->Wherehas('section',function ($q) use($search){
               $q->where('sectionname','like','%'.$search.'%');
          })->orWhere('departmentname','like','%'.$search.'%');
        }


        $departments = $department_results->get();
        
         /*
            return as json
         */
        if($request->has('query')){

          return response()->json([
            'data' => json_encode($departments)
        ], 201);
        }

        return view('department.index',compact('departments'))->withData(json_encode($departments));;
    }




    public function doUpsert(Request $request){

        $request->validate([
            'departmentname' => 'required|max:255',
            'sectioncode' => 'required',
            'id' => 'required',       
            ]);

         $departmentname = $request->input('departmentname');
         $sectioncode = $request->input('sectioncode');
         $id =  $request->input('id');


         /*
            if id > 0 , then its an edit, otherwise its an insert
         */  
         if($id>0){

              $department  = Department::where('id',$id)->first();

              if($department){

                $department = Department::where('departmentname',$departmentname)->where('id','<>',$id)->first();

                if($department==null){
                    Department::where('id',$id)->update(['departmentname'=>$departmentname,'sectioncode'=>$sectioncode]);
                }else{

                    return back()->withErrors(['error'=>'A department with the name <b>'.$departmentname.'</b> already exists']);
                }

              }else{
                return back()->withErrors(['error'=>'Department does not exist']);
              }

         }else{

             /*
               - assumption : a departmrnt cannot belong to more than 1 section
               - a deparment name is unique
             */

             $department = Department::where('departmentname',$departmentname)->get();

             
             if(count($department)==0){


                 $departmentcode = '';

                /*
                   generate short name,
                   method shortName is from an inherited class, BaseController
                */
                
                 $departmentcode = $this->uniqueCode($departmentname,'App\Department','departmentcode');
                
                 $department = new Department;

                 $department->departmentname = $departmentname;

                 $department->departmentcode = $departmentcode;

                 $department->sectioncode = $sectioncode;

                 $department->save();


             }else{
                 /*
                  error
                  department by the same name already exists
                 */

                return back()->withErrors(['error'=>'A department with the same name already exists']);
             }

         }

         return redirect('departments')->with('success', 'Department saved successfully');

    }




  public function showUpsertView($id=null){
           
            /*
          if id=0 then we are inserting a new session
          otherwise  its a update of an old session
        */

          $department = null;

          if(isset($id)){
         
             $department  = Department::where('id',$id)->first();
  
          }
  
          $sections = Section::orderBy('sectionname','asc')->get();

          return view('department.upsert',compact('department','sections')); 
  }

}
