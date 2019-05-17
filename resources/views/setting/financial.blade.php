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
                                                
                                                <h4 class="form-section tax-heading"><i class="ft-user"></i> Financial settings</h4>
                                                
                                                <input type="hidden" value="{{!empty($company->id)?$company->id:''}}" name="id">
                                                
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">Financial year begins </label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" class="form-control datepicker" placeholder="Financial Year" value="{{!empty($company->financial_year)?$company->financial_year:''}}" name="financial_year">
                                                   </div>
                                                   <label class="col-md-3 label-control" for="projectinput4">Books beginning</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" class="form-control datepicker" placeholder="Formal Currency Name" value="{{!empty($company->book_begin_from)?$company->book_begin_from:''}}" name="book_begin_from">
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput4">Currency</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <select name="currency_id" id="currency_id" class="form-control">
                                                         @foreach($currency as $curr)
                                                            <option value="{{$curr->id}}" {{$company->currency_id==$curr->id?'selected="selected"':''}}>{{$curr->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Currency Symbol" readonly="readonly" id="currency_symbol" value="{{!empty($company->currency->currency_symbol)?$company->currency->currency_symbol:''}}" name="currency_symbol">
                                                   </div>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Formal Currency Name" readonly="readonly" id="formal_currency_name" value="{{!empty($company->currency->formal_currency_name)?$company->currency->formal_currency_name:''}}" name="formal_currency_name">
                                                   </div>
                                                </div>
                                                <hr/>
                                                @php
                                                if(!empty($company->phone))
                                                   $phone   =  explode('-',$company->phone);
                                                else
                                                   $phone   =  array();
                                                if(!empty($company->fax))
                                                   $fax   =  explode('-',$company->fax);
                                                else
                                                   $fax= array();
                                                if(!empty($company->mobile))
                                                   $mobile   =  explode('-',$company->mobile);
                                                else
                                                   $mobile  =  array();
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
                                                   <label class="col-md-3 label-control" for="projectinput3">Email</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Email" value="{{!empty($company->email)?$company->email:''}}" name="email">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Website</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="https//:" value="{{!empty($company->website)?$company->website:''}}" name="website">
                                                   </div>
                                                </div>
                                                <hr/>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">Address</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Find Address" value="{{!empty($company->address)?$company->address:''}}" name="address">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="projectinput3">&nbsp;</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="projectinput3" class="form-control" placeholder="Attention" value="{{!empty($company->address1)?$company->address1:''}}" name="address1">
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
                                                   <label class="col-md-3 label-control" for="projectinput4">Show in millions</label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="checkbox" class="form-control"  value="1" {{!empty($company->show_in_millions)?'checked="checked"':''}}name="show_in_millions">
                                                   </div>
                                                   <label class="col-md-3 label-control" for="projectinput4">Decimal </label>
                                                   <div class="col-md-3 mx-auto">
                                                      <input type="text" class="form-control" placeholder="Decimal" value="{{!empty($company->decimal_no)?$company->decimal_no:''}}" name="decimal_no">
                                                   </div>
                                                </div>


                                                <div class="form-actions">
                                                   <button type="button" class="btn btn-danger mr-1"><i class="ft-x"></i> Cancel</button>
                                                   {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
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
var currency    =   JSON.parse('{!! json_encode($currency) !!}');
$(document).ready(function(){
   $("#currency_id").change(function(){
      var cur = currency.find( fruit =>{
         if(fruit.id == $(this).val()){
            return fruit;
         }
      });
      $("#currency_symbol").val(cur.currency_symbol);
      $("#formal_currency_name").val(cur.formal_currency_name);
   });
});

</script>
@endsection