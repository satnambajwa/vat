import React, { Component } from 'react';
import './css/invoice.css';
import TableRow from "./TableRow";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";


export default class invoice extends Component {
    constructor() {
        super();
        this.state = {
           data: {
                items:[
                    {
                        "item_id":'',
                        "description":"",
                        "quantity":"",
                        "unit_price":"",
                        "discount":"",
                        "account_id":"",
                        "tax_id":"",
                        "tax_rate":"",
                        "tax":"",
                        "amount":""
                    }
                ],
               
                id:'',
                contact_id:'',
                date:new Date(),
                estimated_date:new Date(),
                code:'',
                reference:'',
                sub_total:0,
                vat:0,
                dicount:0,
                total:0,
                currency_id:"",
                amount_tax:""
                
            }
        }
        this.addRow = this.addRow.bind(this);
        this.handleDateChange = this.handleDateChange.bind(this);
        this.handleHistoryClick= this.handleHistoryClick.bind(this);
    }

    componentDidMount () {
        axios.get('http://127.0.0.1:8000/api/invoices/1',{
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjMyMjdjMmQ4MDNkN2UxZTZhZTQ0YTAwMzk3ZjkwMjQ1MGQ4ZTI0Yzg5ZmM3NDVhOTEyMjcxNGQ0NzI1MzY2NDcwZTY5YzkzZDQ0YWMwYzg0In0.eyJhdWQiOiIyIiwianRpIjoiMzIyN2MyZDgwM2Q3ZTFlNmFlNDRhMDAzOTdmOTAyNDUwZDhlMjRjODlmYzc0NWE5MTIyNzE0ZDQ3MjUzNjY0NzBlNjljOTNkNDRhYzBjODQiLCJpYXQiOjE1NTI2NDA1NTMsIm5iZiI6MTU1MjY0MDU1MywiZXhwIjoxNTUzOTM2NTUyLCJzdWIiOiI5MSIsInNjb3BlcyI6W119.b8KQU7gcN0zuDo_G5roYTP0WoysJVMB5zSuNSJQtgQ9DCebvSdu3Zm0KgwyCjqsiv_3UWec_zFB9R2IGcL1i2x-6j7lQeth4FV_yqyLsGzquD4JdElpabhghRlpFsZfZFHkVtqTyUgthweXjtdAkjoU_ORqKp_8K_2D3UGQ8x_Rm_dN1iVFF5URd37VKzgVsYCOugMP3YnWx62NNZHBG8XEO2geyZV5uU70Kz6TFiVwoD8QrVaZA7-H_cGf1kyJ8U_1DQ-g7p0y4pDM0lK_Hj_RwCqVGIMl2YvFNhwP4O0hDuCR0JViwLDkGn4UAu73ME3to8QxhESVulORJyptPKsa5shY3hizBjT-ZpO5hMzzx6sTnk4LkrfUzSYrTUu2LnkXDfw2RDznWYXCxiyU65YJPtUEuG7OJ3Yt8qrRsn3CHSdgyM3A4FvbI7z0MiktzaGZfDWs7oen7WlpE_UJn73P-4Cjp97tWa3ExqwStvtN9pmV7FmrH3G5DQW_P3bqMzzLV9Y1PIHOauCM_NyW-eUjImpVrhQHZ8ZCFw6k9BuyXc6-BF74CosIW277GzzMHtBu6dZ0VBDrzS0ZJrVPAQUtFlrPEZZd1K8k2MPr4Bp-pFxHh4RcwkUvFhkv1XbapjEltWYGcpJZfvs9MYV9EWC_6RhOnr4M-Sjv-Mb8ihjI', 
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(response => {
            var result = response.data;
            var data= {
                items:result.data.items,
                id:result.data.id,
                contact_id:result.data.contact_id,
                date:new Date(result.data.date),
                estimated_date:new Date(result.data.estimated_date),
                code:result.data.code,
                reference:result.data.reference,
                sub_total:result.data.sub_total,
                vat:result.data.vat,
                dicount:result.data.dicount,
                total:result.data.total,
                currency_id:result.data.currency_id,
                amount_tax:result.data.amount_tax,
                ItemList:result.data.ItemList
            
            }
            
            this.setState({
                data: data
            })
            console.log(data);
        }).catch((error) => {
            console.log(error);
        });
    }

    handleDateChange(date) {
        console.log(this);
//        console.log(props);
        var data1 = this.state.data;
        if(this.name = 'date')
            data1.date = date;
        else
            data1.estimated_date = date;
        this.setState({
            data: data1
        })
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
        data1.sub_total =   subTotal;
        data1.vat       =   totalTax;
        data1.discount  =   totalDicount;
        data1.total     =   Total;
        this.setState({ data:  data1});
    }
    removeRow(val){
        var data1 = this.state.data;
        data1.items.splice(val,1);
        this.setState({ data:  data1});
        this.calculator(val);
    }

    saveData(){
        axios.post('http://127.0.0.1:8000/api/invoices/1/save',{ 
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjMyMjdjMmQ4MDNkN2UxZTZhZTQ0YTAwMzk3ZjkwMjQ1MGQ4ZTI0Yzg5ZmM3NDVhOTEyMjcxNGQ0NzI1MzY2NDcwZTY5YzkzZDQ0YWMwYzg0In0.eyJhdWQiOiIyIiwianRpIjoiMzIyN2MyZDgwM2Q3ZTFlNmFlNDRhMDAzOTdmOTAyNDUwZDhlMjRjODlmYzc0NWE5MTIyNzE0ZDQ3MjUzNjY0NzBlNjljOTNkNDRhYzBjODQiLCJpYXQiOjE1NTI2NDA1NTMsIm5iZiI6MTU1MjY0MDU1MywiZXhwIjoxNTUzOTM2NTUyLCJzdWIiOiI5MSIsInNjb3BlcyI6W119.b8KQU7gcN0zuDo_G5roYTP0WoysJVMB5zSuNSJQtgQ9DCebvSdu3Zm0KgwyCjqsiv_3UWec_zFB9R2IGcL1i2x-6j7lQeth4FV_yqyLsGzquD4JdElpabhghRlpFsZfZFHkVtqTyUgthweXjtdAkjoU_ORqKp_8K_2D3UGQ8x_Rm_dN1iVFF5URd37VKzgVsYCOugMP3YnWx62NNZHBG8XEO2geyZV5uU70Kz6TFiVwoD8QrVaZA7-H_cGf1kyJ8U_1DQ-g7p0y4pDM0lK_Hj_RwCqVGIMl2YvFNhwP4O0hDuCR0JViwLDkGn4UAu73ME3to8QxhESVulORJyptPKsa5shY3hizBjT-ZpO5hMzzx6sTnk4LkrfUzSYrTUu2LnkXDfw2RDznWYXCxiyU65YJPtUEuG7OJ3Yt8qrRsn3CHSdgyM3A4FvbI7z0MiktzaGZfDWs7oen7WlpE_UJn73P-4Cjp97tWa3ExqwStvtN9pmV7FmrH3G5DQW_P3bqMzzLV9Y1PIHOauCM_NyW-eUjImpVrhQHZ8ZCFw6k9BuyXc6-BF74CosIW277GzzMHtBu6dZ0VBDrzS0ZJrVPAQUtFlrPEZZd1K8k2MPr4Bp-pFxHh4RcwkUvFhkv1XbapjEltWYGcpJZfvs9MYV9EWC_6RhOnr4M-Sjv-Mb8ihjI', 
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data:this.state.data

        }).then(response => {
            console.log(response);
        }).catch((error) => {
            console.log(error);
        });

    }
    handleHistoryClick(val)
    {
        console.log(val.type);
    }
    itemAdd(selection,id){
        var data1 = this.state.data;
        if(data1.items[id].item_id != selection.id){
            data1.items[id].item_id=selection.id;
            data1.items[id].description=selection.description;
            data1.items[id].unit_price=selection.unit_price;
            data1.items[id].discount=selection.discount;
            data1.items[id].quantity=selection.quantity;
            data1.items[id].account_id=selection.account_id;
            data1.items[id].tax_id=selection.tax_id;
            data1.items[id].tax_rate=selection.tax_rate;
            data1.items[id].tax=selection.tax;
            data1.items[id].amount=selection.amount;
            this.setState({ data:  data1});
            this.calculator(id);
        }
        console.log(data1);

    }
    handleChange(e){
        var curent = e.target.innerHTML;
        if(curent != e.target.defaultValue){
            var data1 = this.state.data;
            if(e.target.lang == 'discount')
                data1.items[e.target.id].discount=curent;
            else if(e.target.lang == 'quantity')
                data1.items[e.target.id].quantity=curent;    
            else if(e.target.lang == 'unit_price')
                data1.items[e.target.id].unit_price=curent;
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
                                        <input type="text" name="contact_id" value={this.state.data.contact_id} onChange={()=>alert()} className="form-control" />
                                    </div>
                                </div>                                        
                                <div className="col-md-2"> 
                                    <div className="form-group">
                                        <label >Date</label>
                                        <DatePicker
                                            selected={this.state.data.date}
                                            onChange={(props)=>this.handleDateChange(this.state.data.date,'date')}
                                            className="form-control datepicker"
                                            dateFormat="yyyy-MM-dd"
                                            name="date" 
                                        />
                                    </div> 
                                </div>  
                                <div className="col-md-2"> 
                                    <div className="form-group">
                                        <label >Due Date</label>
                                        <DatePicker
                                            selected={this.state.data.estimated_date}
                                            onChange={()=>this.handleDateChange.bind(this)}
                                            className="form-control datepicker"
                                            dateFormat="yyyy-MM-dd"
                                            name="estimated_date" 
                                        />
                                    </div> 
                                </div>                                        
                                <div className="col-md-2"> 
                                    <div className="form-group">
                                        <label >Invoice Code</label>
                                        <input type="text" name="code" value={this.state.data.code}  onChange={()=>alert()}  className="form-control" />
                                    </div> 
                                </div>  
                                <div className="col-md-2">
                                    <div className="form-group">
                                        <label >Reference</label>
                                        <input type="text" name="reference" value={this.state.data.reference}  onChange={()=>alert()}  className="form-control" />
                                    </div> 
                                </div>                                        
                                <div className="col-md-2 ">
                                    <p className="test">
                                        <a href="#"><i className="la la-eye"></i> Preview</a>
                                    </p>
                                </div>                                     
                                
                            </div>
                            <hr />
                            <div className="row">
                                <div className="col-md-6 col-12">
                                <select name="currency_id"  value={this.state.data.currency_id}  onChange={()=>alert()}  className="form-control w200" >
                                    <option value="1">GBP British Pound</option>
                                    <option value="1">Add Currency</option>
                                </select>
                                </div>
                                <div className="col-md-6 col-12 fr">
                                    <label className="lablef">Amount are:</label>
                                    <select name="amount_tax" className="form-control w200"  onChange={()=>alert()}  value={this.state.data.amount_tax} >
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
                                                items= {this.state.data.ItemList}
                                                delRow={(val)=>this.removeRow(val)} 
                                                html={person.discount}
                                                handleHistoryClick={(selection)=>this.handleHistoryClick(selection)}
                                                emitChangeItem={(selection)=>this.itemAdd(selection,i)} 
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
                                            <a className="dropdown-item" href="new-html"> Add 5</a>
                                            <a className="dropdown-item" href="#"> Add 10</a>
                                            <a className="dropdown-item" href="#">Add 20</a>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="row">
                                        <div className="col-6">Sub total {(this.state.data.discount>0)?'(includes a discount of '+this.state.data.discount+')':''}</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.sub_total}  onChange={()=>alert()}  name="sub_total" />
                                            <p >{this.state.data.sub_total}</p>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-6">Total VAT</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.vat}  onChange={()=>alert()}  name="vat" />
                                            <p >{this.state.data.vat}</p>
                                        </div>
                                    </div>
                                    <div className="row in-total">
                                        <div className="col-6">Total</div>
                                        <div className="col-6" >
                                            <input type="hidden" value={this.state.data.total}  onChange={()=>alert()}  name="total" />
                                            <p >{this.state.data.total}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="dropdown">
                                        <button type="button" className="btn btn-primary btn-primary2 dropdown-toggle" onClick={()=>this.saveData()} data-toggle="dropdown">Save</button>
                                        <div className="dropdown-menu">
                                            <a className="dropdown-item" href="new-html"> Save as draft</a>
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

