
@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="container">
<div class="content-wrapper">
    <div class="content-body">
        <div class="row">
            <div class="col-md-10 offset-md-1">
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Tax Report (Taxes by Tax Component)</h2>
                                <h4>{{Auth::user()->name}}</h4>
                            </div>
                        </div>
                        <div style="margin-top:40px"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table-bordered" style="width: 100%;">
                                    <tbody>
                                    @php
                                        $total =   0;
                                    @endphp
                                    @foreach($lists as $key=>$items)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>
                                            <div class="col-md-12">
                                            @foreach($items as $item)
                                                <div class="row bbg">
                                                    <div class="col-md-3 col-ryt">{{$item['tax']}}</div>
                                                    <div class="col-md-3 col-ryt">{{$item['value']}}</div>
                                                    <div class="col-md-3 col-ryt">{{$item['amount']}}</div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $ctotal=   ($item['amount']*$item['value'])/100;
                                                            $total =   $total + $ctotal;
                                                        @endphp
                                                        {{$ctotal}}
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td>Total Tax Received</td>
                                            <td>{{$total}}</td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="table-bordered" style="width: 100%;">
                                    <tbody>
                                    
                                    @php
                                        $ktotal =   0;
                                    @endphp
                                    @foreach($klists as $key=>$items)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>
                                            <div class="col-md-12">
                                            @foreach($items as $item)
                                                <div class="row bbg">
                                                    <div class="col-md-3 col-ryt">{{$item['tax']}}</div>
                                                    <div class="col-md-3 col-ryt">{{$item['value']}}</div>
                                                    <div class="col-md-3 col-ryt">{{$item['amount']}}</div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $ctotal=   ($item['amount']*$item['value'])/100;
                                                            $ktotal =   $ktotal + $ctotal;
                                                        @endphp
                                                        {{$ctotal}}
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td>Total Tax Paid </td>
                                            <td>{{$ktotal}}</td>
                                        
                                        </tr>


                                        <tr>
                                            <td>Rmaining Tax To Pay</td>
                                            <td>{{$total-$ktotal}}</td>
                                        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection