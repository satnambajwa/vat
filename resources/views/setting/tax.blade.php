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
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Tax Rate</th>
                                <th class="border-top-0">Accounts using this Tax Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxes as $tax)
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="JavaScript:void(0)" data-toggle="modal" data-target="#AddContactModal">{{$tax->name}}</a></td>
                                <td class="text-truncate">{{$tax->total_tax_rate}}</td>
                                <td>{{count($tax->accounts)}}                  </td>
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
                <form id="form-add-contact" class="contact-input">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Tax Rate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group row">
                            <label class="col-md-12 label-control">Tax Rate Display Name</label>
                            <label class="col-md-12 label-control" >
                                The name as you would like it to appear in Xero
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Contact Name" value="" name="contact_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 label-control">Tax Components</label>
                            <div class="col-md-12 mx-auto">
                                <div id="components">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Contact Name" value="" name="contact_name">
                                        </div>
                                        <div class="col-md-2 offset-md-3">
                                            <input type="text" class="form-control" placeholder="%" name="contact_name">
                                        </div>
                                    </div>
                                </div>
                                <div id="compo" class="hide">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Contact Name" value="" name="contact_name">
                                        </div>
                                        <div class="col-md-2 offset-md-3">
                                            <input type="text" class="form-control" placeholder="%" name="contact_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a id="compAdd" href="JavaScript:void(0);" class="btn btn-primary offset-md-1">Add a Component</a>
                        </div>
                           
                    </div>
                    <div class="modal-footer">
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="button" id="add-contact-item" class="btn btn-info add-contact-item" data-dismiss="modal"><i
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
   $("#compAdd").click(function(){
      $('#components').append($('#compo').html());
   });
});

</script>
@endsection