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
                            <div class="row">
                                <div class="col-md-8">
                                    <h1>Payment</h1>
                                </div>
                                
                            </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">                
                                    <div class="form-body">
                                        {!! Form::open(array('route' =>'sPayment' ,'method'=>'post')) !!}
                                        {!! Form::hidden('_token',csrf_token()) !!}
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="contactname">Date</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="contactname" autocomplete="false" class="form-control datepicker" placeholder="Date" value="{{!empty($payment->date)?$payment->date:''}}" name="date">
                                                   </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="paymentname1">Type</label>
                                                   <div class="col-md-9 mx-auto">
                                                        <select name="payment_types_id" class="form-control">
                                                            @foreach($payments as $pay)
                                                            <option value="{{$pay->id}}" {{(isset($payment->payment_types_id) && $payment->payment_types_id==$pay->id)?'selected="selected"':''}}>{{$pay->name}}</option>
                                                            @endforeach
                                                        </select>
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="paymentname1">Credit Account</label>
                                                   <div class="col-md-9 mx-auto">
                                                        <select name="cr_account_id" class="form-control">
                                                            @foreach($accounts as $pay)
                                                            <option value="{{$pay->id}}" {{(isset($payment->cr_account_id) && $payment->cr_account_id==$pay->id)?'selected="selected"':''}}>{{$pay->name}}</option>
                                                            @endforeach
                                                        </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="creditAmount">Credit Amount</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="creditAmount" autocomplete="false" class="form-control" placeholder="Credit Amount" value="{{!empty($payment->cr_amount)?$payment->cr_amount:''}}" name="cr_amount">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="paymentname1">Debit Account</label>
                                                   <div class="col-md-9 mx-auto">
                                                        <select name="dr_account_id" class="form-control">
                                                            @foreach($accounts as $pay)
                                                            <option value="{{$pay->id}}" {{(isset($payment->dr_account_id) && $payment->dr_account_id==$pay->id)?'selected="selected"':''}}>{{$pay->name}}</option>
                                                            @endforeach
                                                        </select>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="debitAmount">Debit Amount</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="debitAmount" autocomplete="false" class="form-control" placeholder="Debit Amount" readonly="readonly" value="{{!empty($payment->dr_amount)?$payment->dr_amount:''}}" name="dr_amount">
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="contactname">Comment</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" autocomplete="false" class="form-control" placeholder="Comments" value="{{!empty($payment->comment)?$payment->comment:''}}" name="comment">
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="hidden" name="id" value="{{!empty($payment->id)?$payment->id:''}}" />
                                                        <input type="hidden" name="currency_id" value="{{!empty($payment->currency_id)?$payment->currency_id:1}}" />
                                                        <input type="hidden" name="contact_id" value="{{!empty($payment->contact_id)?$payment->contact_id:$id}}" />
                                                        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                                                    </div>
                                                </div>
                                        {!! Form::close() !!}
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
    $("#creditAmount").focusout(function(){
        var val = $(this).val();
        console.log(val);
        $("#debitAmount").val(val);
    });
});
</script>
@endsection