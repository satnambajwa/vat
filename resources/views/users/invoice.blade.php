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
        <form method="post" action="{{(isset($data['id']))? route('update',$data['id']): route('store')}}">
            <section >
                <div class="container in-border">
                    @csrf
                    <input type="hidden" value="{{$data['type']}}" name="type">
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group ui-widget">
                            <label >To</label>
                            <input type="text" name="contact_id" value="{{isset($data['contact_id'])?$data['contact_id']:''}}" class="form-control" >
                            </div>
                            </div>                                        
                        <div class="col-md-2"> 
                        <div class="form-group">
                            <label >Date</label>
                            <input type="text" name="date" value="{{isset($data['date'])?$data['date']:''}}" class="form-control datepicker" >
                            </div> 
                            </div>  
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Due Date</label>
                            <input type="text" name="estimated_date"  value="{{isset($data['estimated_date'])?$data['estimated_date']:''}}" class="form-control datepicker" >
                            </div> 
                        </div>                                        
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Invoice#</label>
                            <input type="text" name="code" value="{{isset($data['code'])?$data['code']:''}}" class="form-control" >
                            </div> 
                        </div>  
                        <div class="col-md-2">
                            <div class="form-group">
                            <label >Reference</label>
                            <input type="text" name="reference" value="{{isset($data['reference'])?$data['reference']:''}}" class="form-control" >
                            </div> 
                        </div>                                        
                        <div class="col-md-2 ">
                        <p style="text-align: end; padding-top: 25px;font-size: 1.2rem;">
                            <a href="#"><i class="la la-eye"></i> Preview</a></p>
                        </div>                                     
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-12">
                        <select name="currency_id" class="form-control" style="width: 200px;">
                            <option value="1" {{$data['amount_tax']=='1'?'Selected':''}}>GBP British Pound</option>
                            <option>Add Currency</option>
                        </select>
                        </div>
                        <div class="col-md-6 col-12" style="float:right">
                            <label style="float:left;width:20%">Amount are:</label>
                            <select name="amount_tax" class="form-control" style="width: 200px;">
                                    <option vale="Tax Exclusive" {{$data['amount_tax']=='Tax Exclusive'?'Selected':''}}>Tax Exclusive</option>
                                    <option vale="Tax Inclusive" {{$data['amount_tax']=='Tax Inclusive'?'Selected':''}}>Tax Inclusive</option>
                                    <option vale="No Tax" {{$data['amount_tax']=='No Tax'?'Selected':''}}>No Tax</option>
                                </select>
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
                                        <tr id="1">
                                            <td contenteditable="true">
                                                <select name="items[]">
                                                    @foreach($data['ItemList'] as $itm)
                                                    <option > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td contenteditable="true">{{$item['description']}}</td>
                                            <td contenteditable="true">{{$item['quantity']}}</td>
                                            <td contenteditable="true">{{$item['unit_price']}}</td>
                                            <td contenteditable="true">{{$item['discount']}}</td>
                                            <td contenteditable="true">
                                                <select name="accounts[]">
                                                    @foreach($data['accounts'] as $itm)
                                                    <option> {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td contenteditable="true">
                                                <select name="taxes[]">
                                                    @foreach($data['taxes'] as $itm)
                                                    <option > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                {{$item['amount']}}
                                            </td>
                                            <td>
                                                <button type="button" class="close" onclick="removeRow(this)" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                <div class="dropdown">
                                    <button type="button" onclick="addRow(1)" class="btn btn-primary btn-primary2 dropdown-toggle" data-toggle="dropdown">Add a new line</button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="addRow(5)" href="javaScript:void(0);"> Add 5</a>
                                    <a class="dropdown-item" onclick="addRow(10)" href="javaScript:void(0);"> Add 10</a>
                                    <a class="dropdown-item" onclick="addRow(20)" href="javaScript:void(0);">Add 20</a>
                                    </div>
                                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6">Sub total</div>
                                <div class="col-6" >
                                    <input type="hidden" value="0.00" name="sub_total">
                                    <p >0.00</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">VAT</div>
                                <div class="col-6" >
                                    <input type="hidden" value="0.00" name="sub_total">
                                    <p >0.00</p>
                                </div>
                            </div>
                            <div class="row in-total">
                                <div class="col-6">Total</div>
                                    <div class="col-6" >
                                        <input type="hidden" value="0.00" name="sub_total">
                                        <p >0.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <button type="submit" class="btn btn-primary btn-primary2">Save</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"> Save as draft</a>
                                        <a class="dropdown-item" href="#"> Save(continue editing)</a>
                                        <a class="dropdown-item" href="#">Save & submit for approval</a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                            <div class="col-md-2">           <div class="dropdown">
                                <button type="submit" class="btn btn-primary btn-primary2 ">Approval</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"> Approve</a>
                                    <a class="dropdown-item" href="#">Approve & add another</a>
                                    <a class="dropdown-item" href="#">Approve & print</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-primary2">Cancel</button>
                        </div>
                    </div>
                    
                </div>
            </section>
            
        </form>    
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        var ItemList    =   JSON.parse('{!! json_encode($data["ItemList"]) !!}');
        var items       =   JSON.parse('{!! json_encode($data["items"]) !!}');

        
        //var items       =   JSON.parse('{!! json_encode($data["items"]) !!}');
        //var items       =   JSON.parse('{!! json_encode($data["items"]) !!}');

        var invoice     =   [];
        //createTable();

        function select(val){
            var $tr = '<select class="selecize">';
            ItemList.map((item)=>{
                $tr +='<option value="'+item.id+'" '+(val==item.id)?"selected=''true":""+'>'+item.name+'</option>';
            });
            $tr +='</select>'
            console.log($tr);
            return $tr;
        }
        function createTable(){
            $.each(items, function(i, item) {
                var $tr = $('<tr id="'+i+'">').append(
                    $('<td contenteditable="true">').text(item.item_id),
                    $('<td contenteditable="true">').text(item.description),
                    $('<td contenteditable="true">').text(item.quantity),
                    $('<td contenteditable="true">').text(item.unit_price),
                    $('<td contenteditable="true">').text(item.discount),
                    $('<td contenteditable="true">').text(item.account_id),
                    $('<td contenteditable="true">').text(item.tax_rate),
                    $('<td>').text(item.amount),
                    $('<td>').html('<button type="button" class="close" onClick=removeRow('+i+') aria-label="Close" ><span aria-hidden="true">&times;</span></button></td>')
                );
                $tr.appendTo('#item_table');
            });
        }

        function refreshTable(){
            $('#item_table tbody').html('');
            $.each(items, function(i, item) {
                var $tr = $('<tr id="'+i+'">').append(
                    $('<td contenteditable="true">').text(item.item_id),
                    $('<td contenteditable="true">').text(item.description),
                    $('<td contenteditable="true">').text(item.quantity),
                    $('<td contenteditable="true">').text(item.unit_price),
                    $('<td contenteditable="true">').text(item.discount),
                    $('<td contenteditable="true">').text(item.account_id),
                    $('<td>').html(select(item.tax_rate)),
                    $('<td>').text(item.amount),
                    $('<td>').html('<button type="button" class="close" onClick=removeRow('+i+') aria-label="Close" ><span aria-hidden="true">&times;</span></button></td>')
                );
                $tr.appendTo('#item_table');
            });
        }

        function calculator(val){
            var Total = 0;
            var totalTax=0;
            var subTotal=0;
            var totalDicount = 0;
            items.map(function(item,index){
                var amount = item.unit_price*item.quantity;
                var discount = amount*item.discount/100;
                var taxableAmount = amount-discount;
                var tax = taxableAmount*item.tax_rate/100;
                var sub_amount= taxableAmount+tax;
                if(val==index){
                    items[val].tax=tax;
                    items[val].amount=taxableAmount;
                }
                totalDicount+=  discount;
                totalTax    +=  tax;
                subTotal    +=  taxableAmount;
                Total       +=  sub_amount;
            });
            invoice.sub_total =   subTotal;
            invoice.vat       =   totalTax;
            invoice.discount  =   totalDicount;
            invoice.total     =   Total;
            console.log('Calculator Called invoice : '+invoice);
        }

        function removeRow(val)
        {
            console.log(val);
            var $this = $(this);
            var $wrap = val.parent();
            console.log(val);
            console.log($wrap);

            //val.parents().css({"color": "red", "border": "2px solid red"});
            val.parent().parent().remove();
            //if(items.length>0)
            //    items.splice(val,1);
            
            //$('#'+val).remove();
            //calculator(val);
            //refreshTable();
        }

        function addRow1(num){
            for(var i =0;i<num;i++){
                items=items.concat({
                    "item_id":"",
                    "description":"",
                    "quantity":"",
                    "unit_price":"",
                    "discount":"",
                    "account_id":"",
                    "tax_id":"",
                    "tax_rate":"",
                    "amount":""
                });
                var count   =   items.length;
                var $tr = $('<tr id="'+count+'">').append(
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').text(""),
                        $('<td contenteditable="true">').html(select(0)),
                        $('<td>').text(""),
                        $('<td>').html('<button type="button" class="close" onClick=removeRow('+count+') aria-label="Close" ><span aria-hidden="true">&times;</span></button></td>')
                );
                $tr.appendTo('#item_table');
            }
        }

        function addRow(num)
        {
            var tr = `<tr>
                            <td contenteditable="true">
                                <select name="items[]">
                                    @foreach($data['ItemList'] as $itm)
                                    <option > {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true">
                                <select name="accounts[]">
                                    @foreach($data['accounts'] as $itm)
                                    <option> {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td contenteditable="true">
                                <select name="taxes[]">
                                    @foreach($data['taxes'] as $itm)
                                    <option > {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td>
                                <button type="button" class="close" onclick="removeRow(this)" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </td>
                        </tr>`;
            $('#item_table').append(tr);
            //console.log('row added '+tr);
        }
    </script>
</div>
@endsection