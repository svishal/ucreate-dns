@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading center-align"> <span><h3>{{ getProjectName($project->id,1)}}</h3></span> <span> <a class="right" href="{{url('projects/'.$project->id.'/edit')}}">Edit</a></span></div>

                <div class="panel-body projects-page">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="panel-body col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Short Name</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{$project->short_name}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Name</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{$project->name}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Url</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           <a href="{{$project->url}}" target="_blank">{{$project->url}}</a>
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Domain Registrar</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->domain_registrar)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Domain Registrant</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                            {{($project->projectDetail->registrant)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Contact</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                         {{($project->projectDetail->contact)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Name Servers</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                        {{($project->projectDetail->name_servers)??''}}   
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Website Title</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                        {{($project->projectDetail->website_title)??''}}  
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Website Description</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->website_description)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>language</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->language)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Server Type</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Hosted On</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>DNSSEC</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->dnssec)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Contact Email</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->contact_email)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Created Date</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->created_date)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Expires Date</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                            {{($project->projectDetail->expires_date)??''}}      
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Address</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->address)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Delegate Access Account </label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->delegate_access_account)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Alexa Rank</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           {{($project->projectDetail->alexa_rank)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>SSL </label>
                        </div> 
                        <div  class="col-md-4 col-md-offset-2">
                            <input id="ssl" type="hidden" value="{{($project->projectDetail->ssl)??''}}">
                           {{($project->projectDetail->ssl)??''}}       
                        </div>
                     </div>
                     <div id="ssl_info" style="display: none">
                        <div class="panel-body  col-md-8 col-md-offset-2">
                           <div class="col-md-4 col-md-offset-2">
                               <label>SSL expiry </label>
                           </div> 
                           <div class="col-md-4 col-md-offset-2">
                             {{($project->projectDetail->ssl_expiry)??''}}        
                           </div>
                        </div>
                        <div class="panel-body  col-md-8 col-md-offset-2">
                           <div class="col-md-4 col-md-offset-2">
                               <label>SSL CRT File</label>
                           </div> 
                           <div class="col-md-4 col-md-offset-2">
                            @if(!empty($project->projectDetail->ssl_crt_file)) <a href="{{getImageUrl($project->projectDetail->ssl_crt_file)}}" target="_blank">{{$project->projectDetail->ssl_crt_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-md-8 col-md-offset-2">
                           <div class="col-md-4 col-md-offset-2">
                               <label>Server Key File </label>
                           </div> 
                           <div class="col-md-4 col-md-offset-2">
                            @if(!empty($project->projectDetail->ssl_server_key_file)) <a href="{{getImageUrl($project->projectDetail->ssl_server_key_file)}}" target="_blank">{{$project->projectDetail->ssl_server_key_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-md-8 col-md-offset-2">
                           <div class="col-md-4 col-md-offset-2">
                               <label>CSR File</label>
                           </div> 
                           <div class="col-md-4 col-md-offset-2">
                            @if(!empty($project->projectDetail->ssl_csr_file)) <a href="{{getImageUrl($project->projectDetail->ssl_csr_file)}}" target="_blank">{{$project->projectDetail->ssl_csr_file}}</a> @else'' @endif 
                           </div>
                        </div>
                        <div class="panel-body  col-md-8 col-md-offset-2">
                           <div class="col-md-4 col-md-offset-2">
                               <label>SSL type </label>
                           </div> 
                           <div class="col-md-4 col-md-offset-2">
                            {{($project->projectDetail->ssl_type)??''}}       
                           </div>
                        </div>
                     </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
