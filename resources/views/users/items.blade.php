@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div><br />
        @endif
        
            <section >
                <div class="container in-border">
                    @csrf
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group ui-widget">
                                <a href="{{url('/item')}}" class="btn primery-btn tax-heading">Add New</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row tbg">
                        <div class="col-md-12 table-responsive">
                            <div id="table" class="table-editable">

                                <table id="item_table" class="table table-bordered table-responsive-md text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Purchase rate</th>
                                        <th class="text-center">Sale rate</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><a href="{{url('/item',$item->id)}}" >{{$item->code}}</a></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->purchase_unit_price}}</td>
                                            <td>{{$item->sell_unit_price}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td class="pro-action"><button type="button" class="close" onclick="removeRow(this)" aria-label="Close"><span aria-hidden="true">×</span></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                                
                        </div>
                    </div>

                </div>
            </section> 
    </div>
    
</div>
@endsection