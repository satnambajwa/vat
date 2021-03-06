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
                                          {!! Form::open(array('route' =>'compSave' ,'method'=>'post')) !!}
                                          {!! Form::hidden('_token',csrf_token()) !!}
                                             <div class="form-body">
                                             <input type="hidden" value="{{!empty($company->id)?$company->id:''}}" name="id">
                                                <h4 class="form-section"><i class="ft-user"></i> Company settings</h4>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="companyname">Company Name</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="companyname" class="form-control" placeholder="Company Name" value="{{!empty($company->name)?$company->name:''}}" name="name">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control">Financial Year</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control datepicker" placeholder="Financial Year" value="{{!empty($company->financial_year)?$company->financial_year:''}}" name="financial_year">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >Book Begin From</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control datepicker" placeholder="Book Begin From" value="{{!empty($company->book_begin_from)?$company->book_begin_from:''}}" name="book_begin_from">
                                                   </div>
                                                </div>


                                                
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >GST Number</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control" placeholder="GST Number" value="{{!empty($company->gst_number)?$company->gst_number:''}}" name="gst_number">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >Pan Number</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Pan Number" value="{{!empty($company->pan_number)?$company->pan_number:''}}" name="pan_number">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >Tan Number</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Tan Number" value="{{!empty($company->tan_number)?$company->tan_number:''}}" name="tan_number">
                                                   </div>
                                                </div>



                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >Decimal</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Decimal" value="{{!empty($company->decimal_no)?$company->decimal_no:''}}" name="decimal_no">
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
                                                   <div class="col-md-9 mx-auto">
                                                      <select id="projectinput7" name="currency_id" class="form-control">
                                                         @foreach($currencies as $currency)
                                                         <option value="{{$currency->id}}" {{($currency->id==$company->currency_id)?'selected="selected"':''}} >{{$currency->formal_currency_name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" >Mailing Name</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Mailing Name" value="{{!empty($company->mail_name)?$company->mail_name:''}}" name="mail_name">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Postal Address</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" value="{{!empty($company->address)?$company->address:''}}" name="address">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <textarea name="address1" class="form-control" rows="5">{{!empty($company->address1)?$company->address1:''}}</textarea>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="City/Town" value="{{!empty($company->city)?$company->city:''}}" name="city">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-5 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="State/Region" value="{{!empty($company->state)?$company->state:''}}" name="state">
                                                   </div>
                                                   <div class="col-md-4 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Pin Code" value="{{!empty($company->postal_code)?$company->postal_code:''}}" name="postal_code">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Country" value="{{!empty($company->country)?$company->country:''}}" name="country">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control">Show In Millions</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="checkbox" class="form-control" value="1" {{!empty($company->show_in_millions)?'checked="checked"':''}} name="show_in_millions">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control">Is Current</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="checkbox" class="form-control" value="1" {{!empty($company->is_current)?'checked="checked"':''}} name="is_current">
                                                   </div>
                                                </div>

                                                <div class="form-actions">
                                                   {!! Form::reset('Cancel', array('class' => 'btn btn-warning mr-1')) !!}
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