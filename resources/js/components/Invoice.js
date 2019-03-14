import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './css/invoice.css';

import TableRow from "./TableRow";

export default class Invoice extends Component {
    constructor() {
        super();
        this.state = {
           data: {
                items:[
                    {
                        "item_id":1,
                        "description":"Foo",
                        "quantity":"2",
                        "unit_price":"10",
                        "discount":"0",
                        "account_id":"1",
                        "tax_id":"1",
                        "tax_rate":"10",
                        "tax":"2",
                        "amount":"20"
                    },
                    {
                        "item_id":2,
                        "description":"test",
                        "quantity":"5",
                        "unit_price":"10",
                        "discount":"0",
                        "account_id":"1",
                        "tax_id":"1",
                        "tax_rate":"10",
                        "tax":"5",
                        "amount":"50"
                    }
                ],
                invoice:{
                    id:'1',
                    contact_id:'1',
                    date:'2019-03-12',
                    estimated_date:'2019-03-22',
                    code:'#IN006',
                    reference:'Ref002',
                    sub_total:70,
                    vat:7,
                    dicount:0,
                    total:77,
                    currency_id:"1",
                    amount_tax:"No Tax"
                }
            }
        }
        this.addRow = this.addRow.bind(this);
    }
    addRow(){
        var data1 = this.state.data;
        data1.items=this.state.data.items.concat({
            "item_id":"",
            "description":"",
            "quantity":"",
            "unit_price":"",
            "discount":"",
            "account_id":"",
            "tax_id":"",
            "tax_rate":"",
            "amount":""
        });
        this.setState({ data:  data1});
    }
    calculator(val){
        var data1 = this.state.data;
        var Total = 0;
        var totalTax=0;
        var subTotal=0;
        var totalDicount = 0;
        data1.items.map(function(item,index){
            var amount = item.unit_price*item.quantity;
            var discount = amount*item.discount/100;
            var taxableAmount = amount-discount;
            var tax = taxableAmount*item.tax_rate/100;
            var sub_amount= taxableAmount+tax;
            if(val==index){
                data1.items[val].tax=tax;
                data1.items[val].amount=taxableAmount;
            }
            totalDicount+=  discount;
            totalTax    +=  tax;
            subTotal    +=  taxableAmount;
            Total       +=  sub_amount;
        });
        data1.invoice.sub_total =   subTotal;
        data1.invoice.vat       =   totalTax;
        data1.invoice.discount  =   totalDicount;
        data1.invoice.total     =   Total;
        this.setState({ data:  data1});
    }
    removeRow(val){
        var data1 = this.state.data;
        data1.items.splice(val,1);
        this.setState({ data:  data1});
        this.calculator(val);
    }
    handleChange(e){
        var curent = e.target.innerHTML;
        if(curent != e.target.title){
            var data1 = this.state.data;
            data1.items[e.target.id].discount=curent;
            this.setState({ data:  data1});
            this.calculator(e.target.id);
        }
    }
    render() {
        return (
            <div className="content-wrapper">
                <div className="content-body">
                    <div>
                        <div className="container in-border">
                            <div className="row">
                                <div className="col-md-2"> 
                                    <div className="form-group ui-widget">
                                    <label >To</label>
                                    <input type="text" name="contact_id" value={this.state.data.invoice.contact_id} onChange={()=>alert()} className="form-control" />
                                    </div>
                                    </div>                                        
                                <div className="col-md-2"> 
                                <div className="form-group">
                                    <label >Date</label>
                                    <input type="text" name="date" value={this.state.data.invoice.date}  onChange={()=>alert()} className="form-control datepicker" />
                                    </div> 
                                    </div>  
                                <div className="col-md-2"> 
                                    <div className="form-group">
                                    <label >Due Date</label>
                                    <input type="text" name="estimated_date"  value={this.state.data.invoice.estimated_date}  onChange={()=>alert()} className="form-control datepicker" />
                                    </div> 
                                </div>                                        
                                <div className="col-md-2"> 
                                    <div className="form-group">
                                    <label >Invoice#</label>
                                    <input type="text" name="code" value={this.state.data.invoice.code}  onChange={()=>alert()}  className="form-control" />
                                    </div> 
                                </div>  
                                <div className="col-md-2">
                                    <div className="form-group">
                                    <label >Reference</label>
                                    <input type="text" name="reference" value={this.state.data.invoice.reference}  onChange={()=>alert()}  className="form-control" />
                                    </div> 
                                </div>                                        
                                <div className="col-md-2 ">
                                <p className="test">
                                    <a href="#"><i className="la la-eye"></i> Preview</a></p>
                                </div>                                     
                                
                            </div>
                            <hr />
                            <div className="row">
                                <div className="col-md-6 col-12">
                                <select name="currency_id"  value={this.state.data.invoice.currency_id}  onChange={()=>alert()}  className="form-control w200" >
                                    <option value="1">GBP British Pound</option>
                                    <option value="1">Add Currency</option>
                                </select>
                                </div>
                                <div className="col-md-6 col-12 fr">
                                    <label className="lablef">Amount are:</label>
                                    <select name="amount_tax" className="form-control w200"  onChange={()=>alert()}  value={this.state.data.invoice.amount_tax} >
                                            <option value="Tax Exclusive">Tax Exclusive</option>
                                            <option value="Tax Inclusive">Tax Inclusive</option>
                                            <option value="No Tax">No Tax</option>
                                        </select>
                                </div>
                            </div>

                            <div className="row tbg">
                                <div className="col-md-12 table-responsive">
                                    <div id="table" className="table-editable">

                                        <table className="table table-bordered table-responsive-md text-center">
                                            <thead>
                                            <tr>
                                                <th className="text-center">Item </th>
                                                <th className="text-center">Description</th>
                                                <th className="text-center">Qty</th>
                                                <th className="text-center">Unit Price</th>
                                                <th className="text-center">Disc %</th>
                                                <th className="text-center">Account</th>
                                                <th className="text-center">Tax rate</th>
                                                <th className="text-center">Tax</th>
                                                <th className="text-center">Amount GBP</th>
                                                <th className="text-center">&nbsp;</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                {this.state.data.items.map((person, i) => 
                                                <TableRow key = {i} 
                                                id = {i} 
                                                data = {person} 
                                                delRow={(val)=>this.removeRow(val)} 
                                                html={person.discount} 
                                                emitChange={(ev)=>this.handleChange(ev)}
                                                />)}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div className="row mtb" >
                                <div className="col-md-6">
                                    <div className="dropdown">
                                        <button type="button" className="btn btn-primary btn-primary2 dropdown-toggle" onClick={this.addRow.bind(this)} >
                                            Add a new line
                                        </button>
                                        <div className="dropdown-menu">
                                            <a className="dropdown-item" href="new-invoice.html"> Add 5</a>
                                            <a className="dropdown-item" href="#"> Add 10</a>
                                            <a className="dropdown-item" href="#">Add 20</a>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="row">
                                        <div className="col-6">Sub total {(this.state.data.invoice.discount>0)?'(includes a discount of '+this.state.data.invoice.discount+')':''}</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.invoice.sub_total}  onChange={()=>alert()}  name="sub_total" />
                                            <p >{this.state.data.invoice.sub_total}</p>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-6">Total VAT</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.invoice.vat}  onChange={()=>alert()}  name="vat" />
                                            <p >{this.state.data.invoice.vat}</p>
                                        </div>
                                    </div>
                                    <div className="row in-total">
                                        <div className="col-6">Total</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.invoice.total}  onChange={()=>alert()}  name="total" />
                                            <p >{this.state.data.invoice.total}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="dropdown">
                                        <button type="button" className="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">Save</button>
                                        <div className="dropdown-menu">
                                            <a className="dropdown-item" href="new-invoice.html"> Save as draft</a>
                                            <a className="dropdown-item" href="#"> Save(continue editing)</a>
                                            <a className="dropdown-item" href="#">Save & submit for approval</a>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-2">&nbsp;</div>
                                <div className="col-md-2">
                                    <div className="dropdown">
                                        <button type="submit" className="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">Approval</button>
                                    </div>
                                </div>
                                <div className="col-md-2">
                                    <button type="button" className="btn btn-danger btn-primary2">Cancel</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>                    
                </div>
            </div>
        );
    }
}

if (document.getElementById('content')) {
    ReactDOM.render(<Invoice />, document.getElementById('content'));
}
