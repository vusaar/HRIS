<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.app')

@section('content')

<script>

    function ajax_get_verify_certification(applicant_document_id){

      $.ajax('http://localhost/hris2/ajax_get_certificate_verified/'+applicant_document_id, {
                       headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            contentType: 'application/json',
                            dataType: 'json',
                          type: 'GET',  // http method                         
                          success: function (data, status, xhr) {
                                  console.log(status);
                                  console.log(data);

                                  let certificate_verification = JSON.parse(JSON.stringify(data));

                                  let certificate_verified = false;

                                   if(certificate_verification.hasOwnProperty('certificate_verified')){

                                      certificate_verified = certificate_verification.certificate_verified;

                                   }

                                    console.log(certificate_verified);

                                   $('#certificate_attached').prop("checked",certificate_verified) ; 

                                },
                          error: function (jqXhr, textStatus, errorMessage) {
                                    console.log('error');
                                    console.log(errorMessage);
                                 }
             });
    }
     
    function ajax_verify_certificate(){

      //application_id,
      let document_id = $('#applicant_document_id').val();
       let verified = $('#certificate_attached').is(":checked");      
       let comment = "";

      $.ajax('http://localhost/hris2/ajax_verify_certificate', {
                       headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                           
                          type: 'POST',  // http method
                          data: {                                    
                                    document_id : document_id,
                                    verified : verified,
                                    comment : comment
                                },  // data to submit
                          success: function (data, status, xhr) {
                                  console.log(status);
                                  console.log(data);
                                },
                          error: function (jqXhr, textStatus, errorMessage) {
                                    console.log('error');
                                    console.log(errorMessage);
                                 }
             });

         }

      function show_document(file_name,document_id,documenttype_id,verified_id){

         console.log(verified_id);

         ajax_get_verify_certification(document_id);

        if(verified_id == -1){
           
       
            
        }else{

     

        }
         
         $('#applicant_document_id').val(document_id).change(); 

         $("#submitted_document_type").val(documenttype_id).change();
         
         show_both_panes();

         $('#document_embed').attr("src",'http://localhost/careers/'+file_name);
         //$('#document_modal').modal('toggle');
      }


      function show_both_panes(){

        $('#data_pane').css('width','50%');

        $('#document_pane').css('width','50%');
        $('#document_pane').css('display','block');

         //hide the navigation pane too
        $('#left_nav').css('display','none');

      }

      function hide_document_pane(){
         $('#data_pane').css('width','100%');

         $('#document_pane').css('width','0%');
         $('#document_pane').css('display','none');

         $('#left_nav').css('display','flex');
      }



    </script>


<style>
.my_scroll_bars::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3);
	border-radius: 5px;
	background-color: #F5F5F5;
}

.my_scroll_bars::-webkit-scrollbar
{
	width: 1px;
	background-color: #F5F5F5;
  scrollbar-width: thin;
}

.my_scroll_bars::-webkit-scrollbar-thumb
{
	border-radius: 2px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: rgba(0,0,0,0.4);
}

</style>


<div id='data_pane' style='width:100%;float:left;display:block;overflow-x:auto;white-space: nowrap;'>

