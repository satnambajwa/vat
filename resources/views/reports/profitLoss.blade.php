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
                                <h2 style="color: #459211;">Profit and Loss</h2>
                                <h4>{{Auth::user()->name}}</h4>
                            </div>
                        </div>
                        <div style="margin-top:40px"></div>
                        @php
                            $gprofit    =   0;
                            $nprofit     =   0;
                        @endphp
                        <div class="row">
                        <div class="col-md-6" >
                                @foreach($Expenses as $key=>$payment)
                                    @php
                                    if($nprofit==0){
                                    @endphp 
                                    <div class="row bbg ">
                                        <div class="col-md-6 pd15">{{$key}}</div>
                                        <div class="col-md-6 pd12 pd13">{{date('d M,Y')}}</div>
                                    </div>
                                    @php
                                    }
                                    $nprofit    +=   $payment;
                                    @endphp
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">{{$key}}</div>
                                        <div class="col-md-6 pd10">{{'('.$payment.')'}}</div>
                                    </div>
                                    
                                @endforeach
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Total</div>
                                        <div class="col-md-6 pd10">{{'('.$nprofit.')'}}</div>
                                    </div>
                            </div> 
                            <div class="col-md-6" >
                                @foreach($Revenue as $key=>$payment)
                                    @php
                                    if($gprofit==0){
                                    @endphp 
                                    <div class="row bbg ">
                                        <div class="col-md-6 pd15">{{$key}}</div>
                                        <div class="col-md-6 pd12 pd13">{{date('d M,Y')}}</div>
                                    </div>
                                    @php
                                    }
                                    $gprofit    +=   $payment;
                                    @endphp
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">{{$key}}</div>
                                        <div class="col-md-6 pd10">{{$payment}}</div>
                                    </div>
                                @endforeach
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Total</div>
                                        <div class="col-md-6 pd10">{{$gprofit.''}}</div>
                                    </div>
                            </div>
                            
                        </div>

                        <div class="row bbg ">
                            <div class="col-md-6 pd15">Gross Profit</div>
                            <div class="col-md-6 pd12 pd13">{{$gprofit-$nprofit}}</div>
                        </div>
                        <div class="row bbg ">
                            <div class="col-md-6 pd15">Net Profit</div>
                            <div class="col-md-6 pd12 pd13">{{$gprofit-$nprofit}}</div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</div>
@endsection