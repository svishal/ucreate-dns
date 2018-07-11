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
                        <input type="text" name="domain_registrar" value="{{($project->projectDetail->domain_registrar)??old('domain_registrar')}}">
                        <label>Registrant</label>
                        <input type="text" name="registrant" value="{{($project->projectDetail->registrant)??old('registrant')}}">
                        <label>Contact</label>
                        <input type="text" name="contact" value="{{($project->projectDetail->contact)??old('contact')}}">
                        <label>Name Servers</label>
                        <input type="text" name="name_servers" value="{{($project->projectDetail->name_servers)??old('name_servers')}}">
                        <label>Website Title</label>
                        <input type="text" name="website_title" value="{{($project->projectDetail->website_title)??old('website_title')}}">
                        <label>Website Description</label>
                        <textarea name="website_description">{{($project->projectDetail->website_description)??old('website_description')}}</textarea>
                        <label>Language</label>
                        <input type="text" name="language" value="{{($project->projectDetail->language)??old('language')}}">
                        <label>Server Type</label>
                        <input type="text" name="server_type" value="{{($project->projectDetail->server_type)??old('server_type')}}">
                        <label>Hosted On</label>
                        <input type="text" name="hosted_on" value="{{($project->projectDetail->hosted_on)??old('hosted_on')}}">
                        <label>DNSSEC</label>
                        <input type="text" name="dnssec" value="{{($project->projectDetail->dnssec)??old('dnssec')}}">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" value="{{($project->projectDetail->contact_email)??old('contact_email')}}">
                        <label>Created Date</label>
                        <input type="text" name="created_date" value="{{($project->projectDetail->created_date)??old('created_date')}}">
                        <label>Expiry Date</label>
                        <input type="text" name="expires_date" value="{{($project->projectDetail->expires_date)??old('expires_date')}}">
                        <label>Address</label>
                        <input type="text" name="address" value="{{($project->projectDetail->address)??old('address')}}">
                        <label>Alexa Rank</label>
                        <input type="text" name="alexa_rank" value="{{($project->projectDetail->alexa_rank)??old('alexa_rank')}}">
                        <label>SSL</label>
                        <input type="text" name="ssl" value="{{($project->projectDetail->ssl)??old('ssl')}}">
                        <label>SSL Expiry</label>
                        <input type="text" name="ssl_expiry" value="{{($project->projectDetail->ssl_expiry)??old('ssl_expiry')}}">
                        <input type="submit">
                    </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
