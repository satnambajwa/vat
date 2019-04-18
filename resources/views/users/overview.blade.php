@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <section >
            <div class="container in-border">
                
                <div>
                    <h1 style="text-transform: capitalize;">{{$type}} overview</h1>
                    <div style="height:100px;"></div>
                </div>
                @foreach($data as $val=>$data1)
                <hr>
                <div style="height:100px;"></div>
                <h2>{{$val}}</h2>
                <div class="row ">
                    <div class="col-11 row">
                        @foreach($data1 as $key=>$value)
                        <div class="col-3 border">
                            <div>
                                <a href="">
                                    <span class="">{{($key==1)?'Draft':(($key==2)?'Awaiting Approval':'Awaiting Payment')}} ({{$value['count']}})</span>
                                    <br/>
                                    <span class="">{{$value['amount']}}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>    
                </div>
                @endforeach
            </div>
        </section>  
    </div>
</div>
@endsection