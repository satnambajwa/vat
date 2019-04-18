@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <div class="row">
                @foreach($data as $key=>$reports)
                    <div class="col-md-5">
                        <div class="wrapper xlarge">
                            <h4 class="heading-small">{{$key}}</h4>
                            <ol class="panel expandable">
                                @foreach($reports as $report)
                                <li class="rowlink toplinks">
                                    <a href="/{{$report->url}}" class="links">
                                        <i class="la la-star{{$report->active?'':'-o'}}"></i>
                                    </a>
                                    <span class="primaryheading">
                                        {{$report->name}}
                                    </span>
                                </li>
                                @endforeach                               
                            </ol>
                        </div>
                    </div>
                @endforeach    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection