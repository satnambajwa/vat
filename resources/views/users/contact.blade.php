@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
   <div class="content-body">
      <section>
         <div class="container">
            @if(!$isProfile)
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <p><a href="{{url('/contacts')}}">Contacts</a> > Add Contact</p>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div id="horizontal-form-layouts">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                       <h4 class="card-title" id="horz-layout-basic">{{($isProfile)?"Company Profile":"Contact Information"}}</h4>
                                    </div>
                                    <div class="card-content collpase show">
                                       <div class="card-body">

                                       
                                          {!! Form::open(array('route' =>'cupdate' ,'method'=>'post')) !!}
                                          {!! Form::hidden('_token',csrf_token()) !!}


                                             <div class="form-body">
                                                <input type="hidden" value={{$id}} name="id" />
                                                <input type="hidden" value={{$isProfile}} name="isProfile" />
                                                @if(!$isProfile)
                                                <a href="{{url('payments',$id)}}" class="form-group link fr">Add Payment</a>
                                                @endif
                                                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                                
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="contactname">Contact Name</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="contactname" class="form-control" placeholder="Contact Name" value="{{!empty($contact->contact_name)?$contact->contact_name:''}}" name="contact_name">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput1">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <a id="accountNoShow" href="JavaScript:void(0);">Add Account Number <i class="la la-plus"></i></a>
                                                      <input type="text" id="accountNo" class="form-control" placeholder="Account No." value="{{!empty($contact->account_number)?$contact->account_number:''}}" name="account_number">
                                                   </div>
                                                </div>
                                                <div id="addPerson">
                                                   @php
                                                   if(!empty($contact->persons))
                                                   foreach($contact->persons as $person){
                                                   @endphp
                                                   <div class="form-group row">
                                                      <input type="hidden" name="personId[]" value="{{(!empty($person->id))?$person->id:''}}" />
                                                      <label class="col-md-3 label-control" for="projectinput2">{{(!empty($person->is_primary))?'Primary':'Other'}} Person</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="First Name" value="{{(!empty($person->first_name))?$person->first_name:''}}" name="first_name[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" value="{{(!empty($person->last_name))?$person->last_name:''}}" name="last_name[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" value="{{(!empty($person->email))?$person->email:''}}" name="email[]">
                                                      </div>
                                                      <input type="hidden" name="is_primary[]" value="{{(!empty($person->is_primary))?$person->is_primary:0}}"/>
                                                   </div>
                                                   @php
                                                   }else{
                                                   @endphp
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput2">Primary Person</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="First Name" value="" name="first_name[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" value="" name="last_name[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" value="" name="email[]">
                                                      </div>
                                                      <input type="hidden" name="is_primary[]" value="1"/>
                                                   </div>
                                                   @php
                                                   }
                                                   @endphp
                                                </div>
                                                <div id="dummyPerson" class="hide">
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput2">Other Person</label>
                                                      <div class="col-md-5 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="First Name" name="first_name[]">
                                                      </div>
                                                      <div class="col-md-4 mx-auto">
                                                         <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="last_name[]">
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                      <div class="col-md-9 mx-auto">
                                                         <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email[]">
                                                      </div>
                                                      <input type="hidden" name="is_primary[]" value="0"/>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput1">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <a id="personAdd" href="JavaScript:void(0);">Add Another Person<i class="la la-plus"></i></a>
                                                   </div>
                                                </div>
                                                @php
                                                if(!empty($contact->phone))
                                                   $phone   =  explode('-',$contact->phone);
                                                else
                                                   $phone   =  array();
                                                if(!empty($contact->fax))
                                                   $fax   =  explode('-',$contact->fax);
                                                else
                                                   $fax= array();
                                                if(!empty($contact->mobile))
                                                   $mobile   =  explode('-',$contact->mobile);
                                                else
                                                   $mobile  =  array();
                                                if(!empty($contact->direct_dail))
                                                   $direct_dail   =  explode('-',$contact->direct_dail);
                                                else
                                                   $direct_dail   =  array();

                                                @endphp
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">Phone Number</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Country" value="{{!empty($phone[0])?$phone[0]:''}}" name="phone[]">
                                                   </div>
                                                   <div class="col-md-2 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Area" value="{{!empty($phone[1])?$phone[1]:''}}" name="phone[]">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Phone number" value="{{!empty($phone[2])?$phone[2]:''}}" name="phone[]">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">FAX</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Country" value="{{!empty($fax[0])?$fax[0]:''}}" name="fax[]">
                                                   </div>
                                                   <div class="col-md-2 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Area" value="{{!empty($fax[1])?$fax[1]:''}}" name="fax[]">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Phone number" value="{{!empty($fax[2])?$fax[2]:''}}" name="fax[]">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">Mobile</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Country" value="{{!empty($mobile[0])?$mobile[0]:''}}" name="mobile[]">
                                                   </div>
                                                   <div class="col-md-2 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Area" value="{{!empty($mobile[1])?$mobile[1]:''}}" name="mobile[]">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="mobile number" value="{{!empty($mobile[2])?$mobile[2]:''}}" name="mobile[]">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">Direct Dail</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Country" value="{{!empty($direct_dail[0])?$direct_dail[0]:''}}" name="direct_dail[]">
                                                   </div>
                                                   <div class="col-md-2 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Area" value="{{!empty($direct_dail[1])?$direct_dail[1]:''}}" name="direct_dail[]">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput4" class="form-control" placeholder="Direct dail number" value="{{!empty($direct_dail[2])?$direct_dail[2]:''}}" name="direct_dail[]">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Skype Name/Number</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Skype Name/Number" value="{{!empty($contact->skype)?$contact->skype:''}}" name="skype">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Website</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="https//:" value="{{!empty($contact->website)?$contact->website:''}}" name="website">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Postal Address</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" value="{{!empty($contact->address)?$contact->address:''}}" name="address">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Attention" value="{{!empty($contact->address1)?$contact->address1:''}}" name="address1">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <textarea name="address2" class="form-control" rows="5">{{!empty($contact->address2)?$contact->address2:''}}</textarea>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="City/Town" value="{{!empty($contact->city)?$contact->city:''}}" name="city">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-5 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="State/Region" value="{{!empty($contact->state)?$contact->state:''}}" name="state">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Pin Code" value="{{!empty($contact->postal_code)?$contact->postal_code:''}}" name="postal_code">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Country" value="{{!empty($contact->country)?$contact->country:''}}" name="country">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Street Address</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" value="{{!empty($contact->street_address)?$contact->street_address:''}}" name="street_address">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Attention" value="{{!empty($contact->street_address1)?$contact->street_address1:''}}" name="street_address1">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <textarea name="street_address2" class="form-control" rows="5" >{{!empty($contact->street_address2)?$contact->street_address2:''}}</textarea>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="City/Town" value="{{!empty($contact->street_city)?$contact->street_city:''}}"  name="street_city">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-5 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="State/Region" value="{{!empty($contact->street_state)?$contact->street_state:''}}" name="street_state">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Pin Code"  value="{{!empty($contact->street_postal_code)?$contact->street_postal_code:''}}" name="street_postal_code">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Country"  value="{{!empty($contact->street_country)?$contact->street_country:''}}" name="street_country">
                                                   </div>
                                                </div>
                                                <h4 class="form-section"><i class="ft-clipboard"></i>Financial Details
                                                   <small style="color: #666ee8;">All defaults can be overridden on individual transactions</small>
                                                </h4>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">Sales Settings</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select id="projectinput6" name="sales_amount_tax" class="form-control">
                                                         <option value="none" >None()</option>
                                                         <option value="Tax Inclusive" {{(!empty($contact->sales_amount_tax) && ($contact->sales_amount_tax == "Tax Inclusive"))?'selected':''}} >Tax Inclusive</option>
                                                         <option value="Tax Exclusive" {{(!empty($contact->sales_amount_tax) && ($contact->sales_amount_tax == "Tax Exclusive"))?'selected':''}} >Tax Exclusive </option>
                                                         <option value="No Tax"  {{(!empty($contact->sales_amount_tax) && ($contact->sales_amount_tax == "No Tax"))?'selected':''}}>No Tax</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select name="sales_account_id" class="form-control">
                                                         @foreach($accountGroup as $acount)
                                                            <option value="{{$acount->id}}" {{(!empty($contact->sales_account_id) && $acount->id==$contact->sales_account_id)?'selected':''}} >{{$acount->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">Purchase Settings</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select name="purchase_amount_tax" class="form-control">
                                                         <option value="none">None()</option>
                                                         <option value="Tax Inclusive" {{(!empty($contact->purchase_amount_tax) && ($contact->purchase_amount_tax == "Tax Inclusive"))?'selected':''}} >Tax Inclusive</option>
                                                         <option value="Tax Exclusive" {{(!empty($contact->purchase_amount_tax) && ($contact->purchase_amount_tax == "Tax Exclusive"))?'selected':''}} >Tax Exclusive </option>
                                                         <option value="No Tax"  {{(!empty($contact->purchase_amount_tax) && ($contact->purchase_amount_tax == "No Tax"))?'selected':''}}>No Tax</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select name="purchase_account_id" class="form-control">
                                                         @foreach($accountGroup as $acount)
                                                            <option value="{{$acount->id}}"  {{(!empty($contact->purchase_account_id) && $acount->id==$contact->purchase_account_id)?'selected':''}} >{{$acount->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput6">VAT</label>
                                                   <div class="col-md-5 mx-auto">
                                                      <select id="projectinput6" name="vat_eu_country_id" class="form-control">
                                                         <option value="1" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==1)?'selected':''}} >United Kingdom</option>
                                                         <option value="2" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==2)?'selected':''}}>India</option>
                                                         <option value="3" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==3)?'selected':''}}>USA</option>
                                                         <option value="4" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==4)?'selected':''}}>Austria</option>
                                                         <option value="5" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==5)?'selected':''}}>Belgium</option>
                                                         <option value="6" {{(!empty($contact->vat_eu_country_id)&&$contact->vat_eu_country_id==6)?'selected':''}}>Bulgaria</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" class="form-control" placeholder="0000000" value="{{!empty($contact->vat_eu_num)?$contact->vat_eu_num:''}}" name="vat_eu_num"> 
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">Default Sales VAT</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select id="projectinput6" name="default_sale_account_id" class="form-control">
                                                      <option value="" disabled="">Default Sales VAT</option>
                                                         @foreach($taxes as $tax)
                                                            <option value="{{$tax->id}}" {{(!empty($contact->default_sale_account_id) && $tax->id==$contact->default_sale_account_id)?'selected':''}}> {{$tax->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput5">Default Purchase VAT</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select id="projectinput6" name="default_purchase_account_id" class="form-control">
                                                         <option value="" disabled="">Default Purchase VAT</option>
                                                         @foreach($taxes as $tax)
                                                            <option value=" {{$tax->id}}" {{(!empty($contact->default_purchase_account_id) && $tax->id==$contact->default_purchase_account_id)?'selected':''}}> {{$tax->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Company Registration Number
                                                   </label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="eg.000000000" value="{{!empty($contact->company_registration_number)?$contact->company_registration_number:''}}" name="company_registration_number">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Sales Discount %
                                                   </label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="%"  value="{{!empty($contact->sales_discount_per)?$contact->sales_discount_per:''}}" name="sales_discount_per">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput7">Currency</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <select id="projectinput7" name="currency_id" class="form-control">
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
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Bank Account Number" value="{{!empty($contact->bank_account_number)?$contact->bank_account_number:''}}" name="bank_account_number">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Bank Account Name" value="{{!empty($contact->bank_account_name)?$contact->bank_account_name:''}}" name="bank_account_name">
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;
                                                   </label>
                                                   <div class="col-md-9 mx-auto">
                                                   <input type="text" id="projectinput3" class="form-control" placeholder="Details" value="{{!empty($contact->bank_detials)?$contact->bank_detials:''}}"  name="bank_detials">
                                                   </div>
                                                   </div>

                                             <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput7">Bill Due Date</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <div class="row">
                                                         <div class="col-md-2">
                                                            <input type="text" class="form-control" placeholder="Due" value="{{!empty($contact->bills_due_date)?$contact->bills_due_date:''}}" name="bills_due_date" />
                                                         </div>
                                                         
                                                         <div class="col-md-10">
                                                            <select id="projectinput7" name="bills_due_date_suggestions" class="form-control">
                                                            <option value="of the following month" {{(!empty($contact->bills_due_date_suggestions)&&$contact->bills_due_date_suggestions=='of the following month')?'selected':''}}>of the following month</option>
                                                               <option value="day(s) after the bill date" {{(!empty($contact->bills_due_date_suggestions)&&$contact->bills_due_date_suggestions=='day(s) after the bill date')?'selected':''}}>day(s) after the bill date</option>
                                                               <option value="day(s) after the end of the bill month" {{(!empty($contact->bills_due_date_suggestions)&&$contact->bills_due_date_suggestions=='day(s) after the end of the bill month')?'selected':''}}>day(s) after the end of the bill month</option>
                                                               <option value="of the current month" {{(!empty($contact->bills_due_date_suggestions)&&$contact->bills_due_date_suggestions=='of the current month')?'selected':''}}>of the current month</option>
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
                                                            <input type="text" class="form-control" placeholder="Due" value="{{!empty($contact->invoices_due_date)?$contact->invoices_due_date:''}}"  name="invoices_due_date" />
                                                         </div>
                                                         
                                                         <div class="col-md-10">
                                                            <select id="projectinput7" name="invoices_due_date_suggestions" class="form-control">
                                                               <option value="of the following month" {{(!empty($contact->invoices_due_date_suggestions)&&$contact->invoices_due_date_suggestions=='of the following month')?'selected':''}}>of the following month</option>
                                                               <option value="day(s) after the bill date" {{(!empty($contact->invoices_due_date_suggestions)&&$contact->invoices_due_date_suggestions=='day(s) after the bill date')?'selected':''}}>day(s) after the bill date</option>
                                                               <option value="day(s) after the end of the bill month" {{(!empty($contact->invoices_due_date_suggestions)&&$contact->invoices_due_date_suggestions=='day(s) after the end of the bill month')?'selected':''}}>day(s) after the end of the bill month</option>
                                                               <option value="of the current month" {{(!empty($contact->invoices_due_date_suggestions)&&$contact->invoices_due_date_suggestions=='of the current month')?'selected':''}}>of the current month</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>  
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">VAT Network Key
                                                   </label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="key" value="{{!empty($contact->xero_network_key)?$contact->xero_network_key:''}}"  name="xero_network_key">
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
<script language="JavaScript" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function() {   
   $("#personAdd").click(function(){
      $('#addPerson').append($('#dummyPerson').html());
   });
   $("#accountNo").hide();
   $("#accountNoShow").click(function(){
      $("#accountNo").show();
      $("#accountNoShow").hide();
   });
});

</script>
@endsection