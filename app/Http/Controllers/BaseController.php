<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Section;


class BaseController extends Controller
{
    //

    public function uniqueCode($long_name,$model,$column){
        
              $short_name = $this->shortName($long_name);
            
              if($model::where($column,$short_name)->exists()){
           
                $appendage = 1;
               
                $new_short_name = $short_name.'_'.$appendage;
                
                while($model::where($column,$new_short_name)->exists()){
   
                   $appendage = $appendage+1;
   
                    $new_short_name = $short_name.'_'.$appendage;
                 }
   
                 $short_name = $new_short_name;
   
             }
              
           return $short_name;
    } 

    public function shortName($long_name){

           $long_name = strtoupper(trim($long_name));
           
           $word_count = substr_count($long_name, ' ');


           $short_name = '';
           
           /*
             if string has more than one word take first letters of each word
           */           

           if($word_count>0){

             $words = explode(' ',$long_name);             

             foreach($words as $word){
                 if(trim($word)!=''){

                    $first_letter = substr($word,0,1);

                    if(trim($first_letter)!=''){
                        $short_name = $short_name.$first_letter;
                    }
                    
                    
                 }
                }
             }else{
                
           /*
              if string has one word take first three letters of the string
           */
                  $short_name = substr($long_name,0,3);
             }
         
 




             return $short_name;
    }
}
