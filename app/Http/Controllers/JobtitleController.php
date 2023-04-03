<?php

namespace App\Http\Controllers;

use App\Jobhierarchy;
use Illuminate\Http\Request;
use App\Jobtitle;

class JobtitleController extends BaseController
{
    //

     public function index(Request $request){

      $query = $request->input('query')!==null?trim($request->input('query')):"";


      $jobtitle_results = Jobtitle::orderBy('jobtitlename','asc');

      if($query!=""){

        $jobtitle_results  =  $jobtitle_results->where('jobtitlename','like','%'.$query.'%');

      }
        
      $jobtitles = $jobtitle_results->get();

       /*
            return as json
         */
        if($request->has('query')){

          return response()->json([
            'data' => json_encode($jobtitles)
        ], 201);
        }

          return view('jobtitle.index',compact('jobtitles'))->withData(json_encode($jobtitles));
          
     }

    
     public function showUpsertView($id=null){
      
        /*
          if id=0 then we are inserting a new session
          otherwise  its a update of an old session
        */

          $jobtitle = null;
         
        if(isset($id)){
       
           $jobtitle  = Jobtitle::where('id',$id)->first();

        }

        return view('jobtitle.upsert',compact('jobtitle')); 
   }



   public function doUpsert(Request $request){
   
    /*
      if id>0 then this is an update
      otherwise its an insert
     */
    
     $request->validate([
        'jobtitlename' => 'required|max:255',
        'id' => 'required',             
        ]);

      //dd($request);

    $jobtitlename = trim(strtoupper($request->input('jobtitlename')));
    $id = intval($request->input('id'));
  
    
     
    if($id>0){
    
     /*
      check if the same job title already with a different id, in the db
      if already there dont update
    */
   
      $jobtitle = Jobtitle::where('jobtitlename',$jobtitlename)->where('id','<>',$id)->first();

    if($jobtitle){

        return back()->withErrors(['error'=>'The job title already exists']);

    }else{

        Jobtitle::where('id',$id)->update(['jobtitlename'=>$jobtitlename]);
    }
   
 }else{

 /*
   generate short name,
   method shortName is from an inherited class, BaseController
 */

  $short_name = $this->shortName($jobtitlename);
 
  if(trim($short_name)!=''){
     /*
      check if this exists
     */

    if(jobtitle::where('jobtitlecode',$short_name)->exists()){
    
      $appendage = 1;
     
      $new_short_name = $short_name.'_'.$appendage;
      
      while(jobtitle::where('jobtitlecode',$new_short_name)->exists()){

         $appendage = $appendage+1;

          $new_short_name = $short_name.'_'.$appendage;
       }

       $short_name = $new_short_name;

   }


   if(!Jobtitle::where('jobtitlename',$jobtitlename)->exists()){
    $new_jobtitle = new Jobtitle;

    $new_jobtitle->jobtitlecode = $short_name;
    $new_jobtitle->jobtitlename = strtoupper(trim($jobtitlename));  
 
    $new_jobtitle->save();
   }else{

    return back()->withErrors(['error'=>'Job title already exists']);
   }
   
   
              
}else{

    /*
       throw error 
    */
   return back()->withErrors(['error'=>'Error creating short name']);

}


}

return redirect('jobtitles')->with('success', 'jobtitle saved successfully');
                   
}
}
