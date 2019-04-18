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
                    <input type="hidden" value="{{$data['type']}}" name="type">
                    <input type="hidden" value="downloada" name="action">
                    <input type="hidden" value="{{isset($data['id'])?$data['id']:''}}" name="id">
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group ui-widget">
                            <label >To</label>
                            <select name="contact_id" class="form-control">
                                @foreach($data['contact'] as $itm)
                                <option value="{{$itm['id']}}" {{isset($data['contact_id']) && $data['contact_id']==$itm['id']?'Selected="Selected"':''}}> {{$itm['contact_name']}}</option>
                                @endforeach
                            </select>
                            </div>
                            </div>                                        
                        <div class="col-md-2"> 
                        <div class="form-group">
                            <label >Date</label>
                            <input type="text" name="date" value="{{isset($data['date'])?$data['date']:''}}" class="form-control datepicker" autocomplete="off">
                            </div> 
                            </div>  
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Due Date</label>
                            <input type="text" name="estimated_date"  value="{{isset($data['estimated_date'])?$data['estimated_date']:''}}" class="form-control datepicker" autocomplete="off">
                            </div> 
                        </div>                                        
                        <div class="col-md-2"> 
                            <div class="form-group">
                            <label >Invoice#</label>
                            <input type="text" name="code" value="{{isset($data['code'])?$data['code']:''}}" class="form-control" autocomplete="off">
                            </div> 
                        </div>  
                        <div class="col-md-2">
                            <div class="form-group">
                            <label >Reference</label>
                            <input type="text" name="reference" value="{{isset($data['reference'])?$data['reference']:''}}" class="form-control" autocomplete="off">
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
                        <select name="currency_id" class="form-control" style="width: 200px;">
                            <option value="1" {{$data['amount_tax']==1?'Selected':''}}>GBP British Pound</option>
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
                                        <tr id= "{{$item['id']}}" class="tblrow">
                                            <td contenteditable="true">
                                                <select name="items[]" class="itemSelect">
                                                    <?php $pos=0 ?>
                                                    @foreach($data['ItemList'] as $itm)
                                                    <option dataValue="{{$pos++}}" value="{{$itm['id']}}" {{($item['item_id']==$itm['id'])?"Selected='selected'":""}} > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td contenteditable="true" class="des">{{$item['description']}}</td>
                                            <td contenteditable="true" class="quantity">{{$item['quantity']}}</td>
                                            <td contenteditable="true" class="price">{{$item['unit_price']}}</td>
                                            <td contenteditable="true" class="discount">{{$item['discount']}}</td>
                                            <td class="account">
                                                <select name="accounts[]">
                                                    @foreach($data['accounts'] as $itm)
                                                    <option value="{{$itm['id']}}" {{($item['account_id']==$itm['id'])?"Selected='selected'":""}}  > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="tax">
                                                <select name="taxes[]">
                                                    @foreach($data['taxes'] as $itm)
                                                    <option value="{{$itm['id']}}" {{($item['tax_id']==$itm['id'])?"Selected='selected'":""}}  > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
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
                            @if(!isset($data['status']) || $data['status']<2)
                                <div class="dropdown">
                                    <button type="button" onclick="addRow(1)" class="btn btn-primary btn-primary2 ">Add a new line</button>
                                </div>
                            @endif
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
                    @if(!isset($data['status']) || $data['status']<2)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button type="submit" name="save" value="1" class="btn btn-primary btn-primary2">Save</button>
                                <div class="dropdown-menu">
                                    <button type="submit" name="save" value="0" class="btn btn-primary btn-primary2">Save as draft</button>
                                    <a class="dropdown-item" href="#"> Save(continue editing)</a>
                                    <a class="dropdown-item" href="#">Save & submit for approval</a>
                                </div>                                    
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-2">           
                            <div class="dropdown">
                                <button type="submit" name="save" value="2" class="btn btn-primary btn-primary2 ">Approval</button>
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
                    @endif
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
        var ItemList    =   JSON.parse('{!! json_encode($data["ItemList"]) !!}');
        
        function refreshTable(){
            $('#item_table tbody').html('');
        }

        $('#item_table').delegate('[contenteditable="true"]','focusin', function(){
            $(this).data('before', $(this).html());
        });
        $('#addNoteContainer').hide();
        $('#saveNote').click(function(){
            var data    =   $('#noteData').val();
            var idate   =   {{(isset($data['id']))?$data['id']:0}};
            if(data != ''){
                $.ajax({
                    url: "/noteSave",
                    headers: {
                    'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {value : data,id:idate},
                    
                });
            }
        });
        $('#note').click(function(){
            $('#noteData').val('');
        });
        

        $('#addNote').click(function(){
            $('#addNoteContainer').show();
        });
        

        $('#item_table').delegate('[contenteditable="true"]', 'blur', function(){
            if($(this).data('before') != $(this).html()){
                
                if($(this).attr('class')=='des'){
                    for(el of $(this).siblings(":last").children()){
                        if(el.getAttribute('name')=='description[]')
                            el.value=$(this).html();
                    }
                }
                if($(this).attr('class')=='quantity'){
                    var am  =   0;
                    var qu  =   0;
                    for(el of $(this).siblings(":last").children()){
                       if(el.getAttribute('name')=='quantity[]'){
                            el.value=$(this).html();
                            qu  =   el.value;
                            
                        }
                        if(el.getAttribute('name')=='unit_price[]'){
                            am  =   el.value;
                        }
                        if(el.getAttribute('name')=='amount[]'){
                            el.value    =   am*qu;
                        }
                    }
                }
                if($(this).attr('class')=='price'){
                    var am  =   0;
                    var qu  =   0;
                    for(el of $(this).siblings(":last").children()){
                        
                        if(el.getAttribute('name')=='quantity[]'){
                            qu  =   el.value;
                        }
                        if(el.getAttribute('name')=='unit_price[]'){
                            el.value=$(this).html();
                            am  =   el.value;
                        }
                        if(el.getAttribute('name')=='amount[]'){
                            el.value    =   am*qu;
                        }
                    }
                }
                if($(this).attr('class')=='discount'){
                    for(el of $(this).siblings(":last").children()){
                        if(el.getAttribute('name')=='discount[]')
                            el.value=$(this).html();
                    }
                }

            }
        });

        $(document).on("change",".itemSelect", function(event){
            myparent    =   event.target.parentElement.parentElement;
            for (el of myparent.children){
                var curr = $(this).find(":selected").attr("datavalue");
                if(el.getAttribute('class') == 'des'){
                    el.innerHTML    =   ItemList[curr].description;
                }
                if(el.getAttribute('class') == 'price'){
                    el.innerHTML    =   ItemList[curr].sell_unit_price;
                }
                if(el.getAttribute('class') == 'account'){
                    if($.isNumeric(el.children.item(0).value))
                        el.children.item(0).value   =   ItemList[curr].sell_account_id;
                    else{
                        el.children.item(0).value   =   ItemList[curr].sell_account_id;
                    }
                }
                if(el.getAttribute('class') == 'tax'){
                    el.children.item(0).value   =   ItemList[curr].sell_tax_id;
                }
                if(el.getAttribute('class') == 'amount'){
                    el.innerHTML    =   ItemList[curr].sell_unit_price;
                }
                if(el.getAttribute('class') == 'action'){
                    for (iin of el.children){
                        if(iin.getAttribute('name') == 'description[]')
                            iin.value   =   ItemList[curr].description;
                        if(iin.getAttribute('name') == 'quantity[]')
                            iin.value   =   1;
                        if(iin.getAttribute('name') == 'unit_price[]')
                            iin.value   =   ItemList[curr].sell_unit_price;
                        if(iin.getAttribute('name') == 'discount[]')
                            iin.value   =   0;
                        if(iin.getAttribute('name') == 'amount[]')
                            iin.value   =   ItemList[curr].sell_unit_price;
                    }
                }
            }
            amountChange();
        });

        function amountChange()
        {
            var total   =   0;
            var vat     =   0;
            var stotal  =   0;
            $('input[name="amount[]"]').each(function(cur,el){
                stotal +=parseInt($(this).val());
            });
            $('input[name="amount[]"]').each(function(cur,el){
                vat +=parseInt($(this).val());
            });
            $('input[name="amount[]"]').each(function(cur,el){
                total +=parseInt($(this).val());
            });

            $('.totalInput').val(total);
            $('.totalText').text(total);

            $('.vatInput').val(vat);
            $('.vatText').text(vat);

            $('.stotalInput').val(stotal);
            $('.stotalText').text(stotal);


            
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

      
        $('#item_table').delegate('.close', 'click', function(){
            $(this).parent('td').parent('tr').remove();
        });

        function addRow(num)
        {
            var tr = `<tr>
                            <td contenteditable="true">
                                <select name="items[]" class="itemSelect">
                                    <option></option>
                                    <?php $pos=0 ?>
                                    @foreach($data['ItemList'] as $itm)
                                        <option dataValue="{{$pos++}}" value="{{$itm['id']}}"> {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td contenteditable="true" class="des">Description</td>
                            <td contenteditable="true" class="quantity">1</td>
                            <td contenteditable="true" class="price">0</td>
                            <td contenteditable="true" class="discount">0</td>
                            <td class="account">
                                <select name="accounts[]">
                                    @foreach($data['accounts'] as $itm)
                                    <option value"{{$itm['id']}}"> {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="tax">
                                <select name="taxes[]">
                                    @foreach($data['taxes'] as $itm)
                                    <option value"{{$itm['id']}}"> {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td  class="amount"></td>
                            <td class="action">
                                <input type="hidden" name="description[]" value="" />
                                <input type="hidden" name="quantity[]" value="1" />
                                <input type="hidden" name="unit_price[]" value="0" />
                                <input type="hidden" name="discount[]" value="0" />
                                <input type="hidden" name="amount[]" value="0" />
                                <button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
                            </td>
                        </tr>`;
            $('#item_table').append(tr);

        }
    </script>
</div>
@endsection