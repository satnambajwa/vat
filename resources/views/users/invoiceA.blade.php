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
        <form method="post" action="{{route('update',['id'=>isset($data['id'])?$data['id']:''])}}">
            <section >
                <div class="container in-border">
                    @csrf
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group ui-widget">
                            <label >To: </label>
                                @foreach($data['contact'] as $itm)
                                {{isset($data['contact_id']) && $data['contact_id']==$itm['id']?$itm['contact_name']:''}}
                                @endforeach                            
                            </div>
                            </div>                                        
                        <div class="col-md-2"> 
                        <div class="form-group">
                            <label >Date: </label>
                            {{isset($data['date'])?$data['date']:''}}
                            </div> 
                            </div>  
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Due Date: </label>
                            {{isset($data['estimated_date'])?$data['estimated_date']:''}}
                            </div> 
                        </div>                                        
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Invoice#: </label>
                            {{isset($data['code'])?$data['code']:''}}
                            </div> 
                        </div>  
                        <div class="col-md-2">
                            <div class="form-group">
                            <label >Reference: </label>
                            {{isset($data['reference'])?$data['reference']:''}}
                            </div> 
                        </div>                                        
                        <div class="col-md-2 ">
                        <p style="text-align: end; padding-top: 25px;font-size: 1.2rem;">
                            <a href="{{url('generate-pdf')}}"><i class="la la-eye"></i> Preview</a></p>
                        </div>                                     
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            {{$data['amount_tax']==1?'GBP British Pound':''}}
                        </div>
                        <div class="col-md-6 col-12" style="float:right">
                            <label style="float:left;width:20%">Amount are: </label>
                            {{$data['amount_tax']}}

                        </div>
                    </div>

                    <div class="row tbg">
                        <div class="col-md-12 table-responsive">
                            <div id="table" class="table-editable">

                                <table id="item_table" class="table table-bordered table-responsive-md text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Item </th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Disc %</th>
                                        <th class="text-center">Account</th>
                                        <th class="text-center">Tax rate</th>
                                        <th class="text-center">Amount GBP</th>
                                        <th class="text-center">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['items'] as $item)
                                        <tr id= "{{$item['id']}}" class="tblrow">
                                            <td >
                                                @foreach($data['ItemList'] as $itm)
                                                {{($item['item_id']==$itm['id'])?$itm['name']:""}} 
                                                @endforeach
                                            </td>
                                            <td  class="des">{{$item['description']}}</td>
                                            <td  class="quantity">{{$item['quantity']}}</td>
                                            <td  class="price">{{$item['unit_price']}}</td>
                                            <td  class="discount">{{$item['discount']}}</td>
                                            <td class="account">
                                                @foreach($data['accounts'] as $itm)
                                                {{($item['account_id']==$itm['id'])?$itm['name']:""}} 
                                                @endforeach
                                            </td>
                                            <td class="tax">
                                                {{$item['tax_id']}}
                                            </td>
                                            <td class="amount">
                                                {{$item['amount']}}
                                            </td>
                                            <td class="action">
                                            <input type="hidden" name="iid[]" value="{{$item['id']}}" />
                                            <input type="hidden" name="description[]" value="{{$item['description']}}" />
                                            <input type="hidden" name="quantity[]" value="{{$item['quantity']}}" />
                                            <input type="hidden" name="unit_price[]" value="{{$item['unit_price']}}" />
                                            <input type="hidden" name="discount[]" value="{{$item['discount']}}" />
                                            <input type="hidden" name="amount[]" value="{{$item['amount']}}" />

                                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                                
                        </div>
                    </div>

                    <div class="row" style="margin-top:2%; margin-bottom: 2%;">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6">Sub total</div>
                                <div class="col-6" >
                                    <input type="hidden" value="{{isset($data['sub_total'])?$data['sub_total']:0}}" class="stotalInput" name="sub_total">
                                    <p class="stotalText">{{isset($data['sub_total'])?$data['sub_total']:0}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">VAT</div>
                                <div class="col-6" >
                                    <input type="hidden" value="{{isset($data['vat'])?$data['vat']:0}}" class="vatInput" name="vat">
                                    <p class="vatText" >{{isset($data['vat'])?$data['vat']:0}}</p>
                                </div>
                            </div>
                            <div class="row in-total">
                                <div class="col-6">Total</div>
                                    <div class="col-6" >
                                        <input type="hidden" value="{{isset($data['total'])?$data['total']:0}}" class="totalInput" name="total">
                                        <p class="totalText" >{{isset($data['total'])?$data['total']:0}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 row">
                            <div class="col-md-2">
                                <label>Amount Paid</label>
                                <input type="text" autocomplete="off" name="amount_paid" id="amount_paid" class="form-control" value="{{$data['total']}}">
                            </div>
                            <div class="col-md-2">
                                <label>Date Paid</label>
                                <input type="text" autocomplete="off" name="date_paid" id="date_paid" class="form-control datepicker">
                            </div>
                            <div class="col-md-2">
                                <label>Paid To</label>
                                <select name="paid_to" id="paid_to" class="form-control">
                                    <option vale="Tax Exclusive">Tax Exclusive</option>
                                    <option vale="Tax Inclusive">Tax Inclusive</option>
                                    <option vale="No Tax">No Tax</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>Reference</label>
                                <input type="text" autocomplete="off" name="reference" id="reference" class="form-control">
                            </div>

                            <div class="col-md-2">
                                <p style="text-align: end; padding-top: 15px;font-size: 1.2rem;margin-top: 15px;">
                                    <a href="JavaScript:void(0);" id="payment">Add Payment</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:2%; margin-bottom: 2%;">
                        <div class="col-md-12">
                            <button type="button" id="addNote" class="btn btn-primary btn-primary2 ">Add Note</button>
                        </div>
                        <div class="col-md-12" style="margin-top:2%; margin-bottom: 2%;">
                        <div id="addNoteContainer" class="col-md-6">
                            <input type="hidden" name="csrf-token" content="{{ csrf_token() }}" />
                            <textarea id="noteData" class="form-control"></textarea>
                            <div class="col-md-12" style="margin-top:2%; margin-bottom: 2%;">
                                <button type="button" id="saveNote" class="btn btn-primary btn-primary2 ">Save</button>
                                <button type="button" id="note" class="btn btn-primary btn-primary2 ">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @if(isset($dat) && count($dat->logs)>0)
                    <div class="row" style="margin-top:2%; margin-bottom: 2%;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">Changes</div>
                                <div class="col-md-3">Date</div>
                                <div class="col-md-3">User</div>
                                <div class="col-md-3">Details</div>
                            </div>
                        </div>    
                        @foreach($dat->logs as $log)
                        <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                {{$log->action}}
                            </div>
                            <div class="col-md-3">
                                {{$log->created_at}}
                            </div>
                            <div class="col-md-3">
                                {{$log->user->name}}
                            </div>
                            <div class="col-md-3">
                                {{$log->note}}
                            </div>
                        </div>    
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </section>
            
        </form>    
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        $('#payment').click(function(){
            var data={
                'amount_paid':$('#amount_paid').val(),
                'date_paid':$('#date_paid').val(),
                'paid_to':$('#paid_to').val(),
                'reference':$('#reference').val()
            }

            $.ajax({
                    url: "/paymentSave",
                    headers: {
                    'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: data
                });
        });
    </script>
</div>
@endsection