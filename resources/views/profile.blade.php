@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                 <div class="col-md-12">
                                     <div class="col-md-2">
                                 <h4>Change password</h4>
                                       </div>
                                <div class="col-md-10">
                                <form method="post" action="{{ url('/') }}" id="update_buyer_pwd_form" name="update_buyer_pwd_form">
                                        {{ csrf_field() }}
                                        <div class="col-md-12 ">
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                                 <label>Current password <span class="notification-star-buyer">*</span></label>
                                            </div> 
                                            <div class="col-md-6 ">
                                                <input class="form-control" tabindex="35" maxlength="30" size="30" type="password" name="old_password" id="old_password">
                                                <div class="error-message" style="display: none;" id="validation_error_existing_password"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                             <label>New password <span class="notification-star-buyer">*</span></label>
                                            </div> 
                                            <div class="col-md-6 ">
                                               <input class="form-control" tabindex="36" maxlength="30" size="30" type="password" name="new_password" id="new_password">
                                               <div class="error-message" style="display: none;" id="validation_error_reset_password"></div>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6">
                                             <label>Confirm new password <span class="notification-star-buyer">*</span></label>
                                            </div> 
                                            <div class="col-md-6 ">
                                              <input class="form-control" tabindex="37" maxlength="30" size="30" type="password" name="confirm_password" id="confirm_password">
                                                 <div class="error-message" style="display: none;" id="validation_error_confirm_password"></div>
                                              
                                            </div>
                                        </div>
                                       <div class="col-md-12 pull-right">
                                             <div class="col-md-6 col-md-offset-6">
                                             <button  tabindex="38" type="button" class="btn btn-sm btn-primary" id="buyer_update_pass_btn">Change Password</button>
                                             </div>
                                        </div>
                                           </div>
                                    </form>
                                
                                 </div>
                                 </div>
                            </div><!--/row-->    
                        </div><!--/col-12-->
                    </div><!--/row-->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
