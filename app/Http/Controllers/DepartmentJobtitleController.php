<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DepartmentJobtitle;

use App\Section;

use App\Jobtitle;

use App\Department;
use App\Employeegrade;
use App\Jobhierarchy;

class DepartmentJobtitleController extends BaseController
{
    //

    public function index(Request $request){

       // dd($request);

        $jobtitle_id = intval($request->input('jobtitle_id'));
        $department_id = intval($request->input('department_id'));
        $section_id =  intval($request->input('section_id'));
        $level_id = intval($request->input('level_id'));
        $isacademic = intval($request->input('isacademic_id'));


        

      $departmentjobtitles = DepartmentJobtitle::join('tbljobtitle','tbljobtitle.id','=','tbldepartmentjobtitle.jobtitle_id')->orderBy('tbljobtitle.jobtitlename','asc');

        if($jobtitle_id !== null && $jobtitle_id !==-1){
          $departmentjobtitles = $departmentjobtitles->where('jobtitle_id',$jobtitle_id);
        }

        if($department_id !== null && $department_id !==-1){
          $departmentjobtitles = $departmentjobtitles->where('department_id',$department_id);
        }

        if($section_id !== null && $section_id !==-1){
          $departmentjobtitles = $departmentjobtitles->where('section_id',$section_id);
        }

        if($level_id !== null && $level_id !==-1){

          $departmentjobtitles = $departmentjobtitles->where('jobhierarchy_id',$level_id);
        }

        if($isacademic !== null && $isacademic !==-1){

          $departmentjobtitles = $departmentjobtitles->where('isacademic',$isacademic);
        }

        $departmentjobtitles = $departmentjobtitles->get();

        $sections  = Section::orderBy('sectionname','asc')->get();

        $departments  = Department::orderBy('departmentname','asc')->get();

        $jobtitles = Jobtitle::orderBy('jobtitlename','asc')->get();

        $grades = Employeegrade::orderBy('grade','asc')->get();

        $levels = Jobhierarchy::orderBy('jobtitle_hierarchy','asc')->get();

        return view('departmentjobtitle.index',compact('sections','departments','jobtitles','grades','levels','departmentjobtitles'));
    }


    public function detail(){

      $departmentjobtitles = DepartmentJobtitle::join('tbljobtitle','tbljobtitle.id','=','tbldepartmentjobtitle.jobtitle_id')->orderBy('tbljobtitle.jobtitlename','asc')->get();      

      return view('departmentjobtitle.index',compact('departmentjobtitles'));
    }

    public function showUpsertView($id=null){
           
    /*
      if id=0 then we are inserting a new session
      otherwise  its a update of an old session
    */

      $departmentjobtitle = null;

      if(isset($id)){
     
         $departmentjobtitle  = DepartmentJobtitle::where('id',$id)->first();

      }

      $departmentjobtitles = DepartmentJobtitle::orderBy('id','asc')->get();      

      $sections  = Section::orderBy('sectionname','asc')->get();
      
      $departments  = Department::orderBy('departmentname','asc')->get();

      $jobtitles = Jobtitle::orderBy('jobtitlename','asc')->get();

      $grades = Employeegrade::orderBy('grade','asc')->get();
      
      $hierarchies = Jobhierarchy::orderBy('jobtitle_hierarchy','asc')->get();
      

      return view('departmentjobtitle.upsert',compact('departmentjobtitle','departmentjobtitles','sections','departments','jobtitles','grades','hierarchies')); 
}

 public function doUpsert(Request $request){
     

     $request->validate([               
        'isacademic'=>'required|max:255',        
        'section_id'=>'required',
        'jobtitle_id' => 'required',
        'hierarchy_id'=>'required',
        'grade_id'=>'required',
        'supervisor_id'=>'required',
        'id' => 'required',       
        ]);
         


        $isacademic= $request->input('isacademic');
        $section_id = $request->input('section_id');
        $department_id = $request->input('department_id')=='-1'?null:$request->input('department_id');
        $jobtitle_id = $request->input('jobtitle_id');
        $hierarchy_id  = $request->input('hierarchy_id');
        $grade_id = $request->input('grade_id');
        $supervisor_id = $request->input('supervisor_id')>0?$request->input('supervisor_id'):null;
        $id = $request->input('id');



          //dd($supervisor_id);
         /*
          *  if $id > 0 then do update
        */
        if($id>0){

              /*
               * check if there is no other DepartmentJobtitle with a different id
              */

              $departmentjobtitle = DepartmentJobtitle::where('isacademic',$isacademic)->where('section_id',$section_id)->where('department_id',$department_id)->where('jobtitle_id',$jobtitle_id)->where('grade_id',$grade_id)->where('id','<>',$id)->first();

               /*
                 departmentjobtitle already exists
               */
              if($departmentjobtitle == null){


                DepartmentJobtitle::where('id',$id)->update(['isacademic'=>$isacademic,'section_id'=>$section_id,'department_id'=>$department_id,'jobtitle_id'=>$jobtitle_id,'grade_id'=>$grade_id,'supervisor_id'=>$supervisor_id,'jobhierarchy_id'=>$hierarchy_id]);


               }else{

                return back()->withErrors(['error'=>'Department job already exists']);
              }

        }else{
          /*
           *  if $id <> 0 then do insert
           *  check if the departmentjob title exists
          */
              
          $departmentjobtitle = DepartmentJobtitle::where('isacademic',$isacademic)->where('section_id',$section_id)->where('department_id',$department_id)->where('jobtitle_id',$jobtitle_id)->where('grade_id',$grade_id)->first();


          if($departmentjobtitle==null){

            /*
                   generate short name,
                   method shortName is from an inherited class, BaseController
                */
                
           
            $departmentjobtitle = new DepartmentJobtitle;

           
            $departmentjobtitle->isacademic = $isacademic;
            $departmentjobtitle->section_id = $section_id;
            $departmentjobtitle->department_id = $department_id;
            $departmentjobtitle->jobtitle_id = $jobtitle_id;
            $departmentjobtitle->supervisor_id  = $supervisor_id;
            $departmentjobtitle->grade_id = $grade_id;
            $departmentjobtitle->jobhierarchy_id = $hierarchy_id;
            $departmentjobtitle->save();


          }else{

            return back()->withErrors(['error'=>'Department job already exists']);
          }
              

        }

        return redirect('departmentjobtitles')->with('success', 'Department Job saved successfully');
 }

}
