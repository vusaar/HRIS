@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>CREATE/EDIT SECTIONS</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='#' class='btn text-white bg-lime' data-toggle="modal" data-target="#new_section">New Section <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
                      
        <form method='POST' action={{url("/save_section")}} style ='flex:1'>
            @csrf

          <div class="form-group">

          <input type="hidden" class="form-control"  id="id" name="id" value ="{{$section?$section->id:-1}}">

            <label for="sectionname">Section Name:</label>
             <input type="text" class="form-control" placeholder="Section Name" id="sectionname" name="sectionname"  value="{{$section?$section->sectionname:''}}" required>
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