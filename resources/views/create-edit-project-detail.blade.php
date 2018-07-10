@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$project->name}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                     @if(isset($project))
                        <form action="{{url('projects/'.$project->id)}}" method="Post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @else
                        <form action="{{url('projects/'.$project->id)}}" method="Post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @endif
                        <label>Domain Registrar</label>
                        <input type="text" name="domain_registrar" value="{{(old('domain_registrar'))??''}}">
                        <label>Registrant</label>
                        <input type="text" name="registrant" value="{{(old('registrant'))??''}}">
                        <label>Contact</label>
                        <input type="text" name="contact" value="{{(old('contact'))??''}}">
                        <label>Name Servers</label>
                        <input type="text" name="name_servers" value="{{(old('name_servers'))??''}}">
                        <label>Website Title</label>
                        <input type="text" name="website_title" value="{{(old('website_title'))??''}}">
                        <label>Website Description</label>
                        <input type="text" name="website_description" value="{{(old('website_description'))??''}}">
                        <label>Language</label>
                        <input type="text" name="language" value="{{(old('language'))??''}}">
                        <label>Server Type</label>
                        <input type="text" name="server_type" value="{{(old('server_type'))??''}}">
                        <label>Hosted On</label>
                        <input type="text" name="hosted_on" value="{{(old('hosted_on'))??''}}">
                        <label>DNSSEC</label>
                        <input type="text" name="dnssec" value="{{(old('dnssec'))??''}}">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" value="{{(old('contact_email'))??''}}">
                        <label>Created Date</label>
                        <input type="text" name="created_date" value="{{(old('created_date'))??''}}">
                        <label>Expiry Date</label>
                        <input type="text" name="expires_date" value="{{(old('expires_date'))??''}}">
                        <label>Address</label>
                        <input type="text" name="address" value="{{(old('address'))??''}}">
                        <label>Alexa Rank</label>
                        <input type="text" name="alexa_rank" value="{{(old('alexa_rank'))??''}}">
                        <label>SSL</label>
                        <input type="text" name="ssl" value="{{(old('ssl'))??''}}">
                        <label>SSL Expiry</label>
                        <input type="text" name="ssl_expiry" value="{{(old('ssl_expiry'))??''}}">
                        <input type="submit">
                    </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
