<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;

class SectionController extends BaseController
{
    //

    public function index(){

          $sections = Section::orderBy('sectionname', 'asc')->get();

          //dd($sections);

          return view('section.index',compact('sections'));
    }


  

   public function showUpsertView($id=null){
      
        /*
          if id=0 then we are inserting a new session
          otherwise  its a update of an old session
        */

          $section = null;

        if(isset($id)){
       
           $section  = Section::where('id',$id)->first();

        }

        return view('section.upsert',compact('section')); 
   }


   public function doUpsert(Request $request){
   
           /*
             if id>0 then this is an update
             otherwise its an insert
            */
           
            $request->validate([
               'sectionname' => 'required|unique:tblsection|max:255',
               'id' => 'required',       
               ]);

           $sectionname = $request->input('sectionname');
           $id = intval($request->input('id'));

        if($id>0){
                                                 
          Section::where('id',$id)->update(['sectionname'=>$sectionname]);

        }else{

        /*
          generate short name,
          method shortName is from an inherited class, BaseController
        */

         $short_name = $this->shortName($sectionname);
        
         if(trim($short_name)!=''){
            /*
             check if this exists
            */

           if(Section::where('sectioncode',$short_name)->exists()){
           
             $appendage = 1;
            
             $new_short_name = $short_name.'_'.$appendage;
             
             while(Section::where('sectioncode',$new_short_name)->exists()){

                $appendage = $appendage+1;

                 $new_short_name = $short_name.'_'.$appendage;
              }

              $short_name = $new_short_name;

          }

          $new_section = new Section;

          $new_section->sectioncode = $short_name;
          $new_section->sectionname = strtoupper(trim($sectionname));

          $new_section->save();
          
                     
       }else{

           /*
              throw error 
           */
          return back()->withErrors(['error'=>'Error creating short name']);

       }


      }
 
       return redirect('sections')->with('success', 'Section saved successfully');

       
                          
   }

   public function update(){

   }


   public function delete(){

   }


}
