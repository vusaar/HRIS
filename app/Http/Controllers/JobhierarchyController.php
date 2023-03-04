<?php

namespace App\Http\Controllers;

use App\Jobhierarchy;
use Illuminate\Http\Request;

class JobhierarchyController extends Controller
{

      public function index(){

          $joblevels = Jobhierarchy::orderBy('jobtitle_hierarchy','desc')->get();

          return view('joblevel.index',compact('joblevels'));
      }


      public function showUpsertView($id=null){

             $joblevel  = null;
             $joblevels = Jobhierarchy::orderBy('jobtitle_hierarchy','desc')->get();

            if($id!=null){
               /*
                  we are inserting a new record
               */
            
               $joblevel = Jobhierarchy::where('id',$id)->first();
            }


            return view('joblevel.upsert',compact('joblevel','joblevels'));
      }



      public function doUpsert(Request $request){
             
             //dd($request);

             $request->validate([
                'id'=>'required',
                'joblevel'=>'required',
                'parent'=>'required'
               ]);

            $level_id  = $request->input('id');
            $joblevel_name =  trim(strtoupper($request->input('joblevel')));
            $level_parent_id = $request->input('parent');

             /*
                level_id > 0 then we are editting
                otherwise we are inserting
             */
            if($level_id>0){
                // do update

                if(!Jobhierarchy::where('jobtitle_hierarchy',$joblevel_name)->where('id','<>',$level_id)->exists()){

                    Jobhierarchy::where('id',$level_id)->update(['jobtitle_hierarchy'=>$joblevel_name,'hierarchy_parent'=>$level_parent_id]);

                }else{
                     
                    return back()->withErrors(['error'=>'Hierarchy name already exists']);
                }
                   

            }else{
                /* do insert
                 check if it exists already be4 inserting
                 */                              

                if(Jobhierarchy::where('jobtitle_hierarchy',$joblevel_name)->exists()){
                    /*
                      return notificatio sayin a job  level with same already exists
                    */
                    return back()->withErrors(['error'=>'Hierarchy name already exists']);

                }else{
                  
                    $new_joblevel = new Jobhierarchy;

                    $new_joblevel->jobtitle_hierarchy = $joblevel_name;
                    $new_joblevel->hierarchy_parent = $level_parent_id;
                    
                    $new_joblevel->save();

                }
                                     
            }
           
            return redirect('levels')->with('success', 'Hierarchy saved successfully');

      }
}
