import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
//import axios from 'axios';

export default class Employee extends Component {


   

     constructor(props){
        super(props);

       
        this.TABLE_VIEW = 0;
        this.SINGLE_VIEW = 1;

        this.state = {
            employees : JSON.parse(props.data),
            query: "",
            mode : this.TABLE_VIEW,
            curr : 0,
            loading : false
        };
     }

    componentDidMount(){

         this.setState({
            employees : JSON.parse(this.props.data),
            query: "",
            mode : this.TABLE_VIEW,
            curr : 0,
            loading:false
         });

         console.log(this.state);
      
    }


     
      
    setQuery(e){
        console.log(e.target.value);
        this.setState({query:e.target.value});
    }


    viewSingle(employee_id){

          this.setState({
            mode : this.SINGLE_VIEW,
            curr : employee_id
          });

          

    }

     doSearch  = async(e) => {
        

         e.preventDefault();

        try {

            const search_employees = await axios.get(this.props.base_url+"/employees?query="+this.state.query);

            console.log(search_employees);
            console.log(search_employees.data.data);

            this.setState({employees:JSON.parse(search_employees.data.data)});


          } catch (error) {
            console.log("error:..")
            console.log(error)
          }


    }


    preRenderCard(){

          let employee_filter  = this.state.employees.filter((emp)=>{

               return emp.id == this.state.curr;
          });

          let employee = employee_filter[0];

          let itemHeadingStyle = {backgroundColor:'#dfdfdf', padding:'3px',fontSize:'10px'};
          let sectionHeadingStyle = {borderBottom:'solid 1px gray'};

          let sectionRowStyle ={paddingTop:'10px'};

          console.log("employee...");
            console.log(employee);
          return(<div className="card">

              <div className="card-header">
               <div className="col-md-3">
                <h3 className='card-title'>EMPLOYEE PROFILE </h3>
              </div> 

              <div className="col-md-6">
              
              </div>
             


                <div className="col-md-3">
                  <a href='{{url("/employee")}}' className='btn text-white bg-lime'>New Employee <i  aria-hidden="true"></i> </a>
               </div> 
              </div>

               <div className="card-body">
                 <div className='row'>
                  <div className ="col-md-3">
                     <img alt="employee's photo"></img>
                  </div>
                  <div className ="col-md-6">
                      <span style={{display: 'flex', alignItems: 'center'}}>
                        <h3>{employee.forenames} {employee.surname} | </h3> <span style={{marginLeft:'5px',paddingBottom:'8px'}}>{employee.employmentdetails?.departmentjobtitle?.jobtitle?.jobtitlename}</span>
                      </span>
                      <br/>
                      <span>
                        {employee.employmentdetails?.departmentjobtitle?.section?.sectionname} | <small><b>{employee.employmentdetails?.departmentjobtitle?.department?.departmentname}</b></small>
                      </span>
                  </div>
                  </div>

                  <div className='row' style={sectionHeadingStyle}>
                    <div className='col-md-12'>
                      <span><h4>Personal Details</h4></span>
                    </div>
                  </div>

                  <div className='row' style={sectionRowStyle}>
                      
                       <div className='col-md-6'>
                         <span style={itemHeadingStyle}>
                          Full Name
                          </span><br/>
                        <span> 
                       {employee.title} {employee.forenames}  {employee.middlenames} {employee.surname} 
                       </span>
                       </div>
                       
                       <div className='col-md-3'>
                         <span style={itemHeadingStyle}>
                           Gender
                         </span><br/>
                         <span>
                         {employee.sex} 
                         </span>
                        
                       </div>

                       <div className='col-md-3'>
                         <span style={itemHeadingStyle}>
                           Marital Status
                         </span><br/>
                         <span>
                         {employee.maritalstatus} 
                         </span>
                        
                       </div>
                  </div>

                  <div className='row' style={sectionRowStyle}>
                      
                        <div className='col-md-4'>
                        <span style={itemHeadingStyle}>
                          DOB
                          </span><br/>
                         <span> 
                          {employee.dateofbirth}  
                        </span>
                        </div>

                        <div className='col-md-4'>
                        <span style={itemHeadingStyle}>
                          Nationality
                          </span><br/>
                         <span> 
                          {employee.nationality}  
                        </span>
                        </div>


                        <div className='col-md-4'>
                        <span style={itemHeadingStyle}>
                          National ID
                          </span><br/>
                         <span> 
                          {employee.nationalid}  
                        </span>
                        </div>
                      
                  </div>

                  <div className='row' style={sectionRowStyle}>
                      
                        <div className='col-md-4'>
                         <span style={itemHeadingStyle}>
                          Physical Address
                          </span><br/>
                         <span> 
                          {employee.postaladd1}<br/>  
                          {employee.postaladd2}
                        </span>
                        </div>

                        <div className='col-md-4'>
                        <span style={itemHeadingStyle}>
                          Cell Number
                          </span><br/>
                         <span> 
                          {employee.cellphone}  
                        </span>
                        </div>

                        <div className='col-md-4'>
                        <span style={itemHeadingStyle}>
                          Email Address
                          </span><br/>
                         <span> 
                          {employee.emailaddress}  
                        </span>
                        </div>


                        
                      
                  </div>

                  <div className='row' style={sectionHeadingStyle}>
                    <div className='col-md-12'>
                      <span><h4>Education Details</h4></span>
                    </div>
                </div>

               </div>

               
          </div>);
    }

