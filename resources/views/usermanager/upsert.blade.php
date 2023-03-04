@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>CREATE/EDIT USERS</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='#' class='btn text-white bg-lime' >NEW USER<i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                     </span> 
                </div>

    @if ($errors->any())
       <div class="alert alert-danger alert-dismissible" role="alert" style="margin:10px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

     <div class="card-body">
        @if (session('success'))
         <div class="alert alert-success" role="alert">
            {{ session('success') }}
         </div>
        @endif

     <div class='' style='display:flex'>
                      
        <form method='POST' action='{{url("/save_user")}}' style ='flex:1'>
            @csrf

            <div class="form-group">

            <input type="hidden" class="form-control"  id="id" name="id" value ="{{$user?$user->id:-1}}" />
             
              <label for="employee_id">Employee: <small>Name | EC Number | Email address</small></label>
              <select  class="form-control" placeholder="Employee..." id="employee_id" name="employee_id"  required>

                 @foreach($employees as $employee)
                   <option value='{{$employee->employeeid}}'>
                      {{$employee->surname}} {{$employee->fornames}}  | {{$employee->employeeid}} | {{$employee->emailaddress}}
                   </option>
                 @endforeach

              </select>

            </div>

            <div class="form-group">
             
              <label for="role_id">User Group:</label>
              <select type="text" class="form-control"  id="role_id" name="role_id"  required>

                 @foreach($roles as $role)
                   <option value='{{$role->id}}'>
                      {{$role->name}}
                   </option>
                 @endforeach

              </select>

            </div>

          <div class="form-group">
          
            <label for="user">Password :<small> 8 alphanumeric characters or more</small></label>
             <input type="password" class="form-control" placeholder="Password..." id="password" name="password" minlength="8" required>

             </div>

             <div class="form-group">
          
            <label for="user">Repeat Password : </label>
             <input type="password" class="form-control" placeholder="Repeat password..." id="repeat_password" name="repeat_password"  required>

             </div>
             

          <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger">Cancel</button>
      </div>

         </form>

                   </div>
                </div>
            </div>
        </div>
    
</div>

@endsection