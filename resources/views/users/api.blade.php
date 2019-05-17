@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <!-- Products sell and New Orders -->
        <div class="col-xl-10 col-lg-10 offset-md-1">
        <div class="row match-height">
            <div class="col-xl-6 col-lg-12">
                <form action="{{$url}}" method="GET">
                    <input class="form-control"  type="text" name="response_type" value="{{$response_type}}"/>
                    <input class="form-control"  type="text" name="client_id" value="{{$client_id}}"/>
                    <input class="form-control"  type="text" name="scope" value="{{$scope}}"/>
                    <input class="form-control"  type="text" name="redirect_uri" value="{{$redirect_uri}}"/>
                    <button class="form-control" type="submit" name="submit">Submit</button>
                </form>
            
            </div>
        </div>
        </div>
    </div>
</div>
@endsection