    preRenderTable(){


      let employees_tbody = this.state.employees?.map((employee)=>{
        console.log(employee);
          return(
            
             <tr key ={employee.id}>
              <td><a href='#' onClick={()=>this.viewSingle(employee.id)}>{employee.forenames} {employee.surname}<br/><small><small><small><b>{employee.employmentdetails?.departmentjobtitle?.jobtitle?.jobtitlename}</b></small></small></small></a></td>
              <td>{employee.sex}</td>
              <td><small>{employee.employmentdetails?.departmentjobtitle?.section?.sectionname}</small><br/><small><small><small><b>{employee.employmentdetails?.departmentjobtitle?.department?.departmentname}</b></small></small></small></td>
              <td>{employee.employmentdetails?.contract?.contract_name}</td>
              <td>{employee.employmentdetails?.employmentstatus}</td>
              <th>{employee.employmentdetails?.effectivedate}</th>
              <th>{employee.employmentdetails?.resignationdate}</th>
              <th>{employee.employmentdetails?.departmentjobtitle?.supervisor?.employmentdetail?.employee?.forenames} {employee.employmentdetails?.departmentjobtitle?.supervisor?.employmentdetail?.employee?.surname} <br/> <small><small><small><b>{employee.employmentdetails?.departmentjobtitle?.supervisor?.jobtitle?.jobtitlename}</b></small></small></small></th>  
              <td><a href={this.props.base_url+"/employee/"+ employee.id} className="action_edit_link"><i className="fa fa-pencil-square" aria-hidden="true"></i></a> |  <a className='action_delete_link'><i className="fa fa-trash" aria-hidden="true"></i></a></td>
             </tr>
          );
        })    
        
        

        return (
          <div className="card">
          <div className="card-header">
              <div className="col-md-3">
                <h3 className='card-title'>EMPLOYEES </h3>
              </div> 
               
              
              <div className="col-md-6">
              <div className="input-group">
                 <input type="text" className="form-control" value={this.state.query} onChange={this.setQuery.bind(this)} placeholder="Search ..." />
                      <div className="input-group-append">
                          <button class="btn btn-secondary" type="button" onClick={this.doSearch.bind(this)}>
                              <i className="fa fa-search"></i>
                           </button>
                      </div>
              </div>
              </div>
             


                <div className="col-md-3">
                  <a href='{{url("/employee")}}' className='btn text-white bg-lime'>New Employee <i  aria-hidden="true"></i> </a>
               </div> 
          </div>
          <div className="card-body">
                <table className="table">
                <thead className="thead-light">
                   <tr >
                     <th>Employee</th>
                     <th>Gender</th>
                     <th>Department</th>
                     <th>Contract Type</th> 
                     <th>Employment Status</th>
                     <th>Date Appointed</th>
                     <th>Date Termination</th>
                     <th>Reports To</th>       
                     <th>Actions</th>
                   </tr>
                </thead>
                <tbody>
                   {employees_tbody}
                  </tbody>
              
                </table>
          </div>
          </div>

        )

    }

    
    render() {


         let content  = "";
         
         console.log(this.state);
         
         if(this.state.loading){

         }else{

              if(this.state.mode == this.TABLE_VIEW){
                content = this.preRenderTable();
              }else{

                content = this.preRenderCard();
              }
                
         }

        return (
            <div className="container">
                 {content}
            </div>
        );
    }
}

if (document.getElementById('reactive_employees')) {

    var data = document.getElementById('reactive_employees').getAttribute('data');

     //console.log(data);

    var base_url = document.getElementById('reactive_employees').getAttribute('base_url');

    ReactDOM.render(<Employee data={data} base_url = {base_url}/>, document.getElementById('reactive_employees'));

}
