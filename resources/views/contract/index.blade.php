@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3 class='card-title'>EMPLOYMENT CONTRACTS </h3>


                <span style='margin-left: auto;order: 2;' >
                        <a href='{{url("/contract")}}' class='btn text-white bg-lime'>New Contract <i  aria-hidden="true"></i> </a>
                     </span> 
                </div>

                <div class="card-body">
                      <table class="table">
                      <thead class="thead-light">
                         <tr>
                            <th>Contract</th>
                            <th>Contract Type</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                     @foreach ($contracts as  $contract)

                         <tr>
                            <td>
                                {{$contract->contract_name}}
                            </td>
                            <td>
                                {{$contract->contract_type}}
                            </td>
                           
                            <td>
                            <a href="{{url('contract/')}}/{{$contract->id}}" class='action_edit_link'><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
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