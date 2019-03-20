@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <section>
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h2>Sales Overview</h2>
                    <h4>Invoices</h4>
            
                </div>
                </div>
                <div class="row">
                <div class="col-md-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">
                        New Invoice
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/invoice')}}"> New Invoice</a>
                            <a class="dropdown-item" href="#"> New Repeating Invoice</a>
                            <a class="dropdown-item" href="#">Add contact group</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-primary2">New credit Note</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-primary2">Send Statements</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-primary2">Import</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-primary2">Export</button>
                </div>
                <div class="col-md-2">
                    <p> invoice reminder off</p>
                </div>
                </div>
            </div>
        </section>
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-12">
                <ul id="tabsJustified" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#all" data-toggle="tab" class="nav-link small text-uppercase active">All</a></li>
                <li class="nav-item"><a href="" data-target="#draft" data-toggle="tab" class="nav-link small text-uppercase ">Draft</a></li>
                <li class="nav-item"><a href="" data-target="#approval" data-toggle="tab" class="nav-link small text-uppercase">Awaiting Approval</a></li>
                <li class="nav-item"><a href="" data-target="#awaiting" data-toggle="tab" class="nav-link small text-uppercase ">Awaiting Payment</a></li>
                <li class="nav-item"><a href="" data-target="#paid" data-toggle="tab" class="nav-link small text-uppercase">Paid</a></li>
                <li class="nav-item"><a href="" data-target="#payments" data-toggle="tab" class="nav-link small text-uppercase">Repeating</a></li>
                </ul>
                <br>                
                <script src="//code.jquery.com/jquery.js"></script>
                <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" defer></script>
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <div id="tabsJustifiedContent" class="tab-content">
                    <div id="all" class="tab-pane fade active show">
                        @include('users.sub.all')
                    </div>
                    <div id="draft" class="tab-pane fade ">
                        @include('users.sub.draft')
                    </div>
                    <div id="approval" class="tab-pane fade">
                        @include('users.sub.approval')
                    </div>
                    <div id="awaiting" class="tab-pane fade">
                        @include('users.sub.awaiting')
                    </div>
                    <div id="paid" class="tab-pane fade">
                        @include('users.sub.paid')
                    </div>
                    <div id="payments" class="tab-pane fade">
                        @include('users.sub.payment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection