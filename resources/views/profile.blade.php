@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('password_error'))
                    <div class="alert alert-danger">
                        {{ session('password_error') }}
                    </div>
                    @endif
                    @if (session('password_success'))
                    <div class="alert alert-success">
                        {{ session('password_success') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Change password</h4>
                                    <form method="post" action="{{ url('/password/update') }}" id="update_buyer_pwd_form" name="update_buyer_pwd_form">
                                        {{ csrf_field() }}
                                        <div class="col-md-12 ">
                                            <div class="form-group col-md-6">
                                                <div class="col-md-6">
                                                    <label>Current password <span class="notification-star-buyer">*</span></label>
                                                </div> 
                                                <div class="col-md-6 ">
                                                    <input class="form-control" tabindex="35" maxlength="30" size="30" type="password" name="old_password" id="old_password">
                                                    @if ($errors->has('old_password'))
                                                    <p class="validation-error">{{ $errors->first('old_password') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-md-6">
                                                    <label>New password <span class="notification-star-buyer">*</span></label>
                                                </div> 
                                                <div class="col-md-6 ">
                                                    <input class="form-control" tabindex="36" maxlength="30" size="30" type="password" name="new_password" id="new_password">
                                                    @if ($errors->has('new_password'))
                                                    <p class="validation-error">{{ $errors->first('new_password') }}</p>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="col-md-6">
                                                    <label>Confirm new password <span class="notification-star-buyer">*</span></label>
                                                </div> 
                                                <div class="col-md-6 ">
                                                    <input class="form-control" tabindex="37" maxlength="30" size="30" type="password" name="confirm_password" id="confirm_password">
                                                    @if ($errors->has('confirm_password'))
                                                    <p class="validation-error">{{ $errors->first('confirm_password') }}</p>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <button  tabindex="38" type="submit" class="btn btn-primary" id="buyer_update_pass_btn">Save</button>
                                            </div>
                                        </div>
                                    </form>

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
