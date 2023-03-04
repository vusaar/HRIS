@extends('layouts.app')

@section('content')

<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CREATE/EDIT VACANCY</h3>
                    
                    
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
                      
        <form method='POST' action={{url("/save_vacancy")}} style ='flex:1'>
            @csrf

          <div class="form-group">

          <input type="hidden" class="form-control"  id="id" name="id" value ="{{$vacancy?$vacancy->id:-1}}">

            <label for="vacancyname">Vacancy Name:</label>
            
             <select class="form-control" id='departmentjobtitleid' name='departmentjobtitleid' required>

             
               @foreach ($departmentjobtitles as  $departmentjobtitle)
               <option value='{{$departmentjobtitle->id}}'
                 @if($vacancy !=null)
                 @if($departmentjobtitle->id==$vacancy->departmentjobtitle_id)
                     selected
                 @endif
                 @endif                 
               >
               {{$departmentjobtitle->jobtitle->jobtitlename}} 
               @if($departmentjobtitle->department)
                 {{$departmentjobtitle->department->departmentname}}
                 @else
                   {{$departmentjobtitle->section->sectionname}}
                 @endif
                </option>
               @endforeach
                 
             </select>

          </div>

          <div class="form-group">

          <div style='display:flex; flex-direction:row'>
         

          <div style='flex:1;padding:1px'>
         <label for="enabled">Contract</label>
          <select class="form-control" name='contractid' id='contractid'>
              @foreach ($contracts as $contract)
                 <option value='{{$contract->id}}'
                     @if ($vacancy)

                        @if($vacancy->contract->id == $contract->id)
                           selected
                        @endif
                       
                     @endif
                 >
                   {{$contract->contract_name}}
                 </option>
              @endforeach
          </select>
         </div>
          

         <div style='flex:1;padding:1px'>
         <label for="enabled">Enabled:</label>
          <select class="form-control" name='enabled' id='enabled'>
             <option value='enabled'
                
             @if($vacancy)
                 @if($vacancy->enabled==1)
                     selected
                 @endif
                 @endif
             >ENABLED</option>
             <option value='disabled'
             @if($vacancy)
                 @if($vacancy->enabled==0)
                     selected
                 @endif
                 @endif
             >DISABLED</option>
          </select>
         </div>
         </div>

         </div>


         <div class=''>

         <div style='flex:1;padding:1px'>
          <label for="noofposts">No of Posts:</label>
         <input type="number" class="form-control" id="noofposts" name="noofposts"  value="{{$vacancy?$vacancy->no_of_posts:1}}" required />
          </div>
         </div>


         <div class="form-group">
          
           <div style ='display:flex; flex-direction:row'>
           <div style='flex:1;padding:1px'>
          <label for="applicationprocedure">Open from Date</label>
           <input type="date" class="form-control" id="openfrom" name="openfrom"  value="{{$vacancy?$vacancy->open_from:''}}" required />
           </div>
           <div style='flex:1; padding:1px'>
           <label for="applicationprocedure">Until Date</label>
           <input type="date" class="form-control" id="openuntil" name="openuntil"  value="{{$vacancy?$vacancy->open_until:''}}" required />
           </div>
           </div>
        </div>
           

          <div class="form-group">
          

            <label for="sectionname">Job Requirements:</label>
             <textarea  class="form-control" placeholder="Job requirements here..." id="jobrequirements" name="jobrequirements"  >
             {{$vacancy?$vacancy->job_requirements:''}}
             </textarea>
          </div>


          <div class="form-group">
          

            <label for="duties">Duties and Responsibilities:</label>
             <textarea class="form-control" placeholder="Duties and responsibilities here..." id="duties" name="duties"  >
             {{$vacancy?$vacancy->responsibilities:''}}
             </textarea>
          </div>

          

          <div class="form-group">
          

            <label for="applicationprocedure">Application Procedure:</label>
             <textarea  class="form-control" placeholder="Application procedure here..." id="applicationprocedure" name="applicationprocedure"  >
              
             {{$vacancy?$vacancy->application_requirements:''}} 
             </textarea>
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