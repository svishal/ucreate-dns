@extends('layouts.projects_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading center-align">
                    <h3>@if(isset($project)){{ strtoupper(getProjectName($project->id,1))}} @else Add Domain @endif </h3>
                </div>


                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        @if(isset($project))
                        <form action="{{url('projects/'.$project->id)}}" method="Post" enctype="multipart/form-data">
                            <input  type="hidden" name="_method" value="PUT">
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                            @else
                            <form action="{{url('projects')}}" method="Post" enctype="multipart/form-data">
                                <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                                @endif
                            <div class="form-group col-md-6 ">
                                    <div class="col-md-6 ">
                                        <label>Name</label>
                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="name" value="{{($project->name)??old('name')}}">
                                        @if ($errors->has('name'))
                                        <p class="validation-error">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>URL</label>
                                    </div> 
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="url" value="{{($project->url)??old('url')}}">
                                        @if ($errors->has('url'))
                                        <p class="validation-error">{{ $errors->first('url') }}</p>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Domain Registrar</label>
                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="domain_registrar" value="{{($project->projectDetail->domain_registrar)??old('domain_registrar')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Registrant</label>
                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="registrant" value="{{($project->projectDetail->registrant)??old('registrant')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Contact</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="contact" value="{{($project->projectDetail->contact)??old('contact')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Website Title</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="website_title" value="{{($project->projectDetail->website_title)??old('website_title')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Technology</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="language" value="{{($project->projectDetail->language)??old('language')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Server Type</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="server_type" value="{{($project->projectDetail->server_type)??old('server_type')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Hosted On</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="hosted_on" value="{{($project->projectDetail->hosted_on)??old('hosted_on')}}">
                                    </div>
                                </div>
                              
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Contact Email</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="contact_email" value="{{($project->projectDetail->contact_email)??old('contact_email')}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Created Date</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control date_picker" type="text" name="created_date" value="{{(isset($project->projectDetail->created_date))?date('d-m-Y', strtotime($project->projectDetail->created_date)):old('created_date')}}" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Expiry Date</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control date_picker" type="text" name="expires_date" value="{{(isset($project->projectDetail->expires_date))?date('d-m-Y', strtotime($project->projectDetail->expires_date)):old('expires_date')}}" readonly="readonly">
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Address</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="address" value="{{($project->projectDetail->address)??old('address')}}">
                                    </div>
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>SSL</label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="ssl" name="ssl" @if(isset($project->projectDetail->ssl)) checked="checked" @endif >Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="ssl_info" style="display: none">
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>SSL Provider</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="ssl_provider" value="{{($project->projectDetail->ssl_provider)??old('ssl_provider')}}">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>Upload SSL CRT File</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input type="file" name="ssl_crt_file" value="">
                                            @if(!empty($project->projectDetail->ssl_crt_file))
                                            <a href="{{readPrivateFileUrl($project->projectDetail->ssl_crt_file)}}" target="_blank">{{$project->projectDetail->ssl_crt_file}}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>Upload Server Key File</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input type="file" name="ssl_server_key_file" value="">
                                            @if(!empty($project->projectDetail->ssl_server_key_file))
                                            <a href="{{readPrivateFileUrl($project->projectDetail->ssl_server_key_file)}}" target="_blank">{{$project->projectDetail->ssl_server_key_file}}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>Upload CSR File</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input type="file" name="ssl_csr_file" value="">
                                            @if(!empty($project->projectDetail->ssl_csr_file))
                                            <a href="{{readPrivateFileUrl($project->projectDetail->ssl_csr_file)}}" target="_blank">{{$project->projectDetail->ssl_csr_file}}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>Upload Server Pass Key File</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input type="file" name="ssl_server_pass_key_file" value="">
                                            @if(!empty($project->projectDetail->ssl_server_pass_key_file))
                                            <a href="{{readPrivateFileUrl($project->projectDetail->ssl_server_pass_key_file)}}" target="_blank">{{$project->projectDetail->ssl_server_pass_key_file}}</a>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group col-md-6">
                                    <div class="col-md-6">
                                        <label>Delegate Access Account </label>

                                    </div> 
                                    <div class="col-md-6 ">
                                        <input class="form-control" type="text" name="address" value="{{($project->projectDetail->delegate_access_account)??old('delegate_access_account')}}">
                                    </div>
                                   </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>SSL Expiry</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input class="form-control date_picker" type="text" name="ssl_expiry" value="{{(isset($project->projectDetail->ssl_expiry))?date('d-m-Y', strtotime($project->projectDetail->ssl_expiry)):old('ssl_expiry')}}" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-6">
                                            <label>SSL Type</label>
                                        </div> 
                                        <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="ssl_type" value="{{($project->projectDetail->ssl_type)??old('ssl_type')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group center-align ">
                                    <input class="btn btn-lg btn-primary" type="submit">         
                                </div>

                            </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
