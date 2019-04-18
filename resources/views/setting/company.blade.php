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
                        <div id="horizontal-form-layouts">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="card">
                                   
                                    <div class="card-content collpase show">
                                       <div class="card-body">

                                       
                                          {!! Form::open(array('route' =>'cupdate' ,'method'=>'post')) !!}
                                          {!! Form::hidden('_token',csrf_token()) !!}


                                             <div class="form-body">
                                                
                                                <h4 class="form-section"><i class="ft-user"></i> Company settings</h4>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="companyname">Company Name</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="companyname" class="form-control" placeholder="Company Name" value="{{!empty($company->name)?$company->name:''}}" name="name">
                                                   </div>
                                                </div>
                                               
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
                                                   <label class="col-md-3 label-control" for="projectinput7">Currency</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <select id="projectinput7" name="currency_id" class="form-control">
                                                         <option value="1">GBP</option>
                                                         <option value="2">INR</option>
                                                         <option value="">Add currency</option>
                                                      </select>
                                                   </div>
                                                   <label class="col-md-3 label-control">Currency Symbol</label>
                                                   <div class="col-md-3 mx-auto">
                                                   <input type="text" class="form-control" placeholder="Currency Symbol" value="{{!empty($contact->currency_symbol)?$contact->currency_symbol:''}}" name="currency_symbol[]">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput7">Base Currency</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <select id="projectinput7" name="currency_id" class="form-control">
                                                         <option value="1">GBP</option>
                                                         <option value="2">INR</option>
                                                         <option value="">Add currency</option>
                                                      </select>
                                                   </div>
                                                   <label class="col-md-3 label-control">Base Currency Symbol</label>
                                                   <div class="col-md-3 mx-auto">
                                                   <input type="text" class="form-control" placeholder="Currency Symbol" value="{{!empty($contact->currency_symbol)?$contact->currency_symbol:''}}" name="currency_symbol[]">
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
                                                      <textarea name="address1" class="form-control" rows="5">{{!empty($contact->address1)?$contact->address1:''}}</textarea>
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