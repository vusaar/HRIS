import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
//import axios from 'axios';

export default class Department extends Component {


     constructor(props){
        super(props);

        console.log(props.data);
        this.state = {
            departments : JSON.parse(props.data),
            query: "",
            loading : false
        };
     }

    componentDidMount(){

         this.setState({
            departments : JSON.parse(this.props.data),
            query: "",
            loading:false
         });
      
    }


    setQuery(e){
        console.log(e.target.value);
        this.setState({query:e.target.value});
    }

     doSearch  = async(e) => {
        

         e.preventDefault();

        try {

            const search_departments = await axios.get(this.props.base_url+"/departments?query="+this.state.query);
            console.log(search_departments.data.data);

            this.setState({departments:JSON.parse(search_departments.data.data)});


          } catch (error) {
            console.log("error:..")
            console.log(error)
          }


    }

    render() {


        const search_bar_style = {
            
          };

         let department_tbody  = "";
         
         console.log(this.state);
         
         if(this.state.loading){

         }else{

            department_tbody = this.state.departments.map((department)=>{
                return(
                   <tr key ={department.id}>
                    <td>{department.departmentname}</td>
                    <td>{department.section.sectionname}</td>
                    <td><a href={this.props.base_url+"/department/"+ department.id} className="action_edit_link"><i className="fa fa-pencil-square" aria-hidden="true"></i></a> |  <a className='action_delete_link'><i className="fa fa-trash" aria-hidden="true"></i></a></td>
                   </tr>
                );
              })            
         }

        return (
            <div className="container">
                <div className="card">
                <div className="card-header">
                    <div className="col-md-3">
                      <h3 className='card-title'>Departments</h3>
                    </div> 
                     
                    
                    <div className="col-md-6">
                    <div className="input-group">
                       <input type="text" className="form-control" value={this.state.query} onChange={this.setQuery.bind(this)} placeholder="Search ..." />
                            <div className="input-group-append">
                                <button className="btn btn-secondary" type="button" onClick={this.doSearch.bind(this)}>
                                    <i className="fa fa-search"></i>
                                 </button>
                            </div>
                    </div>
                    </div>
                   


                      <div className="col-md-3">
                        <a href={this.props.base_url+'/department'} className='btn text-white bg-lime'>New Department <i  aria-hidden="true"></i> </a>
                     </div> 
                </div>
                <div className="card-body">
                      <table className="table">
                      <thead className="thead-light">
                         <tr >
                            <th>Department</th>
                            <th>Section</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         {department_tbody}
                        </tbody>
                    
                      </table>
                </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('departments')) {
    var data = document.getElementById('departments').getAttribute('data');

    var base_url = document.getElementById('departments').getAttribute('base_url');

    ReactDOM.render(<Department data={data} base_url = {base_url}/>, document.getElementById('departments'));
}
