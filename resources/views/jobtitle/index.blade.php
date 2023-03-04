@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>JOB TITLES</h3>
                    
                    <span style='margin-left: auto;order: 2;' >
                        <a href='{{url("/jobtitle")}}' class='btn text-white bg-lime'>New Job Title <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
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
        <th>Job title</th>             
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

   
    @foreach ($jobtitles as $jobtitle)
    
       <tr>
        <td><span id='jobtitlename_'{{$jobtitle->id}}>{{$jobtitle->jobtitlename}}</span></td>
       
        <td>
         <a href="{{url('jobtitle/')}}/{{$jobtitle->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
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