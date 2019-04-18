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
                                    <h1>Contacts</h1>
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
                                                   <label class="col-md-3 label-control" for="contactname">Amount</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="contactname" class="form-control" placeholder="Amount" value="{{!empty($payment->amount)?$payment->amount:''}}" name="amount">
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-3 label-control" for="paymentname1">Type</label>
                                                   <div class="col-md-9 mx-auto">
                                                      <input type="text" id="paymentname1" class="form-control" placeholder="Type" value="{{!empty($payment->type)?$payment->type:''}}" name="type">
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

@endsection