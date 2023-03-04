<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagerController extends Controller
{
    //

    public function index(){

        $users  = User::all();

       
        return view('usermanager.index',compact('users'));
    }


    public function showUpsertView($id= -1){

         $user = User::where('id',$id)->first();

         $employees = Employee::orderBy('surname')->orderBy('forenames')->get();
         
         $roles = Role::orderBy('name')->get();
         

        return view('usermanager.upsert',compact('user','roles','employees'));

    }

    public function doUpsert(Request $request){

          
           $request->validate([
            'id'=>'required',
           'employee_id' => 'required',
           'role_id' => 'required',
           'password' => 'required',
           'repeat_password' => 'required'              
           ]);


           $id = $request->input('id');
           $employee_id = trim($request->input('employee_id'));
           $role_id = $request->input('role_id');
           $password = trim($request->input('password'));
           $repeat_password = trim($request->input('repeat_password'));

           /*
              check if password are the same
           */
           
           if($password!==$repeat_password){

            return back()->withErrors(['error'=>'Password and Repeat Password are not the same']);
           }



           /*
            check if employee exists and has a gzu email address
           */
           $employee = Employee::where('employeeid',$employee_id)->where('emailaddress','ilike','%@gzu%')->first();

            if($employee==null){

                return back()->withErrors(['error'=>'Employee does not  have a GZU email address']);
            }

          /*
           *
           *  if id = -1 then its a new account 
           *  else
           *  you're doing edit
           *
           */

          $user = User::where('employeeid',$employee_id)->first();

           if($id<0){

                if($user==null){

                    $user = new User();

                    $user_role = Role::where('id',$role_id)->first();
                    $user->employeeid = $employee_id;
                    $user->email = $employee->emailaddress;
                    $user->password = Hash::make($password);

                    $user->save();

                    $user->assignRole($user_role);

                }else{

                    return back()->withErrors(['error'=>'Can not create new account. Employee already has an account']);

                }

           }else{

                if($user==null){

                    return back()->withErrors(['error'=>'Can not edit. Employee does not have an account']);

                }else{

                    $user_role = Role::where('id',$role_id)->first();
                    $user->employeeid = $employee_id;
                    $user->email = $employee->emailaddress;
                    $user->password = Hash::make($password);

                    $user->save();

                    $user->assignRole($user_role);

                }
           }

           return redirect('user/'.$user->id)->with('success', 'User details saved successfully');

    }
}
