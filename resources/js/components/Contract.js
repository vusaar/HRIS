import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
//import axios from 'axios';

export default class Contract extends Component {


     constructor(props){
        super(props);

        console.log(props.data);
        this.state = {
            contracts : JSON.parse(props.data),
            query: "",
            loading : false
        };
     }

    componentDidMount(){

         this.setState({
            contracts : JSON.parse(this.props.data),
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

            const search_contracts = await axios.get(this.props.base_url+"/contracts?query="+this.state.query);
            console.log(search_contracts.data.data);

            this.setState({contracts:JSON.parse(search_contracts.data.data)});


          } catch (error) {
            console.log("error:..")
            console.log(error)
          }


    }

    render() {


        const search_bar_style = {
            
          };

         let contract_tbody  = "";
         
         console.log(this.state);
         
         if(this.state.loading){

         }else{

              contract_tbody = this.state.contracts.map((contract)=>{
                return(
                   <tr key ={contract.id}>
                    <td>{contract.contract_name}</td>
                    <td>{contract.contract_type}</td>
                    <td><a href={this.props.base_url+"/contract/"+ contract.id} className="action_edit_link"><i className="fa fa-pencil-square" aria-hidden="true"></i></a> |  <a className='action_delete_link'><i className="fa fa-trash" aria-hidden="true"></i></a></td>
                   </tr>
                );
              })            
         }

        return (
            <div className="container">
                <div className="card">
                <div className="card-header">
                    <div className="col-md-3">
                      <h3 className='card-title'>EMPLOYMENT CONTRACTS </h3>
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
                        <a href='{{url("/contract")}}' className='btn text-white bg-lime'>New Contract <i  aria-hidden="true"></i> </a>
                     </div> 
                </div>
                <div className="card-body">
                      <table className="table">
                      <thead className="thead-light">
                         <tr >
                            <th>Contract</th>
                            <th>Contract Type</th>
                          
                            <th>Actions</th>
                         </tr>
                      </thead>
                      <tbody>
                         {contract_tbody}
                        </tbody>
                    
                      </table>
                </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('contracts')) {
    var data = document.getElementById('contracts').getAttribute('data');

    var base_url = document.getElementById('contracts').getAttribute('base_url');

    ReactDOM.render(<Contract data={data} base_url = {base_url}/>, document.getElementById('contracts'));
}
