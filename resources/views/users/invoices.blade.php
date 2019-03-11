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
                <li class="nav-item"><a href="" data-target="#payments" data-toggle="tab" class="nav-link small text-uppercase">Payments</a></li>
                </ul>
                <br>
                <div id="tabsJustifiedContent" class="tab-content">
                    <div id="all" class="tab-pane fade active show">
                        <div class="row">
                            <div class="col-sm-12 card">
                                <div class="card-head">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6" style="margin-top: 12px;">
                                            <div class="dataTables_length" id="invoices-list_length">
                                                <label>Show entries
                                                    <select name="invoices-list_length" aria-controls="invoices-list" class="custom-select custom-select-sm form-control form-control-sm" style="width:63px;">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> 
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 ">
                                            <div id="invoices-list_filter" class="dataTables_filter mr-auto" >
                                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="invoices-list"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="invoices-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle dataTable" role="grid" aria-describedby="invoices-list_info">
                                        <thead>
                                        <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending">
                                        <input type="checkbox" id="defaultCheck" name="example2">
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 141px;">Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Invoice #: activate to sort column ascending" style="width: 144px;">Invoice #</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Order No: activate to sort column ascending" style="width: 137px;">Order No</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 242px;">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Due: activate to sort column ascending" style="width: 141px;">Due</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 125px;">Amount</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Balance Due: activate to sort column ascending" style="width: 163px;">Balance Due</th>
                                        <th class="sorting" tabindex="0" aria-controls="invoices-list" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 124px;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="group">
                                                <td colspan="9"><span class="badge badge-default badge-success badge-lg">Paid</span></td>
                                            </tr>

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                <input type="checkbox" id="defaultCheck" name="example2">
                                                </td>
                                                <td>06/05/2018</td>
                                                <td><a href="#" class="text-bold-600">INV-001001</a></td>
                                                <td>PO-005201</td>
                                                <td>Elizabeth Washington</td>
                                                <td>10/05/2018</td>
                                                <td>$ 1200.00</td>
                                                <td>$ 200.00</td>
                                                <td>
                                                    <span class="dropdown">
                                                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                            <a href="#" class="dropdown-item"><i class="la la-eye"></i> Open Task</a>
                                                            <a href="#" class="dropdown-item"><i class="la la-pencil"></i> Edit Task</a>
                                                            <a href="#" class="dropdown-item"><i class="la la-check"></i> Complete Task</a>
                                                            <a href="#" class="dropdown-item"><i class="ft-upload"></i> Assign to</a>
                                                            <a href="#" class="dropdown-item"><i class="la la-trash"></i> Delete Task</a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                    <div id="payment" class="tab-pane fade">
                        @include('users.sub.payment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection