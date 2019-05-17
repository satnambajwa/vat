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
                                    <h1>Payments</h1>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{url('/payment')}}"> <button type="button" class="btn btn-success">Add Payment</button></a>
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
                                    <div class="table-responsive">
                                        <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" style="border: 1px solid #ccc;" >
                                            <thead>
                                                <tr role="row">
                                                <th  tabindex="0"> Payment Type</th>
                                                    <th  tabindex="0"> Cradit Account</th>
                                                    <th  tabindex="0"> Cradit Amount</th>
                                                    <th  tabindex="0"> Debit Account</th>
                                                    <th  tabindex="0"> Debit Amount</th>
                                                    <th  tabindex="0"> Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <td>
                                                    {{$payment->paymentType->name}}
                                                </td>
                                                <td>{{$payment->crAccount->name}}</td>
                                                <td>
                                                    <a href="{{url('/payment',$payment->id)}}">
                                                        {{$payment->cr_amount}}
                                                    </a>    
                                                </td>
                                                <td>{{$payment->drAccount->name}}</td>
                                                <td>{{$payment->dr_amount}}</td>
                                                <td>{{$payment->created_at}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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