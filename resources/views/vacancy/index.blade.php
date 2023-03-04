@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    
                    <h3 class="card-title">VACANCIES</h3>
                    
                    <span class='col-auto' style='margin-left: auto;order: 2;'>
                        <a href='{{url("/vacancy")}}' class='btn text-white bg-lime'>New Vacancy  </a>
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
        <th>Post Name</th>
        <th>Department Name</th> 
        <th>Contract</th> 
        <th>No of Posts </th>         
        <th>Open From</th>
        <th>Open To</th>
        <th>Enabled</th>
        <th>Submissions</th>    
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

   
    @foreach ($vacancies as $vacancy)
    
       <tr>
        <td>{{$vacancy->departmentjobtitle->jobtitle->jobtitlename}} </td>
        <td>{{$vacancy->departmentjobtitle->department->departmentname}}</td>
        <td>{{$vacancy->contract->contract_name}}</td>
        <td>{{$vacancy->no_of_posts}}</td>        
        <td>{{$vacancy->open_from}}</td>
        <td>{{$vacancy->open_until}}</td>
        <td>{{$vacancy->enabled==1?'ENABLED':'DISABLED'}}</td>
        <td>{{count($vacancy->applications)}}</td>
        <td>
         <a href="{{url('vacancy/')}}/{{$vacancy->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" style='font-size:14px' aria-hidden="true"></i></a> | 
         <a href='#' class='text-red bg-white'><i class="fa fa-trash" style='font-size:14px' aria-hidden="true"></i>
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