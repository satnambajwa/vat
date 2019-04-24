@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cash Summery</h2>
                        <h4>Company Name</h4>
                    </div>
                </div>
                <div style="margin-top:40px"></div>
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%;">
                            <thead>
                            <tr>
                                <td>Income</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key =>$val)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$val}}</td>
                                <td>{{round($val/3,2)}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%;">
                            <tr>
                                <td>Expenses</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($data as $key =>$val)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$val}}</td>
                                <td>{{round($val/3,2)}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection