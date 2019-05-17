@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <!-- Products sell and New Orders -->
        <div class="col-xl-10 col-lg-10 offset-md-1">
        <div class="row match-height">
            <div class="col-xl-6 col-lg-12">
                Token :<input class="form-control" name="url" value="{{Session::get('access_token')}}">
                Refresh Token : <input class="form-control" name="url" value="{{Session::get('refresh_token')}}">
                Scope : <input class="form-control" name="url" value="{{Session::get('scope')}}">
                Token type : <input class="form-control" name="url" value="{{Session::get('token_type')}}">
            </div>
        </div>
        </div>
    </div>
</div>
@endsection