<div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class='row'>
                    <div class='col-md-12 col-sm-12 col-xs-12'>
                    <b>
                     {{$application->applicant->surname}} {{$application->applicant->forenames}} | {{$application->applicant->gender}} | {{$application->applicant->nationalid}}
                    </b>
                    </div>
                    </div>
                    
                    
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
       
                <div class='col-md-12 col-sm-12 col-xs-12'>
                 <small>   
                    {{$application->vacancy->departmentjobtitle->jobtitle->jobtitlename}} | {{$application->vacancy->departmentjobtitle->department->departmentname}} | {{$application->vacancy->created_at}}
                 </small>
                      
                    </div>

                <div class="card-body">
                  

               
                    
                    

                   <div class='col-md-12' style='display:inline-block'>
                    
                   <ul class="nav nav-tabs" style="width:100%;margin-bottom:20px">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal Details</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#academic">Academic Details</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" data-toggle="tab" href="#work">Work Experience</a>
                       </li>
                    </ul>

                      <!-- Tab panes -->
            <div class="tab-content">
            
              <div class=" tab-pane container active" id="personal">
                
                     
                        <div class='col-md-12 col-xs-12 col-sm-12 my_scroll_bars' style='margin:10px;display:inline-block;overflow-x:auto;width:90%;white-space: nowrap;'>

                           @foreach ($application->applicant->documents as $document )
                                @if($document->qualificationtype->category=='PERSONAL')
                                  <a href='#' onclick="show_document('{{$document->path}}','{{$document->id}}','{{$document->documenttype_id}}','{{$document->certificate_verification==null?-1:$document->certificate_verification->id}}')"><span><img width="45px" src={{url('public/img/pdf_icon.png')}}/></span><span style='margin:10xp;padding:10px;border:1px solid rgba(0, 0, 0, 0.125)'> {{$document->qualificationtype->document}} </span></a>
                                @endif
                           @endforeach

                        </div>
                  <div class='row'>  
                     <div class='col-md-6 col-sm-12 col-xs-12'>
                    
                     <div class="form-group">                     
                     <label for="salutation">Salutation:</label>
                     <input class="form-control" value='{{$application->applicant->salutation}}' id='salutation' />
                     </div>

                     </div>
                     
                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="gender">Gender:</label>
                     <input class="form-control" value='{{$application->applicant->gender}}' />

                     </div>
                                            
                     </div>

                    </div>
                      
                      <div class='row'>
                     <div class='col-md-6 col-sm-12 col-xs-12'>

                     <div class="form-group">                     
                     <label for="surname">Surname:</label>
                     <input type="surname" class="form-control" id="surname" name="surname" value="{{$application->applicant->surname}}"/>
                     </div>

                     </div>
                     
                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="firstname">Forenames:</label>
                     <input type="firstname" class="form-control" id="firstname" name="firstname" value="{{$application->applicant->forenames}}"/>
                     </div>
                                            
                     </div>

                    </div>



                    <div class='row'>
                     <div class='col-md-6 col-sm-12 col-xs-12'>

                     <div class="form-group">                     
                     <label for="dob">Date of Birth:</label>
                     <input type="date" class="form-control" id="dob" name='dob' required onkeydown="return false" style='width:70%' value="{{$application->applicant->dob}}"/>
                     </div>

                     </div>
                     
                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="pob">Place of Birth:</label>
                     <input type="text" class="form-control" id="pob" name='pob' value="{{$application->applicant->pob}}"/>

                     </div>
                                            
                     </div>

                    </div>


                    <div class='row'>
                     <div class='col-md-6 col-sm-12 col-xs-12'>

                     <div class="form-group">                     
                     <label for="nationality">Nationality:</label>
                       <input class='form-control' id='nationality' name='nationality' value="{{$application->applicant->nationality}}"/>
                          
                     </div>

                     </div>
                     
                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="citizenship">Citizenship:</label>
                     <input class='form-control' id='citizenship' name ='citizenship' value ="{{$application->applicant->citizenship}}"/>
                          

                     </div>
                                            
                    </div>
                    </div>



                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="citizenship">Cellphone Number:</label>

                      <div class='row'>
                        
                         <div class='col-9'>
                         <input type='text' class='form-control' id='cellphone_number' name='cellphone_number' 
                            value = '{{$application->applicant->cellphonenumber}}'
                       />
                         </div>
                      </div>
                     </div>
                                            
                     </div>

                     <div class='col-md-6 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="email_address">Email address</label>
                     <input type='email' class='form-control' id='email_address:' name='email_address' value = "{{$application->applicant->emailaddress}}"
                       
                     />
                           
                     </div>
                                            
                     </div>


                     <div class='col-md-12 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="email_address">Physical address</label>
                     <input type='text' class='form-control' id='physical_street' name='physical_street'  
                      style="margin-bottom:2px" 
                       value = '{{$application->applicant->physicaladdress1}}'
                     />
                     <input type='text' class='form-control' id='physical_street2' name='physical_street2'  
                      style="margin-bottom:2px" 
                       value = '{{$application->applicant->physicaladdress2}}'
                     />                          
                     </div>
                                            
                     </div>


                     <div class='col-md-12 col-sm-12 col-xs-12'>
                     <div class="form-group">  
                     <label for="email_address">Postal address</label>
                    
                     <input type='text' class='form-control' id='postal_address' name='postal_address' value = '{{$application->applicant->postaladdress1}}'                       
                     />

                     <input type='text' class='form-control' id='postal_address2' name='postal_address2' value = '{{$application->applicant->postaladdress2}}'                        
                     />
                           

                     </div>
                                                                                                     
                     </div>         
                  
            </div>
            
            <div class="tab-pane container fade" id="academic">

            

            <div class="col-md-12 col-sm-12 col-xs-12">

