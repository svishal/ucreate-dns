@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(Auth::user()->user_type_id === 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <h4>Add new user</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <form class="form-horizontal" method="POST" action="{{ url('user/create') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-6 control-label">Name</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-6 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-6 control-label">Confirm Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-6">
                                                    <button type="submit" class="btn btn-primary">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div><!--/row-->    
                        </div><!--/col-12-->
                    </div><!--/row-->
                    @endif
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <h4>Change password</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <form  class="form-horizontal" method="post" action="{{ url('password/update') }}" id="update_buyer_pwd_form" name="update_buyer_pwd_form">
                                            {{ csrf_field() }}
                                                <div class="form-group ">
                                                  <label class="col-md-6 control-label" >Current password </label>
                                                   
                                                    <div class="col-md-6 ">
                                                        <input class="form-control" tabindex="35" maxlength="30" size="30" type="password" name="old_password" id="old_password">
                                                        @if ($errors->has('old_password'))
                                                        <p class="validation-error">{{ $errors->first('old_password') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="col-md-6 control-label" >New password </label>
                                                    <div class="col-md-6 ">
                                                        <input class="form-control" tabindex="36" maxlength="30" size="30" type="password" name="new_password" id="new_password">
                                                        @if ($errors->has('new_password'))
                                                        <p class="validation-error">{{ $errors->first('new_password') }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                     <label class="col-md-6 control-label"> ConfirmNew password </label>
                                                    <div class="col-md-6 ">
                                                        <input class="form-control" tabindex="37" maxlength="30" size="30" type="password" name="confirm_password" id="confirm_password">
                                                        @if ($errors->has('confirm_password'))
                                                        <p class="validation-error">{{ $errors->first('confirm_password') }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-12 pull-right">
                                                    <div class="col-md-6 col-md-offset-6">
                                                        <button  tabindex="38" type="submit" class="btn btn-sm btn-primary" id="buyer_update_pass_btn">Change Password</button>
                                                    </div>
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
