@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">


   
    <form method="post" action="{{url('/invoice')}}",>
        <section >
            <div class="container in-border">
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group ui-widget">
                        <label >To</label>
                        <input type="text" name="contact_id" class="form-control" >
                        </div>
                        </div>                                        
                    <div class="col-md-2"> 
                    <div class="form-group">
                        <label >Date</label>
                        <input type="text" name="date" class="form-control datepicker" >
                        </div> 
                        </div>  
                    <div class="col-md-2"> 
                        <div class="form-group">
                        <label >Due Date</label>
                        <input type="text" name="estimated_date"  class="form-control datepicker" >
                        </div> 
                    </div>                                        
                    <div class="col-md-2"> 
                        <div class="form-group">
                        <label >Invoice#</label>
                        <input type="text" name="code" class="form-control" >
                        </div> 
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                        <label >Reference</label>
                        <input type="text" name="reference" class="form-control" >
                        </div> 
                    </div>                                        
                    <div class="col-md-2 ">
                    <p style="text-align: end; padding-top: 25px;font-size: 1.2rem;">
                        <a href="#"><i class="la la-eye"></i> Preview</a></p>
                    </div>                                     
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-12">
                    <select name="currency_id" class="form-control" style="width: 200px;">
                        <option>GBP British Pound</option>
                        <option>Add Currency</option>
                    </select>
                    </div>
                    <div class="col-md-6 col-12" style="float:right">
                        <label style="float:left;width:20%">Amount are:</label>
                        <select name="amount_tax" class="form-control" style="width: 200px;">
                                <option vale="Tax Exclusive">Tax Exclusive</option>
                                <option vale="Tax Inclusive">Tax Inclusive</option>
                                <option vale="No Tax">No Tax</option>
                            </select>
                    </div>
                </div>

                <div class="row tbg">
                    <div class="col-md-12 table-responsive">
                        <div id="table" class="table-editable">

                            <table class="table table-bordered table-responsive-md text-center">
                                <tr>
                                    <th class="text-center">Item </th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Disc %</th>
                                    <th class="text-center">Account</th>
                                    <th class="text-center">Tax rate</th>
                                    <th class="text-center">Amount GBP</th>
                                    <th class="text-center">&nbsp;</th>

                                </tr>
                                <tr>
                                    <td class="pt-3-half" contenteditable="true"><input type="text" class="client"/></td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">
                                    <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- This is our clonable table line -->
                                <tr>
                                    <td class="pt-3-half" contenteditable="true"><input type="text" class="client"/></td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true"> <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                        </button></td>

                                </tr>
                                <!-- This is our clonable table line -->
                                <tr>
                                    <td class="pt-3-half client" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true"> <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                        </button></td>
                                </tr>
                                <!-- This is our clonable table line -->
                                <tr class="hide">
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true">&nbsp;</td>
                                    <td class="pt-3-half" contenteditable="true"> 
                                        <button type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:2%; margin-bottom: 2%;">
                    <div class="col-md-6">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">
                            Add a new line
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="new-invoice.html"> Add 5</a>
                                <a class="dropdown-item" href="#"> Add 10</a>
                                <a class="dropdown-item" href="#">Add 20</a>
                                </div>
                                </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6">Sub total</div>
                            <div class="col-6" >
                                <input type="hidden" value="0.00" name="sub_total">
                                <p >0.00</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">VAT</div>
                            <div class="col-6" >
                                <input type="hidden" value="0.00" name="sub_total">
                                <p >0.00</p>
                            </div>
                        </div>
                        <div class="row in-total">
                            <div class="col-6">Total</div>
                                <div class="col-6" >
                                    <input type="hidden" value="0.00" name="sub_total">
                                    <p >0.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">Save</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="new-invoice.html"> Save as draft</a>
                                    <a class="dropdown-item" href="#"> Save(continue editing)</a>
                                    <a class="dropdown-item" href="#">Save & submit for approval</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-2">           <div class="dropdown">
                            <button type="submit" class="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">Approval</button>
                            <!--
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"> Approve</a>
                                <a class="dropdown-item" href="#">Approve & add another</a>
                                <a class="dropdown-item" href="#">Approve & print</a>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-primary2">Cancel</button>
                    </div>
                </div>
                
            </div>
        </section>
        
    </form>    
    </div>
</div>
@endsection