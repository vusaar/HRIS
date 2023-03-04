@extends('layouts.app')

@section('content')

    
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <b>{{$vacancy->departmentjobtitle->jobtitle->jobtitlename}}  | SUBMITTED APPLICATIONS</b>  
                    
                    <span style='margin-left: auto;order: 2;'>
                        <a class='btn text-white bg-lime' href="{{url('/submissions/download_summarytable')}}/{{$vacancy->id}}"> DOWNLOAD</a>
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
               
                <div class ='col-md-12 col-sm-12 col-xs-12'>
                <span style='text-align:center'> <p>SUMMARY TABLE OF CANDIDATES FOR THE POST OF {{$vacancy->departmentjobtitle->jobtitle->jobtitlename}}</p></span>
                </div>
                <div class='col-md-12 col-sm-12 col-xs-12'>
                <span style='text-align:center'> <h4><b> GREAT ZIMBABWE UNIVERSITY </b></h4> </span>
                </div>

                <div class='col-md-12 col-sm-12 col-xs-12'>
                <span style='text-align:center'> <p><b> APPLICATIONS FOR THE POST OF {{$vacancy->departmentjobtitle->jobtitle->jobtitlename}}</b></p></span>
                </div>

                <div class='col-md-12 col-sm-12 col-xs-12'>
                <span style='text-align:center'> <p> <b>QUALIFICATIONS AND EXPERIENCE:</b></p></span>
                </div>

                <div class='col-md-12 col-sm-12 col-xs-12'>
                   {!!$vacancy->job_requirements !!}
                </div>

                <div class='' style='display:flex'>                                       

                   <table class="table">
    <thead class="thead-light">
      <tr>
        <th>NAME</th>
        <th>AGE/SEX </th>
        <th>QUALIFICATIONS</th>
        <th>EXPERIENCE</th>              
      </tr>
    </thead>
    <tbody>

    @foreach ($applications as $application)
    
       <tr>
        <td>{{$application->applicant->surname}} {{$application->applicant->forenames}} </td>
        <td>{{$application->applicant->gender}} | {{$application->applicant->dob}}</td>
        <td>
            @foreach ($application->applicant->qualifications as $qualification)
            <li>
             @if($qualification->qualificationtype->document=='ADVANCED LEVEL' || $qualification->qualificationtype->document=='ORDINARY LEVEL')            
             {{$qualification->courses->count()}} {{$qualification->qualificationtype->document}} SUBJECTS
             
             @else
              
              @if(($qualification->courses->count()>0))
                {{$qualification->courses[0]->course}}
              @else
                 (Programme not specified)
              @endif
             @endif    
            
             (<small><b>{{$qualification->qualificationtype->document}}</b></small>), {{$qualification->examination_board}}, {{$qualification->finishing_year}}, <b><i>
               
            @if($qualification->qualification_document) 
            
                   
              @if($qualification->qualification_document->certificate_verification)             
                ({{$qualification->qualification_document->certificate_verification->certificate_verified==true?"Certificate attached":"Certificate not attached"}})
               
              @else
               (Certificate not attached)
              @endif
             
            @else

               (Certificate not attached)

             @endif
            </i></b>
            </li>
           @endforeach
       </td>
        <td>
        @foreach ($application->applicant->experiences as $experience)
            <li>{{$experience->jobtitle}}, {{$experience->company_name}}, {{$experience->starting_year}} to {{$experience->finishing_year}}
            </li>
           @endforeach

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