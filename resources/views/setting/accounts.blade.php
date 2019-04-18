@extends('layouts.app')
@section('title', 'Dashboard Title')
@section('content')

<div class="content-wrapper">
    <div class="content-body">
        <!-- Recent Transactions -->
        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Transactions</h4>
                    <button type="button" class="btn btn-primary offset-md-11" data-toggle="modal" data-target="#AddContactModal">Add</button>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                            <tr>
                                <th class="border-top-0"></th>
                                <th class="border-top-0">Code</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Type</th>
                                <th class="border-top-0">Tax Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate">{{$account->code}}</td>
                                <td class="text-truncate">
                                    <a href="JavaScript:void(0)" class="taxlink" data="{{$account->id}}" data-toggle="modal" data-target="#AddContactModal">{{$account->name}}</a><br/>
                                    <span>{{$account->description}}</span>
                                </td>
                                <td class="text-truncate">{{$account->AccountGroups->title}}</td>
                                <td class="text-truncate">{{$account->taxes->name}}({{$account->taxes->total_tax_rate}})</td>
                                
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
<div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <section class="contact-form">
                <form id="form-add-contact" action="{{route('account-save')}}" method="post" class="contact-input">
                    {{ csrf_field() }}
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 label-control">Account Type</label>
                                    <div class="col-md-6">
                                        <input type="hidden" id="accountId" name="id" value="" />
                                        <select id="account_groups_id" name="account_groups_id" class="form-control">
                                            @foreach($accountGroup as $key=>$val)
                                            <optgroup label="{{$key}}">
                                            @foreach($val as $acount)
                                            <option value="{{$acount->id}}">{{$acount->title}}</option>
                                            @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12 label-control">Code</label>
                                    <label class="col-md-12 label-control" >
                                        A unique code/number for this account (limited to 10 characters)
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="code" class="form-control" placeholder="Code" name="code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12 label-control">Name</label>
                                    <label class="col-md-12 label-control" >
                                        A short title for this account (limited to 150 characters)
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12 label-control">Description (optional)</label>
                                    <label class="col-md-12 label-control" >
                                        A description of how this account should be used
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Description" id="description" name="description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-12 label-control">Tax</label>
                                    <label class="col-md-12 label-control" >
                                        The default tax setting for this account
                                    </label>
                                    <div class="col-md-6">
                                        <select id="taxes_id" name="taxes_id" class="form-control">
                                            @foreach($taxes as $tax)
                                            <option value="{{$tax->id}}">{{$tax->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="checkbox" name="show_dashboard_watchlist" id="show_dashboard_watchlist">
                                        <label class="label-control">Show on Dashboard Watchlist</label>
                                    </div>                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="show_expense_claims" name="show_expense_claims">
                                        <label class="label-control">Show in Expense Claims</label>
                                    </div>                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="enable_payments" name="enable_payments">
                                        <label class="label-control">Enable payments to this account</label>
                                    </div>                                    
                                </div>

                            </div>
                            <div class="col-md-6">
                                <img src="images/account.png" altr="account"/>
                            </div>
                        </div>
                           
                    </div>
                    <div class="modal-footer">
                    <fieldset class="position-relative has-icon-left mb-0">
                        <button type="submit" id="add-contact-item" class="btn btn-info add-contact-item" ><i
                            class="la la-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Save</span></button>

                                <button type="button" id="add-contact-item" class="btn btn-danger add-contact-item" data-dismiss="modal"><i
                            class="la la-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Cancel</span></button>
                    </fieldset>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.taxlink').click(function(){
        $.ajax({
            type:'GET',
            url:'/ajaxAccountData',
            data:{id:$(this).attr('data')},
            success:function(data){
                $('#account_groups_id').val(data.account_groups_id);
                $('#accountId').val(data.id);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#description').val(data.description);
                $('#taxes_id').val(data.taxes_id);
                $('#show_dashboard_watchlist').prop( "checked", data.show_dashboard_watchlist );
                $('#show_expense_claims').prop( "checked", data.show_expense_claims);
                $('#enable_payments').prop( "checked", data.enable_payments);
            }
        });
    });

    $("#compAdd").click(function(){
        $('#components').append($('#compo').html());
    });

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find("input,textarea,select").val('').end()
        .find("input[type=checkbox]").prop("checked", "").end();
    });
});

</script>
@endsection