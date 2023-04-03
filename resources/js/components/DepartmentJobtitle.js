import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
//import axios from 'axios';

export default class DepartmentJobtitle extends Component {


     constructor(props){
        super(props);

        //console.log(props.data);
        this.state = {
            deptjobs : JSON.parse(props.data),
            query: "",
            loading : false
        };
     }

    componentDidMount(){

         this.setState({
            deptjobs : JSON.parse(this.props.data),
            query: "",
            loading:false
         });

         console.log(this.state);
      
    }


     
      
    setQuery(e){
        console.log(e.target.value);
        this.setState({query:e.target.value});
    }

     doSearch  = async(e) => {
        

         e.preventDefault();

        try {

            const search_deptjobs = await axios.get(this.props.base_url+"/departmentjobtitles?query="+this.state.query);

            console.log(search_deptjobs);
            console.log(search_deptjobs.data.data);

            this.setState({deptjobs:JSON.parse(search_deptjobs.data.data)});


          } catch (error) {
            console.log("error:..")
            console.log(error)
          }


    }

    render() {


        
         let deptjobs_tbody  = "";
         
         console.log(this.state);
         
         if(this.state.loading){

         }else{

            deptjobs_tbody = this.state.deptjobs.map((deptjob)=>{
              console.log(deptjob);
                return(
                  
                   <tr key ={deptjob.id}>
                    <td>{deptjob.jobtitle.jobtitlename}</td>
                    <td>{deptjob.department?.departmentname} | {deptjob.section?.sectionname}</td>
                    <td>{"--"}</td>
                    <td>{deptjob.grade.grade}</td>
                    <td>{deptjob.supervisor?.jobtitle?.jobtitlename}</td>
                    <td><a href={this.props.base_url+"/departmentjobtitle/"+ deptjob.id} className="action_edit_link"><i className="fa fa-pencil-square" aria-hidden="true"></i></a> |  <a className='action_delete_link'><i className="fa fa-trash" aria-hidden="true"></i></a></td>
                   </tr>
                );
              })            
         }

        return (
            <div className="container">
                <div className="card">
                <div className="card-header">
                    <div className="col-md-3">
                      <h3 className='card-title'>DEPARTMENT JOB TITLE </h3>
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
                        <a href='{{url("/departmentjobtitle")}}' className='btn text-white bg-lime'>New Department Job <i  aria-hidden="true"></i> </a>
                     </div> 
                </div>
                <div className="card-body">
                      <table className="table">
                      <thead className="thead-light">
                         <tr >
                           <th>Job Title</th>
                           <th>Department | Section </th> 
                           <th>Level Group</th>
                           <th>Grade</th>
                           <th>Reports To</th>       
                           <th>Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         {deptjobs_tbody}
                        </tbody>
                    
                      </table>
                </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('deptjobs')) {
    var data = document.getElementById('deptjobs').getAttribute('data');

    var base_url = document.getElementById('deptjobs').getAttribute('base_url');

    ReactDOM.render(<DepartmentJobtitle data={data} base_url = {base_url}/>, document.getElementById('deptjobs'));
}
