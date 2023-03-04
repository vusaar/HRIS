@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>EMPLOYEE GRADES </h3>


                <span style='margin-left: auto;order: 2;'>
                        <a href='{{url("/grade")}}' class='btn text-white bg-lime'>New Grade <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                     </span> 
                </div>

                <div class="card-body">
                      <table class="table">
                      <thead class="thead-light">
                         <tr>
                            <th>Grade</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                     @foreach ($grades as  $grade)

                         <tr>
                            <td>
                                {{$grade->grade}}
                            </td>
                           
                            <td>
                            <a href="{{url('grade/')}}/{{$grade->id}}" class='text-lime bg-white'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
         <a href='#' class='text-red bg-white'><i class="fa fa-trash" aria-hidden="true"></i>
        </a>
                            </td>
                         </tr>
                         
                     @endforeach
                      </table>
                </div>
            </div>
        </div>
    
</div>
@endsection