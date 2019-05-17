@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="container">
<div class="content-wrapper">
    <div class="content-body">
        <!-- Recent Transactions -->
        <div class="row">
            
            <div class="col-6">
                <h4 class="tax-heading">
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
                        <a href="{{url('/api')}}">
                            <h5>
                                Vat API 
                            </h5>
                            <span>Edit financial settings like tax periods and lock dates</span>
                        </a>
                    </li>

                </ul>
            </div>
        
            <div class="col-6">
                <h4 class="tax-heading">
                    Advanced features
                </h4>
                <ul class="ul-panel">
                    
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
                   
                   
                </ul> 
            </div>
        </div>        
    </div>
</div>
</div>
@endsection