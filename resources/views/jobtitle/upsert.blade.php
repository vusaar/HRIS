@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>CREATE/EDIT JOB TITLES</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='#' class='btn text-white bg-lime' data-toggle="modal" data-target="#new_jobtitle">New Job Title <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
                      
        <form method='POST' action={{url("/save_jobtitle")}} style ='flex:1'>
            @csrf

          <div class="form-group">

          <input type="hidden" class="form-control"  id="id" name="id" value ="{{$jobtitle?$jobtitle->id:-1}}" />

            <label for="jobtitlename">Job Title:</label>
             <input type="text" class="form-control" placeholder="Job Title" id="jobtitlename" name="jobtitlename"  value="{{$jobtitle?$jobtitle->jobtitlename:''}}" required>

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