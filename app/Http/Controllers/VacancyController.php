<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vacancy;

use App\DepartmentJobtitle;

use App\Contract;

class VacancyController extends BaseController
{
    //

    public function index(Request $request){

         $vacancies = Vacancy::orderBy('open_until','desc')->get();

         //dd($vacancies);

        return view('vacancy.index', compact('vacancies'));
    }


    public function showUpsertView($id=null){
      
        /*
           if id=0 then we are inserting a new session
           otherwise  its a update of an old session
        */

          $vacancy = null;

        if(isset($id)){
       
           $vacancy = Vacancy::where('id',$id)->first();

        }

       $departmentjobtitles = DepartmentJobtitle::get();
       $contracts  = Contract::orderBy('contract_name')->get();

        return view('vacancy.upsert',compact('vacancy','departmentjobtitles','contracts')); 
     }


     public function doUpsert(Request $request){

          
        $request->validate([
             'id'=>'required',
            'departmentjobtitleid' => 'required',
            'contractid' => 'required',
            'noofposts' => 'required',
            'enabled' => 'required', 
            'openfrom' => 'required',
            'openuntil' => 'required',
            'jobrequirements' => 'required',
            'duties' => 'required',
             'applicationprocedure' => 'required'      
            ]);

         $id = $request->input('id');   
        $departmentjobtitleid = $request->input('departmentjobtitleid');
        $contractid = $request->input('contractid');
        $noofposts = $request->input('noofposts');
        $enabled = $request->input('enabled')=='enabled'?'true':'false';
        $openfrom  = $request->input('openfrom');
        $openuntil = $request->input('openuntil');
        $jobrequirements = $request->input('jobrequirements');
        $duties = $request->input('duties');
        $procedure = $request->input('applicationprocedure');
       
         


          /* 
            if id>0 then we are editting a record
          */
        if($id>0){
           /*
             check if a similar vacancy (same attributes by different id) exists
           */

           $similar_vacancy = Vacancy::where('departmentjobtitle_id',$departmentjobtitleid)->where('contract_id',$contractid)->where('open_from',$openfrom)->where('open_until',$openuntil)->where('id', '<>', $id)->first();

           if($similar_vacancy==null){
            /*
              if theres no similar vacancy do update
            */

            $vacancy = Vacancy::where('id',$id)->first();

            Vacancy::where('id',$id)->update(['departmentjobtitle_id'=>$departmentjobtitleid,'open_from'=>$openfrom,'open_until'=>$openuntil,'no_of_posts'=>$noofposts,'job_requirements'=>$jobrequirements,'contract_id'=>$contractid,
            'responsibilities'=>$duties,'application_requirements'=>$procedure,'enabled'=>$enabled]);

           }else{
              /*
                if similar vacancy is not null, then error, you can have two vacancies that are exactly the same
              */

              return back()->withErrors(['error'=>'A similar post already exists']);
           }

        }else{
           /*
              -if id <1 then inserting a new record
              -check if vacancy with the same  name, openfrom, openuntil already exists               
           */

            $vacancy = Vacancy::where('departmentjobtitle_id',$departmentjobtitleid)->where('open_from',$openfrom)->where('open_until',$openuntil)->first();

            if($vacancy==null){
                  
                  $vacancy  =  new Vacancy;
                   
                  $departmentjobtitle = DepartmentJobtitle::where('id',$departmentjobtitleid)->first();

                  if($departmentjobtitle!=null){

                  $vacancyname = $departmentjobtitle->jobtitle->jobtitlename.' '.
                  $departmentjobtitle->department->departmentname;

                    $vacancycode = $this->uniqueCode($vacancyname,'App\Vacancy','vacancy_code');

                    $vacancy->vacancy_code = $vacancycode;
                    $vacancy->departmentjobtitle_id = $departmentjobtitleid;
                    $vacancy->contract_id =  $contractid;
                    $vacancy->no_of_posts = $noofposts;
                    $vacancy->job_requirements = $jobrequirements;
                    $vacancy->responsibilities = $duties;
                    $vacancy->application_requirements = $jobrequirements;
                    $vacancy->application_requirements = $procedure;
                    $vacancy->open_from = $openfrom;
                    $vacancy->open_until = $openuntil;
                    $vacancy->enabled = $enabled;

                    $vacancy->save();


                  }else{

                    return back()->withErrors(['error'=>'The post doesnt exist']);  
                  }
                  


            }else{
               //vacancy already exists return error
                 
               return back()->withErrors(['error'=>'A Vacancy with the same name,contract type, open and closing date already exists']);  

            }
            

        }
         
        return redirect('vacancies')->with('success', 'Vacancy saved successfully');

     }


}
