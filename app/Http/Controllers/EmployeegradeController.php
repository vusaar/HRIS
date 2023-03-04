<?php

namespace App\Http\Controllers;

use App\Employeegrade;
use Illuminate\Http\Request;

class EmployeegradeController extends Controller
{
    //

      public function index(){

             $grades = Employeegrade::orderBy('grade')->get();

            return view('grade.index', compact('grades'));
      }


      public function showUpsertView($id=null){

        $grade  = null;
       

       if($id!=null){
          /*
             we are inserting a new record
          */
       
          $grade = Employeegrade::where('id',$id)->first();
       }


       return view('grade.upsert',compact('grade'));
 }



 public function doUpsert(Request $request){
        
        //dd($request);

        $request->validate([
           'id'=>'required',
            'grade'=>'required'
          ]);

       $id  = $request->input('id');
       $grade =  trim(strtoupper(str_replace(' ','',$request->input('grade'))));
       
        /*
           level_id > 0 then we are editting
           otherwise we are inserting
        */
       if($id>0){
           // do update

           if(!Employeegrade::where('grade',$grade)->where('id','<>',$id)->exists()){

            Employeegrade::where('id',$id)->update(['grade'=>$grade]);

           }else{
                
               return back()->withErrors(['error'=>'Grade already exists']);
           }
              

       }else{
           /* do insert
            check if it exists already be4 inserting
            */                              

           if(Employeegrade::where('grade',$grade)->exists()){
               /*
                 return notificatio sayin a job  level with same already exists
               */
               return back()->withErrors(['error'=>'Grade already exists']);

           }else{
             
               $new_Employeegrade = new Employeegrade;

               $new_Employeegrade->grade= $grade;
              
               
               $new_Employeegrade->save();

           }
                                
       }
      
       return redirect('grades')->with('success', 'Grade saved successfully');

 }
}
