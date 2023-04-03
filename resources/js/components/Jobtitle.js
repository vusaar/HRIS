import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
//import axios from 'axios';

export default class Jobtitle extends Component {


     constructor(props){
        super(props);

        console.log(props.data);
        this.state = {
            jobtitles : JSON.parse(props.data),
            query: "",
            loading : false
        };
     }

    componentDidMount(){

         this.setState({
            jobtitles : JSON.parse(this.props.data),
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

            const search_jobtitles = await axios.get(this.props.base_url+"/jobtitles?query="+this.state.query);
            console.log(search_jobtitles.data.data);

            this.setState({jobtitles:JSON.parse(search_jobtitles.data.data)});


          } catch (error) {
            console.log("error:..")
            console.log(error)
          }


    }

    render() {


        const search_bar_style = {
            
          };

         let jobtitle_tbody  = "";
         
         console.log(this.state);
         
         if(this.state.loading){

         }else{

            jobtitle_tbody = this.state.jobtitles.map((jobtitle)=>{
                return(
                   <tr key ={jobtitle.id}>
                    <td>{jobtitle.jobtitlename}</td>
                  
                    <td><a href={this.props.base_url+"/jobtitle/"+ jobtitle.id} className="action_edit_link"><i className="fa fa-pencil-square" aria-hidden="true"></i></a> |  <a className='action_delete_link'><i className="fa fa-trash" aria-hidden="true"></i></a></td>
                   </tr>
                );
              })            
         }

        return (
            <div className="container">
                <div className="card">
                <div className="card-header">
                    <div className="col-md-3">
                      <h3 className='card-title'>Job Titles </h3>
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
                        <a href={this.props.base_url+'/jobtitle'} className='btn text-white bg-lime'>New Job Title <i  aria-hidden="true"></i> </a>
                     </div> 
                </div>
                <div className="card-body">
                      <table className="table">
                      <thead className="thead-light">
                         <tr >
                            <th>Job Title</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         {jobtitle_tbody}
                        </tbody>
                    
                      </table>
                </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('jobtitles')) {
    var data = document.getElementById('jobtitles').getAttribute('data');

    var base_url = document.getElementById('jobtitles').getAttribute('base_url');

    ReactDOM.render(<Jobtitle data={data} base_url = {base_url}/>, document.getElementById('jobtitles'));
}
