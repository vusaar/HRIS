@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <b>Job Hierarchy</b>
                    
                    <span class='page_menu' >
                        <a href='#' class='page_menu_link' >New Job Hierarchy <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
                      
        <form method='POST' action={{url("/save_level")}} style ='flex:1'>
            @csrf

          <div class="form-group">

          <input type="hidden" class="form-control"  id="id" name="id" value ="{{$joblevel?$joblevel->id:-1}}" />

            <label for="jobtitlename">Job Title:</label>
             <input type="text" class="form-control" placeholder="Job Hierarchy" id="joblevel" name="joblevel"  value="{{$joblevel?$joblevel->jobtitle_hierarchy:''}}" required>

             </div>
             <div class="form-group">
             <label for="isfulltime">Direct Parent:</label>
             <select class="form-control" id="parent" name="parent" style='width:100%'>
                 <option value =-1>SELF</option>
                @foreach ($joblevels as $l)
                    <option 
                     
                        @if ($joblevel!=null)
                          
                           @if($joblevel->hierarchy_parent==$l->id)
                             selected
                           @endif
                            
                        @endif
                       
                    value='{{$l->id}}'>{{$l->jobtitle_hierarchy}}</option>
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

@endsection