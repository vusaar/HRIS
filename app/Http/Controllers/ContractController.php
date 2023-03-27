<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Contract;

class ContractController extends Controller
{
    //
    public function index(Request $request){

          

      // if($request->has('query'))
      //   echo "query not null";
       
      //   die();
      //dd($request);
      $query = $request->input('query')!==null?trim($request->input('query')):"";


      $contract_result = Contract::orderBy('contract_name');

     

      if($query!=""){

        $contract_result  =  $contract_result->where('contract_name','like','%'.$query.'%')->orWhere('contract_type','like','%'.$query.'%');

      }

        $contracts  =  $contract_result->get();

        
         /*
            return as json
         */
        if($request->has('query')){

          return response()->json([
            'data' => json_encode($contracts)
        ], 201);
        }

        /*
           return as view
        */
        
        return view('contract.index', compact('contracts'))->withData(json_encode($contracts));
    }

    function showUpsertView($id=null){
          
             /*
          if id=0 then we are inserting a new session
          otherwise  its a update of an old session
        */

          $contract = null;

          if(isset($id)){
         
             $contract  = Contract::where('id',$id)->first();
            }
            

          return view('contract.upsert',compact('contract')); 
    }



    public function doUpsert(Request $request){

        $request->validate([
            'contractname' => 'required|max:255',  
            'contracttype'=>'required',        
            'id' => 'required',       
            ]);

         $contractname = trim(strtoupper($request->input('contractname')));
         $contracttype = $request->input('contracttype');
         $id =  $request->input('id');


         /*
            if id > 0 , then its an edit, otherwise its an insert
         */  
         if($id>0){

            $contract  = Contract::where('id',$id)->first();

              if($contract){

                $contract = Contract::where('contract_name',$contractname)->where('id','<>',$id)->first();

                if($contract==null){
                    Contract::where('id',$id)->update(['contract_name'=>$contractname,'contract_type'=>$contracttype]);
                }else{

                    return back()->withErrors(['error'=>'An Employment Contract with the name <b>'.$contractname.'</b> already exists']);
                }

              }else{
                return back()->withErrors(['error'=>'Employment Contract does not exist']);
              }

         }else{

             /*
              
               - a contract name shld be unique
             */

             $contract = Contract::where('contract_name',$contractname)->get();

             
             if(count($contract)==0){

                               
                $contract = new Contract();

                $contract->contract_name = $contractname;

                $contract->contract_type = $contracttype;

                $contract->save();

             }else{
                 /*
                  error
                  contract by the same name already exists
                 */

                return back()->withErrors(['error'=>'An Employment Contract with the same name already exists']);
             }

         }

         return redirect('contracts')->with('success', 'Employment Contract saved successfully');

    }
}
