@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
      <div class="content-body">
         <section>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <p><a href="{{url('/contacts')}}">Contacts</a> > Add Contact</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <div id="horizontal-form-layouts">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="card">
                                       <div class="card-header">
                                          <h4 class="card-title" id="horz-layout-basic">Contact Information
                                          </h4>
                                       </div>
                                       <div class="card-content collpase show">
                                          <div class="card-body">

                                            
                                             {!! Form::open(array('route' =>'cupdate' ,'method'=>'post')) !!}
                                             {!! Form::hidden('_token',csrf_token()) !!}


                                                <div class="form-body">
                                                   <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="contactname">Contact Name</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="contactname" class="form-control" placeholder="Contact Name" name="contact_name">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput1">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <a href="#">Add Account Number <i class="la la-plus"></i></a>
                                                         <input type="text" id="accountNo" class="form-control hide" placeholder="Account No." name="account_number">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput2">Primary Person</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="First Name" name="first_name">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="last_name">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
                                                      </div>
                                                      <input type="hidden" name="is_primary" value="1"/>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput1">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <a href="#">Add Another Person</a>
                                                         <a href="#"><i class="la la-plus"></i></a>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput4">Phone Number</label>
                                                      <div class="col-md-3 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Country" name="phone[]">
                                                      </div>
                                                      <div class="col-md-2 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Area" name="phone[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Phone number" name="phone[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput4">FAX</label>
                                                      <div class="col-md-3 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Country" name="fax[]">
                                                      </div>
                                                      <div class="col-md-2 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Area" name="fax[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Phone number" name="fax[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput4">Mobile</label>
                                                      <div class="col-md-3 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Country" name="mobile[]">
                                                      </div>
                                                      <div class="col-md-2 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Area" name="mobile[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="mobile number" name="mobile[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput4">Direct Dail</label>
                                                      <div class="col-md-3 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Country" name="direct_dail[]">
                                                      </div>
                                                      <div class="col-md-2 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Area" name="direct_dail[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput4" class="form-control" placeholder="Direct dail number" name="direct_dail[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Skype Name/Number</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Skype Name/Number" name="skype">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Website</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="https//:" name="website">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Postal Address</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" name="address">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Attention" name="address1">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <textarea name="address2" class="form-control" rows="5"></textarea>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="City/Town" name="city">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="State/Region" name="state">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Pin Code" name="postal_code">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Country" name="country">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Street Address</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" name="street_adress">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Attention" name="street_adress1">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <textarea name="street_adress2" class="form-control" rows="5"></textarea>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="City/Town" name="street_city">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="State/Region" name="street_state">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Pin Code" name="street_postal_code">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Country" name="street_country">
                                                      </div>
                                                   </div>
                                                   <h4 class="form-section"><i class="ft-clipboard"></i>Financial Details
                                                      <small style="color: #666ee8;">All defaults can be overridden on individual transactions</small>
                                                   </h4>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">Sales Settings</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="sales_amount_tax" class="form-control">
                                                            <option value="none" selected="" disabled="">None()</option>
                                                            <option value="design">Tax Inclusive</option>
                                                            <option value="development">Tax Exclusive </option>
                                                            <option value="illustration">No Tax</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="sales_account_id" class="form-control">
                                                            <option value="none" selected="" disabled="">Revenue</option>
                                                            <option value="200">200 - Sales</option>
                                                            <option value="500">500 - Sales</option>
                                                            <option value="700">700 - Sales</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">Purchase Settings</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="purchase_amount_tax" class="form-control">
                                                            <option value="none" selected="" disabled="">None()</option>
                                                            <option value="Inclusive">Tax Inclusive</option>
                                                            <option value="Exclusive">Tax Exclusive </option>
                                                            <option value="No Tax">No Tax</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="purchase_account_id" class="form-control">
                                                            <option value="none" selected="" disabled="">Revenue</option>
                                                            <option value="design">200 - Sales</option>
                                                            <option value="development">500 - Sales</option>
                                                            <option value="illustration">700 - Sales</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput6">VAT</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <select id="projectinput6" name="vat_eu_country_id" class="form-control">
                                                            <option value="" selected="" disabled="">Eu Country</option>
                                                            <option value="2">India</option>
                                                            <option value="3">United Kingdom</option>
                                                            <option value="4">Austria</option>
                                                            <option value="5">Belgium</option>
                                                            <option value="6">Bulgaria</option>
                                                         </select>
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" class="form-control" placeholder="0000000"  name="vat_eu_num"> 
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="default_sale_account_id" class="form-control">
                                                            <option value="none" selected="" disabled="">Default Sales VAT</option>
                                                            <option value="design">20% (VAT on Expenses)</option>
                                                            <option value="development">20% (VAT on Income)</option>
                                                            <option value="illustration">No VAT</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput6" name="default_purchase_account_id" class="form-control">
                                                            <option value="none" selected="" disabled="">Default Purchase VAT</option>
                                                            <option value="design">20% (VAT on Expenses)</option>
                                                            <option value="development">20% (VAT on Income)</option>
                                                            <option value="illustration">No VAT</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Company Registration Number
                                                      </label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="eg.000000000" name="company_registration_number">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Sales Discount %
                                                      </label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="%" name="sales_discount_per">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput7">Currency</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <select id="projectinput7" name="currency_id" class="form-control">
                                                            <option value="0" selected="" disabled="">Default Currency</option>
                                                            <option value="1">GBP</option>
                                                            <option value="2">INR</option>
                                                            <option value="">Add currency</option>
                                                         </select>
                                                      </div>
                                                   </div>

                                                      <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">Batch Payments
                                                      </label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Bank Account Number" name="bank_account_number">
                                                      </div>
                                                       <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="Bank Account Name" name="bank_account_name">
                                                      </div>
                                                   </div>

                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">&nbsp;
                                                      </label>
                                                      <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Details" name="bank_detials">
                                                      </div>
                                                        </div>

                                                  <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput7">Bill Due Date</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <div class="row">
                                                            <div class="col-md-2">
                                                               <input type="text" class="form-control" placeholder="Due" name="bills_due_date" />
                                                            </div>
                                                            
                                                            <div class="col-md-10">
                                                               <select id="projectinput7" name="bills_due_date_suggestions" class="form-control">
                                                                  <option value="1">of the following month</option>
                                                                  <option value="2">day(s) after the bill date</option>
                                                                  <option value="3">day(s) after the end of the bill month</option>
                                                                  <option value="4">of the current month</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>  

                                                     <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput7">Invoice Due Date</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <div class="row">
                                                            <div class="col-md-2">
                                                               <input type="text" class="form-control" placeholder="Due" name="invoices_due_date" />
                                                            </div>
                                                            
                                                            <div class="col-md-10">
                                                               <select id="projectinput7" name="invoices_due_date_suggestions" class="form-control">
                                                                  <option value="1">of the following month</option>
                                                                  <option value="2">day(s) after the bill date</option>
                                                                  <option value="3">day(s) after the end of the bill month</option>
                                                                  <option value="4">of the current month</option>
                                                               </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>  

                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">VAT Network Key
                                                      </label>
                                                      <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="key" name="xero_network_key">
                                                      </div>
                                                        </div>     

                                              
                                                   <div class="form-actions">
                                                      <button type="button" class="btn btn-warning mr-1"><i class="ft-x"></i> Cancel</button>
                                                      <!--<i class="la la-check-square-o"></i>-->
                                                      {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                                                   </div>
                                                   {!! Form::close() !!}
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
         </section>
         </div>
         </div>
@endsection