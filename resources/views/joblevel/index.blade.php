@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Job Hierarchy


                <span class='page_menu' >
                        <a href='{{url("/level")}}' class='page_menu_link'>New Job Hierarchy <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                     </span> 
                </div>

                <div class="card-body">
                      <table class="table">
                      <thead class="thead-light">
                         <tr>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Actions</th>
                         </tr>
                      </thead>
                     @foreach ($joblevels as  $joblevel)

                         <tr>
                            <td>
                                {{$joblevel->jobtitle_hierarchy}}
                            </td>
                            <td>
                            {{$joblevel->parent?$joblevel->parent->jobtitle_hierarchy:''}}
                           
                            </td>
                            <td>
                            <a href="{{url('level/')}}/{{$joblevel->id}}" class='action_edit_link'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
         <a href='#' class='action_delete_link'><i class="fa fa-trash" aria-hidden="true"></i>
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