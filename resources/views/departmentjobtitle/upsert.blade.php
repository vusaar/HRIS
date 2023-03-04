@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>DEPARTMENT JOBS</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='#'class='btn text-white bg-lime' data-toggle="modal" data-target="#new_section">New/Edit Department Job<i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
        @if (session('status'))
         <div class="alert alert-success" role="alert">
            {{ session('status') }}
         </div>
        @endif

     <div class='' style='display:flex'>
                      
        <form method='POST' action={{url("/save_departmentjobtitle")}} style ='flex:1'>
            @csrf

            <div class="form-group">

<input type="hidden" class="form-control"  id="id" name="id" value ="{{$departmentjobtitle?$departmentjobtitle->id:-1}}">

 
</div>

            <div class="form-group">
          
            <label for="departmentjob">Job Title:</label>
             
            <select class="form-control" id='jobtitle_id' name='jobtitle_id' style="width:100%">
                @foreach ($jobtitles as $jobtitle)
                    
                  <option value ="{{$jobtitle->id}}"
                       @if ($departmentjobtitle != null)
                           @if ($jobtitle->id==$departmentjobtitle->jobtitle->id)
                              selected 
                           @endif
                            
                       @endif
                  >
                    {{$jobtitle->jobtitlename}}
                </option>
                @endforeach
            </select>

          </div>
         

          <div class="form-group">

          
            <label for="section_id">Section:</label><br>
             
            <select class="form-control" id='section_id' name='section_id'>
                @foreach ($sections as $section)
                    
                  <option value='{{$section->id}}'
                       
                  @if ($departmentjobtitle != null && $departmentjobtitle->section != null)
                           @if ($section->id==$departmentjobtitle->section->id)
                              selected 
                           @endif
                            
                       @endif
                  
                  >{{$section->sectionname}}</option>
                @endforeach
            </select>

          </div>

          <div class="form-group">

          
            <label for="department_id">Department:</label><br>
             
            <select class="form-control" id='department_id' name='department_id'>
              
            <option value='-1' label=" "></option>
                @foreach ($departments as $department)
                    
                  <option value='{{$department->id}}'
                       
                  @if ($departmentjobtitle != null && $departmentjobtitle->department != null)
                           @if ($department->id==$departmentjobtitle->department->id)
                              selected 
                           @endif
                            
                       @endif
                  
                  >{{$department->departmentname}}</option>
                @endforeach
               
            </select>

          </div>

          <div class='form-group'>

             <label for="hierarchy_id">
                Management group
             </label><br>

              <select  class="form-control" id='hierarchy_id' name='hierarchy_id'>
                
                  @foreach ($hierarchies as $hierarchy)
                    <option value='{{$hierarchy->id}}'
                    
                    @if ($departmentjobtitle != null)
                           @if ($hierarchy->id==$departmentjobtitle->hierarchylevel->id)
                              selected 
                           @endif
                            
                       @endif
                       
                    
                    >
                        {{$hierarchy->jobtitle_hierarchy}}
                    </option>
                      
                  @endforeach
              </select>
           

          </div>

          <div class="form-group">

          
            <label for="departmentjob">Academic / Non Academic</label>
             <br>
            <select class="form-control" id='isacademic' name ='isacademic'>
                                   
                  <option value='ACADEMIC'
                    
                  @if ($departmentjobtitle != null)
                           @if ($departmentjobtitle->isacademic=='ACADEMIC')
                              selected 
                           @endif
                            
                       @endif
                  
                  >ACADEMIC</option>
                  <option value='NON ACADEMIC'
                     
                  @if ($departmentjobtitle != null)
                           @if ($departmentjobtitle->isacademic=='NON ACADEMIC')
                              selected 
                           @endif
                            
                       @endif
                    
                  >NON ACADEMIC</option>
                
            </select>

          </div>

          <div class="form-group">

          
            <label for="grade_id">Grade</label>
             <br>
            <select class="form-control" id='grade_id' name='grade_id'>
                                   
                 @foreach ($grades as $grade )
                     <option value='{{$grade->id}}'
                     
                     @if ($departmentjobtitle != null)
                           @if ($grade->id==$departmentjobtitle->grade->id)
                              selected 
                           @endif
                            
                       @endif
                     >
                         {{$grade->grade}} 
                     </option>
                 @endforeach
                                  
            </select>

          </div>

          <div class="form-group">

          
            <label for="supervisor_id">Reports To</label>
             <br>
            <select class="form-control" id='supervisor_id' name='supervisor_id'>
            <option value='-1'>SELF</option>
                @foreach ($departmentjobtitles as $departmentsupervisortitle)                    
                  <option value='{{$departmentsupervisortitle->id}}'
                  
                  @if ($departmentjobtitle != null && $departmentjobtitle->supervisor != null)
                           @if ($departmentsupervisortitle->id==$departmentjobtitle->supervisor->id)
                              selected 
                           @endif
                            
                       @endif                  
                  >{{$departmentsupervisortitle->jobtitle->jobtitlename}} | 
                  @if($departmentsupervisortitle->department != null)
                  {{$departmentsupervisortitle->department->departmentname}}
                  @else
                  {{$departmentsupervisortitle->section->sectionname}}
                  @endif
                
                </option>
                @endforeach
            </select>

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




<!-- The Modal -->
<div class="modal" id="edit_section">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Section</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         
      </div>

      <!-- Modal footer -->
      
      

    </div>
  </div>
</div>

@endsection