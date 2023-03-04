@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <b>{{$vacancy->departmentjobtitle->jobtitle->jobtitlename}}  | SUBMITTED APPLICATIONS</b>   
                    
                    
                    <span style='margin-left: auto;order: 2;'>
                        <a class='btn text-white bg-lime' href="{{url('submissions/summarytable')}}/{{$vacancy->id}}"> SUMMARY TABLE </a>
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

            @if (Session::has('success'))
                   
                    <div class="alert alert-success alert-dismissible" role="alert"  style="margin:10px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <ul>
                    <li>{{ Session::get('success') }}</li>
                       
                        </ul>
                   </div>
                @endif
       


                <div class="card-body">
               

                   <div class='' style='display:flex'>                                       

                   <table class="table">
    <thead class="thead-light">
      <tr>
        <th>Applicant</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Job Applied For</th> 
        <th>Department</th> 
        <th>Vacancy Creation Date</th> 
                    
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

   
    @foreach ($applications as $application)
    
       <tr>
        <td>{{$application->applicant->surname}} {{$application->applicant->forenames}} </td>
        <td>{{$application->applicant->gender}}</td>
        <td>{{$application->applicant->dob}}</td>
        <td>{{$application->vacancy->departmentjobtitle->jobtitle->jobtitlename}}</td> 
        <td>{{$application->vacancy->departmentjobtitle->department->departmentname}}</td>
           
        <td>{{$application->vacancy->created_at}}</td>
        <td>
         <a href="{{url('application/')}}/{{$application->id}}" class='action_edit_link'><i class="fa fa-eye" aria-hidden="true"></i></a>         
       </td>
       </tr>
    @endforeach
    
     
    </tbody>
  </table>

                   </div>
                </div>
            </div>
        </div>
    
</div>


@endsection