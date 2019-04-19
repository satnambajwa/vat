@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
    <section>
         <div class="container">
           
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div id="horizontal-form-layouts">
                           <div class="row">
                              <div class="col-md-12">
                              <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Transactions</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{url('/company')}}" >Add Company</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                            <tr>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Financial Year</th>
                                <th class="border-top-0">Book Begin From</th>
                                <th class="border-top-0">Currency</th>
                                <th class="border-top-0">Decimal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="{{url('/company',$company->id)}}">{{$company->name}}</a></td>
                                <td class="text-truncate"><span class="avatar avatar-xs">{{$company->financial_year}}</span></td>
                                <td class="text-truncate">{{$company->book_begin_from}}</td>
                                <td class="text-truncate">{{$company->currency->formal_currency_name}}</td>
                                <td><button type="button" class="btn btn-sm btn-outline-info round">{{$company->decimal}}</button></td>
                            </tr>
                            @endforeach
                            </tbody>
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
      </section>
    </div>
</div>
@endsection