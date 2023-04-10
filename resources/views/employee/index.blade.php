@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

    <div class="col-md-12 col-sm-12 col-xs-12" id="reactive_employees" data="{{ $data }}" base_url="{{url('/')}}"> 
             <!--
               reactive content here
              -->
                       
    </div>

    </div>   
@endsection