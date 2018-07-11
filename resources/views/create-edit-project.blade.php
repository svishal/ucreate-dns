@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(count($errors->all()))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(isset($project))
                <div class="panel-heading">{{$project->name}}</div>
                @endif

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
                        <form action="{{url('projects')}}" method="Post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @endif
                    <label>Short Name</label>
                        <input type="text" name="short_name" value="{{($project->short_name)??old('short_name')}}">
                        <label>Name</label>
                        <input type="text" name="name" value="{{($project->name)??old('name')}}">
                        <label>URL</label>
                        <input type="text" name="url" value="{{($project->url)??old('url')}}">
                        <label>Domain Registrar</label>
                        <input type="text" name="domain_registrar" value="{{($project->domain_registrar)??old('domain_registrar')}}">
                        <label>Registrant</label>
                        <input type="text" name="registrant" value="{{($project->registrant)??old('registrant')}}">
                        <label>Contact</label>
                        <input type="text" name="contact" value="{{($project->contact)??old('contact')}}">
                        <label>Name Servers</label>
                        <input type="text" name="name_servers" value="{{($project->name_servers)??old('name_servers')}}">
                        <label>Website Title</label>
                        <input type="text" name="website_title" value="{{($project->website_title)??old('website_title')}}">
                        <label>Website Description</label>
                        <textarea name="website_description">{{($project->website_description)??old('website_description')}}</textarea>
                        <label>Language</label>
                        <input type="text" name="language" value="{{($project->language)??old('language')}}">
                        <label>Server Type</label>
                        <input type="text" name="server_type" value="{{($project->server_type)??old('server_type')}}">
                        <label>Hosted On</label>
                        <input type="text" name="hosted_on" value="{{($project->hosted_on)??old('hosted_on')}}">
                        <label>DNSSEC</label>
                        <input type="text" name="dnssec" value="{{($project->dnssec)??old('dnssec')}}">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" value="{{($project->contact_email)??old('contact_email')}}">
                        <label>Created Date</label>
                        <input type="text" name="created_date" value="{{($project->created_date)??old('created_date')}}">
                        <label>Expiry Date</label>
                        <input type="text" name="expires_date" value="{{($project->expires_date)??old('expires_date')}}">
                        <label>Address</label>
                        <input type="text" name="address" value="{{($project->address)??old('address')}}">
                        <label>Alexa Rank</label>
                        <input type="text" name="alexa_rank" value="{{($project->alexa_rank)??old('alexa_rank')}}">
                        <label>SSL</label>
                        <input type="text" name="ssl" value="{{($project->ssl)??old('ssl')}}">
                        <label>SSL Expiry</label>
                        <input type="text" name="ssl_expiry" value="{{($project->ssl_expiry)??old('ssl_expiry')}}">
                        <input type="submit">
                    </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
