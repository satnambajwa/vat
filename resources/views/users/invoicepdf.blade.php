<html>
<head>
    <style>
        .table-editable{height: 350px;}
form label {
    color: #666;
    font-size: 1.3rem;
    font-weight: 500;
} 

.table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 2px;
    font-size: 20px;
    font-weight: 500;
}

.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
    font-size: 16px;
    font-weight: 500;padding: 5px;
}
    </style>
</head>
<body>
<div class="content-wrapper">
    <div class="content-body">
        <section >
            <div class="container in-border">
                <div class="row tbg">
                    <h3>Invoice</h3>
                </div>
                <div class="row tbg">
                    <table id="item_table" class="table table-bordered table-responsive-md text-center">
                        <thead>
                            <tr>
                                <th class="text-center">Company Name </th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Code </th>
                                <th class="text-center">Reference</th>
                            </tr>
                        <thead>
                        <tbody>
                            <tr>
                                <td>{{isset($data['contact_id'])?$data['contact_id']:'NA'}}</td>
                                <td>{{isset($data['estimated_date'])?$data['estimated_date']:'NA'}}</td>
                                <td>{{isset($data['code'])?$data['code']:'NA'}}</td>
                                <td>{{isset($data['reference'])?$data['reference']:'NA'}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br/><br/><br/>
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
                                </tr>
                                </thead>
                                <tbody>
                                   
                                    @if(isset($data['items']))
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
                                        
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="3">Sub total</td>
                                        <td colspan="3">{{isset($data['sub_total'])?$data['sub_total']:0}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="3">Tax amount</td>
                                        <td colspan="3">{{isset($data['vat'])?$data['vat']:0}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="3">Total</td>
                                        <td colspan="3">{{isset($data['total'])?$data['total']:0}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                
            </div>
        </section>
    </div>    
</div>
</body>
</html>