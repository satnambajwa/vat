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
                                <div class="col-md-2">
                                    <a href="{{url('/payment')}}"> <button type="button" class="btn btn-success">Add Contacts</button></a>
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
                                                    <th  tabindex="0"> Payment Amount</th>
                                                    <th  tabindex="0"> Type</th>
                                                    <th  tabindex="0"> Date</th>
                                                    <th  tabindex="0"> Contact</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $payment)
                                            <tr>
                                                <td>
                                                <a href="{{url('/payment',$payment->id)}}">
                                                    {{$payment->amount}}
                                                </a>    
                                                </td>
                                                <td>{{$payment->type}}</td>
                                                <td>{{$payment->created_at}}</td>
                                                <td>{{$payment->contact->contact_name}}</td>
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