<div>
        

        

        <div class="card-body">
           
           <div class='row'>
           
         @foreach($qualifications as $qualification)

         <div class='col-md-12 col-sm-12 col-xs-12' style ="border-bottom: 1px solid rgba(0, 0, 0, 0.125);border-top: 1px solid rgba(0, 0, 0, 0.125); margin-top:5px;margin-bottom:5px;padding-top:10px;width:100%">
         <span style='float:left'>
         <h5><b>{{$qualification->qualificationtype->document}}</b></h5> <small><b> {{$qualification->examination_board}} | {{$qualification->starting_year}} - {{$qualification->finishing_year}} | {{$qualification->completed_status}}</b></small>
         </span>
         <span style='float:right'>
           
         @if ($qualification->qualification_document)
 
         <a href='#' onclick="show_document('{{$qualification->qualification_document->path}}','{{$qualification->qualification_document->id}}','{{$qualification->qualification_document->documenttype_id}}','{{$qualification->qualification_document->certificate_verification==null?-1:$qualification->qualification_document->certificate_verification->id}}')"><span><img width="25px" src={{url('public/img/pdf_icon.png')}}/></span><span style='margin:10xp;padding:5px;border:1px solid rgba(0, 0, 0, 0.125)'> CERTIFICATE </span></a>
          
          @else
      
          <span style='margin:10xp;padding:5px;border:1px solid rgba(0, 0, 0, 0.125)'>NO CERTIFICATE </span>
          @endif
             
         </span>
         </div>

         <div class='col-md-12 col-sm-12 col-xs-12'>
                
         <div class="table-responsive">
               <table class="table table-striped">
               <thead class="thead">
                  <tr>                    
                    <th>Subject/Programme</th>                                           
                    <th>Grade</th>                    
                   </tr>
               </thead>
               <tbody>
                   @foreach ($qualification->courses as $course)
                     <tr>
                        <td>{{$course->course}}</td>
                        <td>{{$course->grade}}</td>
                     </tr>
                   @endforeach
                </tbody>
               </table>
         </div>            


          </div>

         @endforeach
                                   
           </div>
           
        </div>

        

          

    </div>
</div>    
        
        
             </div>
            
             <div class="tab-pane container fade" id="work">

             <div class='col-md-12 col-xs-12 col-sm-12' style='margin:10px'>

                           @foreach ($application->applicant->documents as $document )
                                @if($document->qualificationtype->category=='EXPERIENCE')
                                  <a href='{{$document->path}}'><span><img width="45px" src={{url('public/img/pdf_icon.png')}}/></span><span style='margin:10xp;padding:10px;border:1px solid rgba(0, 0, 0, 0.125)'> {{$document->qualificationtype->document}} </span></a>
                                @endif
                           @endforeach

                        </div>

             <div class="col-md-12 col-sm-12 col-xs-12">
            <div>
                             

                <div class="card-body">
                   
                   <div class='row'>
                   <div class="table-responsive">
                       <table class="table">
                       <thead class="thead">
                          <tr>
                            <th>Company Name</th>
                            <th>Position</th>
                            <th>Started</th>                           
                            <th>Terminated</th>                                                     
                           </tr>
                       </thead>
                       <tbody>
                       
                        @foreach ($application->applicant->experiences as $experience)
                          
                          <tr>                            
                             <td>{{$experience->company_name}}</td>
                             <td>{{$experience->jobtitle}}</td>
                             <td>{{$experience->starting_year}}</td>
                             <td>{{$experience->finishing_year}}</td>                                                       
                          </tr>   
                        @endforeach

                       </tbody>
                      </table>
                     </div>                      
                   </div>
                   
                </div>
                                  

            </div>
        </div>


             </div>
        </div>
                   

                   </div>
                </div>
            </div>
        </div>
    
</div>


<!-- The Modal -->
<div class="modal fade" id="document_modal"  style="height: 1000px !important">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DOCUMENT</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
          <embed src="" frameborder="0" width="100%"  name='document_embed1' id='document_embed1'>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

     
  </div>

<div id='document_pane' style='min-height:100%;width:0%;float:right;display:none'>
  
  <div class='row' style="margin:1px;padding:1px;">
  <div class='col-md-12 col-sm-12 col-xs-12' style='height:50px'>
        <span style='float:left'>
       
        <select id='submitted_document_type'>
           @foreach ($academic_qualification_types as $academic_qualification_type)
              <option value ='{{$academic_qualification_type->id}}'>{{$academic_qualification_type->document}}</option>
           @endforeach
        </select>
  
        </span>
        <span style='float:left;margin-left:10px;margin-top:5px'>
          <input type ='hidden' id='applicant_document_id' value ='-1'/>
          <input type="checkbox" id='certificate_attached' onchange="ajax_verify_certificate()">
          <label for="certificate_attached">Certificate attached</label><br>
        </span>

        <span class='' style='color:orangered;margin:5px;padding:5px;float:right;border:1px solid gray'><a style='color:orangered;' href ='#' onclick="hide_document_pane()"><small>CLOSE</small></a></span>
  </div>
  <div class='col-md-12 col-sm-12 col-xs-12' style='min-height: 500px;'>
  <embed src="" frameborder="0" width="100%"  height="100%" name='document_embed' id='document_embed'>
  </div>
  </div>
 
</div>



@endsection
