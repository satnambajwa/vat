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
                                <h2 style="color: #459211;">Balance Sheet</h2>
                                <h4>{{Auth::user()->name}}</h4>
                            </div>
                        </div>
                        <div style="margin-top:40px"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table-bordered" style="width: 100%;">
                                    <tr>
                                        <td>Asserts</td>
                                        <td>4/16/2019</td>
                                    </tr>
                                    @foreach($data as $key =>$val)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$val}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table-bordered" style="width: 100%;">
                                    <tr>
                                        <td>Liability</td>
                                        <td>4/16/2019</td>
                                    </tr>
                                    @foreach($ddata as $key =>$val)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$val}}</td>
                                    </tr>
                                    @endforeach
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