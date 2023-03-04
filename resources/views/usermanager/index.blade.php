@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>SYTSTEM USERS </h3>


                <span style='margin-left: auto;order: 2;'>
                        <a href='{{url("/user")}}' class='btn text-white bg-lime'>New User <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                     </span> 
                </div>

                <div class="card-body">
                      <table class="table">
                      <thead class="thead-light">
                         <tr>
                            <th>EC Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>User Group</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                     @foreach ($users as  $user)

                         <tr>
                            <td>
                                {{$user->employee->employeeid}}
                            </td>
                            <td>
                                {{$user->employee->surname}} {{$user->employee->middenames}} {{$user->employee->forenames}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                @foreach ($user->roles as $role)
                                  {{$role->name}} 
                                @endforeach
                               
                            </td>
                           
                            <td>
                            <a href="{{url('user/')}}/{{$user->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
         <a href='#' class='text-red bg-white'><i class="fa fa-trash" aria-hidden="true"></i>
        </a>
                            </td>
                         </tr>
                         
                     @endforeach
                      </table>
                </div>
            </div>
        </div>
    
</div>
@endsection