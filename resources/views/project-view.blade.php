@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading center-align"> <span><h3>{{ strtoupper(getProjectName($project->id,1))}}</h3></span> <span><a href="https://docs.google.com/gview?url={{url('/test')}}.pdf">how to add SSL</a></span></div>

                <div class="panel-body projects-page">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="panel-body col-md-6">
                        <div class="col-md-6">
                            <label>Short Name</label>
                        </div> 
                        <div class="col-md-6">
                           {{$project->short_name}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div> 
                        <div class="col-md-6">
                           {{$project->name}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Url</label>
                        </div> 
                        <div class="col-md-6">
                           <a href="{{$project->url}}" target="_blank">{{$project->url}}</a>
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Domain Registrar</label>
                        </div> 
                        <div class="col-md-6">
                           {{($project->projectDetail->domain_registrar)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Domain Registrant</label>
                        </div> 
                        <div class="col-md-6">
                            {{($project->projectDetail->registrant)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Contact</label>
                        </div> 
                        <div class="col-md-6">
                         {{($project->projectDetail->contact)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Website Title</label>
                        </div> 
                        <div class="col-md-6">
                        {{($project->projectDetail->website_title)??''}}  
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Technology</label>
                        </div> 
                        <div class="col-md-6">
                             {{($project->projectDetail->language)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Server Type</label>
                        </div> 
                        <div class="col-md-6">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Hosted On</label>
                        </div> 
                        <div class="col-md-6">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>DNSSEC</label>
                        </div> 
                        <div class="col-md-6">
                             {{($project->projectDetail->dnssec)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Contact Email</label>
                        </div> 
                        <div class="col-md-6">
                           {{($project->projectDetail->contact_email)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Created Date</label>
                        </div> 
                        <div class="col-md-6">
                             {{(isset($project->projectDetail->created_date))?date('d-m-Y', strtotime($project->projectDetail->created_date)):''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Expires Date</label>
                        </div> 
                        <div class="col-md-6">
                            {{ (isset($project->projectDetail->expires_date))?date('d-m-Y', strtotime($project->projectDetail->expires_date)):''}}
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div> 
                        <div class="col-md-6">
                           {{($project->projectDetail->address)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Delegate Access Account </label>
                        </div> 
                        <div class="col-md-6">
                           {{($project->projectDetail->delegate_access_account)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>Alexa Rank</label>
                        </div> 
                        <div class="col-md-6">
                           {{($project->projectDetail->alexa_rank)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-md-6">
                        <div class="col-md-6">
                            <label>SSL </label>
                        </div> 
                        <div id="view_ssl" data-ssl="{{($project->projectDetail->ssl)??''}}" class="col-md-6">
                           {{($project->projectDetail->ssl)??'N/A'}}       
                        </div>
                     </div>
                     <div id="ssl_info" style="display: none">
                         <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                                <label>SSL Provider</label>
                           </div> 
                           <div class="col-md-6">
                            {{($project->projectDetail->ssl_provider)??''}}      
                           </div>
                        </div>
                        <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                               <label>SSL CRT File</label>
                           </div> 
                           <div class="col-md-6">
                            @if(!empty($project->projectDetail->ssl_crt_file)) <a href="{{readPrivateFileUrl($project->projectDetail->ssl_crt_file)}}" target="_blank">{{$project->projectDetail->ssl_crt_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                               <label>Server Key File </label>
                           </div> 
                           <div class="col-md-6">
                            @if(!empty($project->projectDetail->ssl_server_key_file)) <a href="{{readPrivateFileUrl($project->projectDetail->ssl_server_key_file)}}" target="_blank">{{$project->projectDetail->ssl_server_key_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                               <label>CSR File</label>
                           </div> 
                           <div class="col-md-6">
                            @if(!empty($project->projectDetail->ssl_csr_file)) <a href="{{readPrivateFileUrl(getImageUrl($project->projectDetail->ssl_csr_file))}}" target="_blank">{{$project->projectDetail->ssl_csr_file}}</a> @else'' @endif 
                           </div>
                        </div>
                        <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                               <label>SSL expiry </label>
                           </div> 
                           <div class="col-md-6">
                            {{(isset($project->projectDetail->ssl_expiry))? date('d-m-Y', strtotime($project->projectDetail->ssl_expiry)):''}}
                           </div>
                        </div>
                        <div class="panel-body  col-md-6">
                           <div class="col-md-6">
                               <label>SSL type </label>
                           </div> 
                           <div class="col-md-6">
                            {{($project->projectDetail->ssl_type)??''}}       
                           </div>
                        </div>
                     </div>
                    <span class="pull-right"> <a  href="{{url('projects/'.$project->id.'/edit')}}">Edit</a>|<a href="{{url('projects/'.$project->id.'/delete')}}">Delete</a></span>
                </div>
                <div class="panel-body projects-page">
                    <div class="panel-heading center-align"><h3>Additional Domain details</h3> </div>
                    <div class="additional-domain-details-panel">
                        @if(!empty($domain_details))
                        @foreach($domain_details as $key=>$record)
                        <div class="panel-body  col-md-6">
                            <div class="col-md-6">
                                <label>{{$key}}</label>
                            </div> 
                            <div class="col-md-6">
                                @if(!empty($record))
                                  @foreach($record as $key=>$value)
                                 {{$value}}      
                               @endforeach
                               @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
