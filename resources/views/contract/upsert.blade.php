@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <b>CREATE/EDIT EMPLOYMENT CONTRACT</b>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='#' class='btn text-white bg-lime' data-toggle="modal" data-target="#new_section">New Contract Type <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
                      
        <form method='POST' action={{url("/save_contract")}} style ='flex:1'>
            @csrf

          <div class="form-group">

          <input type="hidden" class="form-control"  id="id" name="id" value ="{{$contract?$contract->id:-1}}">

            <label for="contract">Contract Name:</label>
             <input type="text" class="form-control" placeholder="Contract Name" id="contractname" name="contractname"  value="{{$contract?$contract->contract_name:''}}" required>
          </div>

          <div class="form-group">

        
            <label for="contracttype">Nature of Contract:</label>
           
             <select type="text" class="form-control" id="contracttype" name="contracttype" required>
              
                <option value='PERMANENT'> 
                PERMANENT
                </option>
                
                <option value='TEMPORARY'> 
                TEMPORARY
                </option>
             
               
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