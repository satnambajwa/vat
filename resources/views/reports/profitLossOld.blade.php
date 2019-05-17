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
                                @foreach($purchase as $key=>$item)
                                    @php
                                            $nprofit    +=   $item;
                                    @endphp 
                                    <div class="row bbg ">
                                        <div class="col-md-6 pd15">Cost of Sales</div>
                                        <div class="col-md-6 pd12 pd13">{{date('d M,Y')}}</div>
                                    </div>
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Cost of Sales</div>
                                        <div class="col-md-6 pd10">{{'('.$item.')'}}</div>
                                    </div>
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Total</div>
                                        <div class="col-md-6 pd10">{{'('.$item.')'}}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @foreach($sale as $key=>$item)
                                    @php
                                        $gprofit    +=   $item;                            
                                    @endphp 
                                    <div class="row bbg ">
                                        <div class="col-md-6 pd15">Trading Income</div>
                                        <div class="col-md-6 pd12 pd13">{{date('d M,Y')}}</div>
                                    </div>
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Sales</div>
                                        <div class="col-md-6 pd10">{{$item}}</div>
                                    </div>
                                    <div class="row bbg ">
                                        <div class="col-md-4 offset-md-2 pd12">Total</div>
                                        <div class="col-md-6 pd10">{{$item}}</div>
                                    </div>
                                @endforeach
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