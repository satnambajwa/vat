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
        <form method="post" action="{{route('itemsave')}}">
            <section >
                <div class="container in-border">
                    
                    @csrf
                    <input type="hidden" name='id' value="{{isset($data['item']['id'])?$data['item']['id']:''}}" />
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group ui-widget">
                                <label >Code</label>
                                <input type="text" name="code" value="{{isset($data['item']['code'])?$data['item']['code']:''}}" class="form-control" >
                            </div>
                        </div>                                        
                        <div class="col-md-5"> 
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" name="name" value="{{isset($data['item']['name'])?$data['item']['name']:''}}" class="form-control" >
                            </div> 
                        </div>  
                                                           
                        
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group ui-widget">
                                <input type="checkbox" name="is_purchase" value="1" {{(isset($data['item']['is_purchase']) && $data['item']['is_purchase']==1)?'checked=""checked':''}} class="form-control" >
                                <label>I purchase this item</label>
                            </div>
                        </div>                                        
                        <div id="dvPurc" class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Purchase Unit Price</label>
                                        <input type="text" name="purchase_unit_price" value="{{isset($data['item']['purchase_unit_price'])?$data['item']['purchase_unit_price']:''}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Purchase Account</label>
                                        <select name="purchase_account_id" class="form-control">
                                            @foreach($data['accounts'] as $account)    
                                                <option value="{{$account->id}}" {{(isset($data['item']['purchase_account_id']) && $data['item']['purchase_account_id']==$account->id)?'Selected="selected"':''}} >{{$account->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Purchase Tax</label>
                                        <select name="purchase_tax_id" class="form-control">
                                            @foreach($data['taxes'] as $tax)    
                                                <option value="{{$tax->id}}" {{(isset($data['item']['purchase_tax_id']) && $data['item']['purchase_tax_id']==$tax->id)?'Selected="selected"':''}} >{{$tax->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Purchase Description</label>
                                        <textarea class="form-control" name="purchase_description">{{isset($data['item']['purchase_description'])?$data['item']['purchase_description']:''}}</textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  
                                                           
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group ui-widget">
                                <input type="checkbox" name="is_sell" value="1"  {{(isset($data['item']['is_sell']) && $data['item']['is_sell']==1)?'checked=""checked':''}} class="form-control chkPassport" >
                                <label>I sell this item</label>
                            </div>
                        </div>                                        
                        <div id="dvsell" class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Sale Unit Price</label>
                                        <input type="text" name="sell_unit_price" value="{{isset($data['item']['sell_unit_price'])?$data['item']['sell_unit_price']:''}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Sales Account</label>
                                        <select name="sell_account_id" class="form-control">
                                            @foreach($data['accounts'] as $account)    
                                                <option value="{{$account->id}}" {{(isset($data['item']['sell_account_id']) && $data['item']['sell_account_id']==$account->id)?'Selected="selected"':''}} >{{$account->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Sale Tax</label>
                                        <select name="sell_tax_id" class="form-control">
                                            @foreach($data['taxes'] as $tax)    
                                                <option value="{{$tax->id}}" {{(isset($data['item']['sell_tax_id']) && $data['item']['sell_tax_id']==$tax->id)?'Selected="selected"':''}} >{{$tax->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Sale Description</label>
                                        <textarea class="form-control" name="sell_description">{{isset($data['item']['sell_description'])?$data['item']['sell_description']:''}}</textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">&nbsp;</div>
                        <div class="col-md-2">           
                            <div class="dropdown">
                                <button type="submit" class="btn btn-primary btn-primary2">Save</button>
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
        $(".chkPassport").click(function () {
            if ($(this).is(":checked")) {
                if($(this).attr('name')=='is_sell')
                    $("#dvsell").show();
                else
                    $("#dvPurc").show();
                
            } else {
                if($(this).attr('name')=='is_sell'){
                    $("#dvsell").hide();
                }
                else{
                    $("#dvPurc").hide();
                }
            }
        });
    </script>
</div>
@endsection