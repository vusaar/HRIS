@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>DEPARTMENT JOB TITLE</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='{{url("/departmentjobtitle")}}' class='btn text-white bg-lime'>New Department Job<i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
        <th>Job Title</th>
        <th>Department | Section </th> 
        <th>Level Group</th>
        <th>Academic/ Non Academic</th>  
        <th>Grade</th>
        <th>Reports To</th>       
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

   
    @foreach ($departmentjobtitles as $departmentjobtitle) 
       <tr>        
        <td>{{$departmentjobtitle->jobtitle->jobtitlename}}</td>
        <td>
            

           
           @if($departmentjobtitle->department!=null)
           {{$departmentjobtitle->department->departmentname}}          
           @endif
           |
           @if($departmentjobtitle->section!=null)
           {{$departmentjobtitle->section->sectionname}} 
           @else   
           {{$departmentjobtitle->department->section->sectionname}}      
           @endif
           
          </td>
        <td>{{$departmentjobtitle->hierarchylevel->jobtitle_hierarchy}}</td>
        <td>{{$departmentjobtitle->isacademic}}</td>
        <td>{{$departmentjobtitle->grade->grade}}</td>
        <td>{{$departmentjobtitle->supervisor?$departmentjobtitle->supervisor->jobtitle->jobtitlename:'SELF'}}
        
        @if($departmentjobtitle->supervisor)
         @if($departmentjobtitle->supervisor->department!=null)          
           ({{$departmentjobtitle->supervisor->department->departmentname}}) 
          @else   
          ({{$departmentjobtitle->supervisor->section->sectionname}})
          @endif
        @endif  
        </td>
        <td>
          <a href="{{url('departmentjobtitle/')}}/{{$departmentjobtitle->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" style="font-size:14px" ></i></a> | <a href='#' class='text-red bg-white'><i class="fa fa-trash"  style="font-size:14px" aria-hidden="true"></i>
        </a>
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