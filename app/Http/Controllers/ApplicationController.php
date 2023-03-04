<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;
use App\CertificateVerification;
use App\Qualification;
use App\QualificationType;
use App\Vacancy;
use Exception;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //


    public function index(Request $request){

           $applications = Application::select('vacancy_id')->groupBy('vacancy_id')->get();

           //dd($applications[0]->vacancy->departmentjobtitle->jobtitle);
          
           return view('application.index',compact('applications'));
    }



    public function submissions(Request $request,$id){
      
         $vacancy= Vacancy::where('id',$id)->first();  
         
         $applications = Application::where('vacancy_id',$id)->orderBy('id')->get();

         return view('application.vacancy',compact('applications','vacancy'));
    }


    public function summaryTable(Request $request, $id){

      $vacancy= Vacancy::where('id',$id)->first();  
         
      $applications = Application::where('vacancy_id',$id)->orderBy('id')->get();

      return view('application.summarytable',compact('applications','vacancy'));
    }


    public function downloadSummaryTable(Request $request, $id){

      $vacancy= Vacancy::where('id',$id)->first();  
         
      $applications = Application::where('vacancy_id',$id)->orderBy('id')->get();

      $summarytable_doc = new \PhpOffice\PhpWord\PhpWord();

      $sectionStyle = array(
        'orientation' => 'landscape',
        'marginTop' => 600,
       );

      $heading_section = $summarytable_doc->addSection($sectionStyle);

      $heading_section->addText("SUMMARY TABLE OF CANDIDATES FOR THE POST OF ".$vacancy->departmentjobtitle->jobtitle->jobtitlename,array('bold' => true, "size"=>8), array('align' => 'center'));

      $heading_section->addTextBreak();

      $heading_section->addText("GREAT ZIMBABWE UNIVERSITY",array('bold' => true, "size"=>18), array('align' => 'center'));
      $heading_section->addTextBreak();

      $heading_section->addText("APPLICATIONS FOR THE POST OF ".$vacancy->departmentjobtitle->jobtitle->jobtitlename,array('bold' => true, "size"=>12), array('align' => 'center'));
      
      $heading_section->addTextBreak();

      //dd(strip_tags(html_entity_decode($vacancy->job_requirements, ENT_QUOTES, "UTF-8")));

      //dd(strip_tags($vacancy->job_requirements));

      $heading_section->addText(strip_tags(html_entity_decode($vacancy->job_requirements, ENT_QUOTES, "UTF-8")));


      $tableStyle = array(
        'borderColor' => '696969',
        'borderSize'  => 6,
        'cellMargin'  => 50
    );

      $table = $heading_section->addTable($tableStyle);
      $table->addRow();
      $table->addCell()->addText("NAME");
      $table->addCell()->addText("AGE | SEX");
      $table->addCell()->addText("QUALIFICATIONS");
      $table->addCell()->addText("EXPERIENCE");
      $table->addCell()->addText("COMMENTS");

      foreach($applications as $key=>$application){
        
        $table->addRow();

        $table->addCell()->addText(($key+1).". ".$application->applicant->surname." ".$application->applicant->forenames);


        $age = date_diff(date_create($application->applicant->dob), date_create(date("Y-m-d")));

        $table->addCell()->addText($age->format('%y')." yrs | ".$application->applicant->gender);

        $qualification_text = "";

        $qualification_cell = $table->addCell();

         foreach($application->applicant->qualifications as $qualification){

             //echo $qualification->qualificationtype;

             if($qualification->qualificationtype->document=='ADVANCED LEVEL' || $qualification->qualificationtype->document=='ORDINARY LEVEL'){
             
                $qualification_text = $qualification->courses->count()." ".$qualification->qualificationtype->document." SUBJECTS ";
                

             }else{

               //echo $qualification->courses[0]->course."<p>";

               if($qualification->courses->count()>0){
                 $qualification_text =  $qualification->courses[0]->course;
               }else{
                $qualification_text = "(Programme not specified)";
                }
                
             
            }
                        
             $qualification_text = $qualification_text." (".$qualification->qualificationtype->document."), ".$qualification->examination_board.", ".$qualification->finishing_year;

            // echo $qualification_text;

             if($qualification->qualification_document){
                
  
              if($qualification->qualification_document->certificate_verification){

           
                if($qualification->qualification_document->certificate_verification->certificate_verified){

                  $qualification_text = $qualification_text." (Certificate attached)";
                  
                }else{
 
                  $qualification_text = $qualification_text." (Certificate not attached)";
                }

               }else{

                 $qualification_text = $qualification_text." (Certificate not attached) ";
               }

             

             }else{

              $qualification_text = $qualification_text." (Certificate not attached) ";
             }
           
            // echo $qualification_text."<p>";
            
             $qualification_cell->addText($qualification_text);
         }

         //echo $qualification_text;

         //$table->addCell()->addText($qualification_text);


         $experience_cell = $table->addCell();
         $experience_text = "";

         foreach ($application->applicant->experiences as $experience){
          
          $experience_text = $experience->jobtitle." ".$experience->company_name." ".$experience->starting_year." to ".$experience->finishing_year;
             
          $experience_cell->addText($experience_text);
         }

         //$table->addCell()->addText($experience_text);

         /*
        add blank comments cell
      */
      $table->addCell()->addText("");
      }

      //dd($application->applicant->qualifications);
      

      $filename = 'summary.doc';

      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($summarytable_doc);

      $objWriter->save(storage_path($filename));
     
      return response()->download(storage_path($filename));

    }

    public function showUpsertView(Request $request, $id){

            $application  = Application::where('id',$id)->with(['applicant.documents'=>function($q){$q->orderBy('tblapplicant_documents.documenttype_id','asc');}])->first();

             //dd($application);
              
              if($application){

                $qualification_groups = Qualification::select('qualificationtype_id')->where('applicant_id',$application->applicant->id)->groupBy('qualificationtype_id')->get();

                $qualifications = Qualification::where('applicant_id',$application->applicant->id)->get();

                 
                $academic_qualification_types = QualificationType::where('category','ACADEMIC')->orderBy('id','desc')->get(); 
                
                return view('application.detail',compact('application','qualification_groups','academic_qualification_types','qualifications'));

              }else{
   
                    return back()->withErrors(['error'=>'Application not found']);

              }

    }



    public function ajax_get_certificate_verification($id){

       $certificate_verification = CertificateVerification::where('applicant_document_id',$id)->first();
       return response()->json($certificate_verification)->header('Content-Type','application/json');
    } 


    public function ajax_verify_certificate(Request $request /*,$id,$applicant_document_id,bool $verified,$comment*/){

             $document_id = $request->input('document_id');
             $comment = $request->input('comment');
             $verified  = $request->input('verified');
  
           
           try{
           
            $certificate_verification = CertificateVerification::where('applicant_document_id',$document_id)->first();

             if($certificate_verification==null){
               
                // create the model object, 
                //  and assign it an applicant document id
                               
                $certificate_verification = new CertificateVerification();

                $certificate_verification->applicant_document_id = $document_id;

             }

             $certificate_verification->certificate_verified = $verified;
             $certificate_verification->comment = $comment;
             $certificate_verification->userid = Auth::user()->employeeid;

             $certificate_verification->save();

             return response()->json($certificate_verification);

         }catch(\Exception $e){
               return response()->json($e);
         }
        
    }


    
}
