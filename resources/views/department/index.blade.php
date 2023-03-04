@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>DEPARTMENTS</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='{{url("/department")}}' class='btn text-white bg-lime'>New Department <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
        <th>Department Name</th> 
        <th>Section Name</th>        
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

   
    @foreach ($departments as $department)
    
       <tr>
        <td>{{$department->departmentname}}</td>
        <td>{{$department->section->sectionname}}</td>
        <td>
         <a href="{{url('department/')}}/{{$department->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
         <a href='#' class='text-red bg-white'><i class="fa fa-trash" aria-hidden="true"></i>
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