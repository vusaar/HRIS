@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>SUBMITTED APPLICATIONS</h3>                    
                    
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
                                        
      @foreach ($applications as $application)
    
      
           <div class="card" style='width:30%;margin:5px'>
           <div class="card-status-start bg-green"></div>
          <div class="card-header">
            <div class='row'>
          <div class='col-md-12 col-sm-12 col-xs-12'>
          <a class='btn text-white bg-lime' href="{{url('submissions/')}}/{{$application->vacancy_id}}">
          <b>{{$application->vacancy->departmentjobtitle->jobtitle->jobtitlename}}</b>
          </a>
          </div>
           <div class='col-md-12 col-sm-12 col-xs-12'>
           <span style='font-size:11px;font-weight:bold'>
           
           
             @if ($application->vacancy->departmentjobtitle->department)
               {{$application->vacancy->departmentjobtitle->department->departmentname}}
             @elseif($application->vacancy->departmentjobtitle->section !=null)
               {{$application->vacancy->departmentjobtitle->section->sectionname}}
              
             @endif
            </span>
           </div>
            </div>
          </div>
          <div class='card-body'>
              <div class='row'>
               <div class='col-md-6 col-sm-6 col-xs-6'>
                 Submissions
                 </div>
                 <div class='col-md-6 col-sm-6 col-xs-6 '>
                 <h8>{{$application->vacancy->applications->count()}}</h8>
                 </div>
                 
                 <div class='col-md-6 col-sm-6 col-xs-6'>                 
                 Expiry date
                 </div>
                 <div class='col-md-6 col-sm-6 col-xs-6'>
                 {{$application->vacancy->open_until}}
                 </div>

                 <div class='col-md-6 col-sm-6 col-xs-6'>
                 Enabled
                 </div>
                 <div class='col-md-6 col-sm-6 col-xs-6'>
                 {{$application->vacancy->enabled==1?'Yes':'No'}}
                 </div>
              </div>
          </div>
          <div class='card-footer'>
              <a class='btn btn-outline-secondary' href="{{url('submissions/summarytable')}}/{{$application->vacancy->id}}"><small>VIEW SUMMARY TABLE </small></a>
          </div>
          
           </div>       
       
    @endforeach
    
            </div>
          </div>
        </div>
      </div>
    
</div>


@endsection