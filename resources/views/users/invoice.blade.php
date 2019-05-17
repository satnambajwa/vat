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

        @if (isset($data['type']))
        <form method="get" action="{{url('generate-pdf')}}">
            <input type="hidden" id="type-id" value="{{isset($data['type'])?$data['type']:''}}" name="type">
            <input type="hidden" value="download" name="action">
            <input type="hidden" value="{{isset($data['id'])?$data['id']:''}}" name="id">
            <div class="container">
            <div class="row">
             <div class="col-md-12">   
            <p style="text-align: end; padding-top: 25px;font-size: 1.2rem;">
                <button class="btn btn-primary btn-primary2" type="submit"> <i class="la la-eye"></i> Preview</button>
            </p>
        </div>
        </div>
    </div>
        </form>
        @endif

        <form method="post" action="{{route('update',['id'=>isset($data['id'])?$data['id']:''])}}">
            <section >
                <div class="container in-border">
                    @csrf
                    <input type="hidden" value="{{isset($data['type'])?$data['type']:''}}" name="type">
                    <input type="hidden" value="downloada" name="action">
                    <input type="hidden" value="{{isset($data['id'])?$data['id']:''}}" name="id">
                    <div class="row">
                        <div class="col-md-2"> 
                            <div class="form-group ui-widget">
                            <label >To</label>
                            <select name="contact_id" id="contact_id" class="">
                                @if(isset($data['contact']))
                                @foreach($data['contact'] as $itm)
                                <option value="{{$itm['id']}}" {{isset($data['contact_id']) && $data['contact_id']==$itm['id']?'Selected="Selected"':''}}> {{$itm['contact_name']}}</option>
                                @endforeach
                                @endif
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
                        
                        </div>                                     
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-9 col-12">
                        @if(isset($currencies))
                        <select name="currency_id" class="form-control" style="width: 200px;">
                            @foreach($currencies as $currency)
                                <option value="{{$currency->id}}" {{ $data['currency_id'] == $currency->id?'Selected':''}}>{{$currency->name}}</option>
                            @endforeach
                        </select>
                        @endif
                        </div>
                        <div class="col-md-3 col-12" style="float:right">
                            @if(isset($data['amount_tax']))
                                <select name="amount_tax" id="amount_tax" class="form-control" style="width: 200px;">
                                    <option vale="Tax Exclusive" {{$data['amount_tax']=='Tax Exclusive'?'Selected':''}}>Tax Exclusive</option>
                                    <option vale="Tax Inclusive" {{$data['amount_tax']=='Tax Inclusive'?'Selected':''}}>Tax Inclusive</option>
                                    <option vale="No Tax" {{$data['amount_tax']=='No Tax'?'Selected':''}}>No Tax</option>
                                </select>
                            @endif
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
                                        @if(isset($data['items']))
                                        @foreach($data['items'] as $item)
                                        <tr id= "{{$item['id']}}" class="tblrow">
                                            <td contenteditable="true">
                                                <select name="items[]" class="itemSelect form-control">
                                                    <?php $pos=0 ?>
                                                    @foreach($data['ItemList'] as $itm)
                                                    <option dataValue="{{$pos++}}" value="{{$itm['id']}}" {{($item['item_id']==$itm['id'])?"Selected='selected'":""}} > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td contenteditable="true" class="des">{{strip_tags($item['description'])}}</td>
                                            <td contenteditable="true" class="quantity">{{$item['quantity']}}</td>
                                            <td contenteditable="true" class="price">{{$item['unit_price']}}</td>
                                            <td contenteditable="true" class="discount">{{$item['discount']}}</td>
                                            <td class="account">
                                                <select name="accounts[]" class="form-control">
                                                    @foreach($data['accounts'] as $itm)
                                                    <option value="{{$itm['id']}}" {{($item['account_id']==$itm['id'])?"Selected='selected'":""}}  > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="tax">
                                                <select name="taxes[]" class="form-control">
                                                    @foreach($data['taxes'] as $itm)
                                                    <option value="{{$itm['id']}}" title="{{$itm['total_tax_rate']}}" {{($item['tax_id']==$itm['id'])?"Selected='selected'":""}}  > {{$itm['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="amount">
                                                {{$item['amount']}}
                                            </td>
                                            <td class="action pro-action">
                                            <input type="hidden" name="iid[]" value="{{$item['id']}}" />
                                            <input type="hidden" name="description[]" value="{{$item['description']}}" />
                                            <input type="hidden" name="quantity[]" value="{{$item['quantity']}}" />
                                            <input type="hidden" name="unit_price[]" value="{{$item['unit_price']}}" />
                                            <input type="hidden" name="discount[]" value="{{$item['discount']}}" />
                                            <input type="hidden" name="amount[]" value="{{$item['amount']}}" />
                                            <input type="hidden" name="tax[]" title="{{$item['tax_name']}}" data="{{$item['tax_rate']}}" value="{{$item['tax']}}" />
                                            
                                            <button type="button" id="removeRow" class="close " aria-label="Close" ><span aria-hidden="true">×</span></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
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
                                <div class="col-6">Total tax amount</div>
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
                @if(!isset($data['status']) || $data['status'] < 2)
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dropdown">
                                <button type="submit" name="save" value="1" class="btn btn-primary btn-primary2">Save</button>
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-2">           
                            <div class="dropdown">
                                <button type="submit" name="save" value="2" class="btn btn-success btn-primary2 ">Approval</button>
                                <div class="dropdown-menu">
                                    <button type="submit" name="save" value="2" class="dropdown-item">Approve</button>
                                    <button type="submit" name="save" value="4" class="dropdown-item">Approve & add another</button>
                                    <button type="submit" name="save" value="5" class="dropdown-item">Approve & print</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-primary2">Cancel</button>
                        </div>
                    </div>
               
                </div>
                @endif
                <div class="container">
                    <div class="row" style="margin-top:2%; margin-bottom: 2%;">
                        <div class="col-md-12">
                            <button type="button" id="addNote" class="btn btn-primary">Add Note</button>
                            <button type="button" id="showLog" class="btn btn-primary">Show History Note</button>
                        </div>
                        <div class="col-md-12" style="margin-top:2%; margin-bottom: 2%;margin-left: -1.3%;">
                            <div id="addNoteContainer" class="col-md-6">
                                <input type="hidden" name="csrf-token" content="{{ csrf_token() }}" />
                                <textarea id="noteData" class="form-control"></textarea>
                                <div class="col-md-12" style="margin-top:2%; margin-bottom: 2%;">
                                    <button type="button" id="saveNote" class="btn btn-success">Save</button>
                                    <button type="button" id="note" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($dat) && count($dat->logs)>0)
                    <div class="container">
                        <div id="loglisting" class="row" style="margin-top:2%; margin-bottom: 2%;">
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
                    </div>
                @endif
            </section>
        </form>    
    </div>
    @if(isset($data["ItemList"]))
    <script src="//code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/selectize.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/selectize.css')}}" />
    <script>
        var type1    =   $('#type-id').val();
        $('#contact_id').selectize({
            create: function(input,callback){
                $.ajax({
                    url: "/addContact",
                    headers: {
                    'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {value : input,type : type1},
                    success: function(res) {
                        callback({value: res, text: input});
                    }
                });
            }
        });

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
                $('#addNoteContainer').hide();
            }
        });

        $('#note').click(function(){
            $('#noteData').val('');
            $('#addNoteContainer').hide();
        });
        $('#loglisting').hide();
        $('#showLog').click(function(){
            $('#loglisting').show();
        });
        $('#addNote').click(function(){
            $('#addNoteContainer').show();
        });
        amountChange();
        $('#amount_tax').change(function() {
            if($('#amount_tax').val()=='No Tax'){
                $('select[name="taxes[]"]').val(1);
                $('input[name="tax[]"]').val(0);
                $('input[name="tax[]"]').attr('data',0);
            }
            amountChange();
        });
        $(document).on("click","#removeRow", function(event){
            amountChange();
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
                    var tm  =   0;
                    for(el of $(this).siblings(":last").children()){
                       if(el.getAttribute('name')=='quantity[]'){
                            el.value    =   parseFloat($(this).html());
                            qu          =   el.value;
                        }
                        if(el.getAttribute('name')=='unit_price[]'){
                            am  =   el.value;
                        }
                        if(el.getAttribute('name')=='amount[]'){
                            tm          =   am*qu;
                            el.value    =   tm;
                        }
                    }
                    $(this).siblings(".amount").html(tm);
                    amountChange();
                }
                if($(this).attr('class')=='price'){
                    var am  =   0;
                    var qu  =   0;
                    var tm  =   0;
                    for(el of $(this).siblings(":last").children()){
                        if(el.getAttribute('name')=='quantity[]'){
                            qu  =   el.value;
                        }
                        if(el.getAttribute('name')=='unit_price[]'){
                            el.value    =   parseFloat($(this).html());
                            am          =   el.value;
                        }
                        if(el.getAttribute('name')=='amount[]'){
                            tm          =   am*qu;
                            el.value    =   tm;
                        }
                    }
                    $(this).siblings(".amount").html(tm);
                    amountChange();
                }
                if($(this).attr('class')=='discount'){
                    for(el of $(this).siblings(":last").children()){
                        if(el.getAttribute('name')=='discount[]')
                            el.value=parseInt($(this).html());
                    }
                    amountChange();
                }
            }
        });

        $(document).on("change",".itemSelect", function(event){
            myparent    =   event.target.parentElement.parentElement;
            for (el of myparent.children){
                var curr = $(this).find(":selected").attr("datavalue");
                if(el.getAttribute('class') == 'des'){
                    el.innerHTML    =   (ItemList[curr].description===null)?'':ItemList[curr].description;
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
                if(el.getAttribute('class') == 'action pro-action'){
                    for (iin of el.children){
                        if(iin.getAttribute('name') == 'description[]')
                            iin.value   =   ItemList[curr].description;
                        if(iin.getAttribute('name') == 'quantity[]')
                            iin.value   =   1;
                        if(iin.getAttribute('name') == 'unit_price[]')
                            iin.value   =   ItemList[curr].sell_unit_price;
                        if(iin.getAttribute('name') == 'discount[]')
                            iin.value   =   0;
                        if(iin.getAttribute('name') == 'amount[]'){
                            iin.value   =   ItemList[curr].sell_unit_price;
                        }
                    }
                }
            }
            amountChange();
        });

        $(document).on("change",'select[name="taxes[]"]', function(){
            var am  =   0;
            var qu  =   0;
            var tm  =   0;
            var tax =   this.options[this.selectedIndex].title;
            var title =   this.options[this.selectedIndex].text;
            for(el of $(this).parent().siblings(":last").children()){
                if(el.getAttribute('name')=='amount[]'){
                    am  =   el.value;
                }
                if(el.getAttribute('name')=='tax[]'){
                    el.value    =   (am*tax)/100;
                    el.setAttribute('data',tax);
                    el.setAttribute('title',title);
                }
            }
            amountChange();
        });

        function amountChange()
        {
            var total   =   0;
            var vat     =   [];
            var stotal  =   0;
            var totalVat=   0;
            $('input[name="amount[]"]').each(function(cur,el){
                stotal +=parseFloat($(this).val());
            });
            $('input[name="tax[]"]').each(function(cur,el){
                var tax =   parseFloat(el.getAttribute('data'));
                var tvat =  parseFloat(el.value);
                var vkey =  el.getAttribute('title');
                if($('#amount_tax').val()=='Tax Inclusive'){
                    total   =   stotal;
                    stotal  =   (stotal*100)/(100+tax);
                    tvat    =   total-stotal;
                }
                totalVat    +=   tvat;
                if(typeof vat[vkey] != "undefined")
                    vat[vkey] = vat[vkey]+tvat;
                else
                    vat[vkey] = tvat;
            });
            $('input[name="amount[]"]').each(function(cur,el){
                total +=parseFloat($(this).val());
            });
            $('.stotalInput').val(stotal.toFixed(2));
            $('.stotalText').text(stotal.toFixed(2));
            $('.vatInput').val(totalVat.toFixed(2));
            $('.vatText').text(totalVat.toFixed(2));
            if($('#amount_tax').val()=='Tax Exclusive'){
                total = stotal+totalVat;
            }else if($('#amount_tax').val()=='Tax Inclusive'){
                total = stotal+totalVat;
            }else{
                vat =   0;
            }
            $('.totalInput').val(total);
            $('.totalText').text(total);
        }
    
        $('#item_table').delegate('.close', 'click', function(){
            $(this).parent('td').parent('tr').remove();
        });

        function addRow(num)
        {
            var tr = `<tr>
                            <td contenteditable="true">
                                <select name="items[]" class="itemSelect form-control">
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
                                <select name="accounts[]" class="form-control">
                                    @foreach($data['accounts'] as $itm)
                                    <option value"{{$itm['id']}}"> {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="tax">
                                <select name="taxes[]" class="form-control">
                                    @foreach($data['taxes'] as $itm)
                                    <option value="{{$itm['id']}}" title="{{$itm['total_tax_rate']}}" > {{$itm['name']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td  class="amount"></td>
                            <td class="action pro-action">
                                <input type="hidden" name="description[]" value="" />
                                <input type="hidden" name="quantity[]" value="1" />
                                <input type="hidden" name="unit_price[]" value="0" />
                                <input type="hidden" name="discount[]" value="0" />
                                <input type="hidden" name="amount[]" value="0" />
                                <input type="hidden" name="tax[]" title="" data="0" value="0" />
                                <button type="button" class="close"  aria-label="Close"><span aria-hidden="true">×</span></button>
                            </td>
                        </tr>`;
            $('#item_table').append(tr);
            amountChange();
        }
    </script>
    @endif
</div>
@endsection