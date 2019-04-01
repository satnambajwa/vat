@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <!-- Recent Transactions -->
        <div class="row">
            
            <div class="col-6">
                <h4>
                    Advanced features
                </h4>
                <ul class="ul-panel">
                    <li>
                        <a href="{{url('/asset')}}">
                            <h5>
                                Fixed assets
                            </h5>
                            <span>Create and manage assets</span>
                        </a>
                    </li>
                </ul>
            </div>
        
            <div class="col-6">
                <h4>
                    Advanced features
                </h4>
                <ul class="ul-panel">
                    <li>
                        <a href="{{url('/financial')}}">
                            <h5>
                                Financial settings
                            </h5>
                            <span>Edit financial settings like tax periods and lock dates</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/accounts')}}">
                            <h5>Chart of accounts</h5>
                            <span>Add, edit, archive, delete, import or export your accounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/taxRate')}}">
                            <h5>Tax rates</h5>
                            <span>Add, edit or delete tax rates</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/conversion')}}">
                            <h5>Conversion balances</h5>
                            <span>Update account balances from previous accounting systems</span>
                        </a>
                    </li>
                   
                </ul> 
            </div>
        </div>        
    </div>
</div>
@endsection