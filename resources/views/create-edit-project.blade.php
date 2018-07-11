@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
          <div class="col-md-12">
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
                <div class="panel-heading center-align"><h3>{{ getProjectName($project->id,1)}} </h3></div>
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
                         <input  type="hidden" name="_method" value="PUT">
                         <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                    @else
                        <form action="{{url('projects')}}" method="Post">
                         <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                    @endif
                        <div class="form-group col-md-8 col-md-offset-2">
                            <div class="col-md-4 col-md-offset-2">
                                <label>Short Name</label>
                            </div> 
                            <div class="col-md-4 col-md-offset-2">
                                <input class="form-control" class="form-control" type="text" name="short_name" value="{{($project->short_name)??old('short_name')}}"> 
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                                   <label>Name</label>
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                                  <input class="form-control" type="text" name="name" value="{{($project->name)??old('name')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>URL</label>
                        </div> 
                               <div class="col-md-4 col-md-offset-2">
                         <input class="form-control" type="text" name="url" value="{{($project->url)??old('url')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                                      <label>Domain Registrar</label>
                            </div> 
                               <div class="col-md-4 col-md-offset-2">
                         <input class="form-control" type="text" name="domain_registrar" value="{{($project->projectDetail->domain_registrar)??old('domain_registrar')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                                      <label>Registrant</label>
                      </div> 
                               <div class="col-md-4 col-md-offset-2">
                            <input class="form-control" type="text" name="registrant" value="{{($project->projectDetail->registrant)??old('registrant')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                           <label>Contact</label>
                      
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                           <input class="form-control" type="text" name="contact" value="{{($project->projectDetail->contact)??old('contact')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>Name Servers</label>
                       
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                          <input class="form-control" type="text" name="name_servers" value="{{($project->projectDetail->name_servers)??old('name_servers')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>Website Title</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                         <input class="form-control" type="text" name="website_title" value="{{($project->projectDetail->website_title)??old('website_title')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                          <label>Website Description</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                        <textarea name="website_description">{{($project->projectDetail->website_description)??old('website_description')}}</textarea>
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                             <label>Language</label>
                       
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                          <input class="form-control" type="text" name="language" value="{{($project->projectDetail->language)??old('language')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>Server Type</label>
                      
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                           <input class="form-control" type="text" name="server_type" value="{{($project->projectDetail->server_type)??old('server_type')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>Hosted On</label>
                       
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                          <input class="form-control" type="text" name="hosted_on" value="{{($project->projectDetail->hosted_on)??old('hosted_on')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                          <label>DNSSEC</label>
                      
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                           <input class="form-control" type="text" name="dnssec" value="{{($project->projectDetail->dnssec)??old('dnssec')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                         <label>Contact Email</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                         <input class="form-control" type="text" name="contact_email" value="{{($project->projectDetail->contact_email)??old('contact_email')}}">
                               </div>
                         </div>
                        
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                        <label>Created Date</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                        <input class="form-control" type="text" name="created_date" value="{{($project->projectDetail->created_date)??old('created_date')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                        <label>Expiry Date</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                      <input class="form-control" type="text" name="expires_date" value="{{($project->projectDetail->expires_date)??old('expires_date')}}">
                               </div>
                         </div>
                        
                     
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                             <label>Address</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                        <input class="form-control" type="text" name="address" value="{{($project->projectDetail->address)??old('address')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                             <label>Alexa Rank</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                         <input class="form-control" type="text" name="alexa_rank" value="{{($project->projectDetail->alexa_rank)??old('alexa_rank')}}">
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                               <label>SSL</label>
                        
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                             <div class="checkbox">
                              <label><input type="checkbox" value="{{($project->projectDetail->ssl)??old('ssl')}}">Yes</label>
                                  </div>
                               </div>
                         </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                               <div class="col-md-4 col-md-offset-2">
                               <label>SSL Expiry</label>
                                </div> 
                               <div class="col-md-4 col-md-offset-2">
                             <input class="form-control" type="text" name="ssl_expiry" value="{{($project->projectDetail->ssl_expiry)??old('ssl_expiry')}}">
                               </div>
                        
                               <div class="col-md-4 col-md-offset-2">
                               <label>SSL Type</label>
                               </div> 
                               <div class="col-md-4 col-md-offset-2">
                             <input class="form-control" type="text" name="ssl_type" value="{{($project->projectDetail->ssl_type)??old('ssl_type')}}">
                               </div>
                         </div>
                 <div class="form-group col-md-8 col-md-offset-4">
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
