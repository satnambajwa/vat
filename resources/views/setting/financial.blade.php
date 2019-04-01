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
                                   
                                    <div class="card-content collpase show">
                                       <div class="card-body">

                                       
                                          {!! Form::open(array('route' =>'cupdate' ,'method'=>'post')) !!}
                                          {!! Form::hidden('_token',csrf_token()) !!}


                                             <div class="form-body">
                                                
                                                <h4 class="form-section"><i class="ft-user"></i> Financial settings</h4>
                                                <div class="form-group row">
                                                   <label class="col-md-12 label-control bbg" for="contactname">Currency</label>
                                                   <div class="col-md-12 mx-auto mb-30">
                                                      {Currency}
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-12 label-control bbg" for="projectinput1">Financial Year End</label>
                                                   <div class="col-md-12 mx-auto mb-30">
                                                      Finacial Year setting
                                                   </div>
                                                </div>

                                                <div class="form-group row">
                                                  <label class="col-md-12 label-control bbg" for="projectinput1">Sales Tax</label>
                                                  <div class="col-md-12 mx-auto mb-30 row">
                                                    <div class="col-md-3"><label class="col-md-12">Tax Basis</label><input type="text" name="" /></div>
                                                    <div class="col-md-3"><label class="col-md-12">Tax ID Number</label><input type="text" name="" /></div>
                                                    <div class="col-md-3"><label class="col-md-12">Tax ID Display Name</label><input type="text" name="" /></div>
                                                    <div class="col-md-3"><label class="col-md-12">Tax Period</label><input type="text" name="" /></div>
                                                  </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                  <label class="col-md-12 label-control bbg" for="projectinput1">Tax Defaults</label>
                                                  <div class="col-md-12 mx-auto mb-30">
                                                    <div class="row">
                                                        <label class="col-md-12">For Sales</label>
                                                        <input type="text" name="" />
                                                        <span>For Sales</span>
                                                    </div>
                                                    <div class="row">
                                                      <label class="col-md-12">For Purchases</label>
                                                      <input type="text" name="" />
                                                      <span>For Sales</span>
                                                    </div>
                                                    
                                                  </div>
                                                </div>


                                                <div class="form-group row">
                                                  <label class="col-md-12 label-control bbg" for="projectinput1">Lock Dates</label>
                                                  <div class="col-md-12 mx-auto mb-30 row">
                                                  Lock dates stop data from being changed for a specific period. You can change these at any time.<br/>
                                                  The lock date for this organisation is not set.
                                                  </div>
                                                </div>

                                                <div class="form-group row">
                                                  <label class="col-md-12 label-control bbg" for="projectinput1">Time zone</label>
                                                  <div class="col-md-12 mx-auto mb-30 row">
                                                  <select>
                                                    <option>test</option>
                                                  </select>
                                                  </div>
                                                </div>
                                                
                                                <div class="form-actions">
                                                   <button type="button" class="btn btn-warning mr-1"><i class="ft-x"></i> Cancel</button>
                                                   <!--<i class="la la-check-square-o"></i>-->
                                                   {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                                                </div>
                                                {!! Form::close() !!}
                                          </div>
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