@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading center-align col-md-12"> 
                    <span class="col-lg-6  col-md-6 "><h3 class="pull-right">{{ strtoupper(getProjectName($project->id,1))}}</h3></span> 
                    <span class="col-lg-6  col-md-6  add-ssl-guide-link"><a class="pull-right" target="_blank" href="https://docs.google.com/gview?url=http://ucreate-dns.herokuapp.com/test.pdf">How to add SSL</a></span>
                </div>

                <div class="panel-body projects-page">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="panel-body col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Short Name</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{$project->short_name}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Name</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{$project->name}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Url</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           <a href="{{$project->url}}" target="_blank">{{$project->url}}</a>
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Domain Registrar</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->domain_registrar)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Domain Registrant</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                            {{($project->projectDetail->registrant)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Contact</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                         {{($project->projectDetail->contact)??''}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Website Title</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                        {{($project->projectDetail->website_title)??''}}  
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Technology</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                             {{($project->projectDetail->language)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Server Type</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Hosted On</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                             {{($project->projectDetail->server_type)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>DNSSEC</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                             {{($project->projectDetail->dnssec)??''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Contact Email</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->contact_email)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Created Date</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                             {{(isset($project->projectDetail->created_date))?date('d-m-Y', strtotime($project->projectDetail->created_date)):''}}     
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Expires Date</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                            {{ (isset($project->projectDetail->expires_date))?date('d-m-Y', strtotime($project->projectDetail->expires_date)):''}}
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Address</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->address)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Delegate Access Account </label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->delegate_access_account)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>Alexa Rank</label>
                        </div> 
                        <div class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->alexa_rank)??''}}       
                        </div>
                     </div>
                     <div class="panel-body  col-lg-6  col-md-6 ">
                        <div class="col-lg-6  col-md-6 ">
                            <label>SSL </label>
                        </div> 
                        <div id="view_ssl" data-ssl="{{($project->projectDetail->ssl)??''}}" class="col-lg-6  col-md-6 ">
                           {{($project->projectDetail->ssl)??'N/A'}}       
                        </div>
                     </div>
                     <div id="ssl_info" style="display: none">
                         <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                                <label>SSL Provider</label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            {{($project->projectDetail->ssl_provider)??''}}      
                           </div>
                        </div>
                        <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                               <label>SSL CRT File</label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            @if(!empty($project->projectDetail->ssl_crt_file)) <a href="{{readPrivateFileUrl($project->projectDetail->ssl_crt_file)}}" target="_blank">{{$project->projectDetail->ssl_crt_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                               <label>Server Key File </label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            @if(!empty($project->projectDetail->ssl_server_key_file)) <a href="{{readPrivateFileUrl($project->projectDetail->ssl_server_key_file)}}" target="_blank">{{$project->projectDetail->ssl_server_key_file}}</a> @else'' @endif      
                           </div>
                        </div>
                        <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                               <label>CSR File</label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            @if(!empty($project->projectDetail->ssl_csr_file)) <a href="{{readPrivateFileUrl(getImageUrl($project->projectDetail->ssl_csr_file))}}" target="_blank">{{$project->projectDetail->ssl_csr_file}}</a> @else'' @endif 
                           </div>
                        </div>
                        <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                               <label>SSL expiry </label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            {{(isset($project->projectDetail->ssl_expiry))? date('d-m-Y', strtotime($project->projectDetail->ssl_expiry)):''}}
                           </div>
                        </div>
                        <div class="panel-body  col-lg-6  col-md-6 ">
                           <div class="col-lg-6  col-md-6 ">
                               <label>SSL type </label>
                           </div> 
                           <div class="col-lg-6  col-md-6 ">
                            {{($project->projectDetail->ssl_type)??''}}       
                           </div>
                        </div>
                     </div>
                    <span class="pull-right"> <a  href="{{url('projects/'.$project->id.'/edit')}}">Edit</a>|<a href="javascript:void(0)" id="delete_project">Delete</a>
                        <form action="{{url('projects/'.$project->id)}}" method="Post" id="delete_project_form">
                            <input  type="hidden" name="_method" value="DELETE">
                            <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </span>
                </div>
                <div class="panel-body projects-page">
                    <div class="panel-heading center-align"><h3>Additional Domain details</h3> </div>
                    <div class="additional-domain-details-panel">
                        @if(!empty($domain_details))
                        <div class="records-last-updated-on  col-md-12">Last updated on @php print_r( date('d-m-Y', strtotime($domain_details['updated_at']))); @endphp | <span id="records_success_message"><a id="update_records_now"  project-id="{{$project->id}}" href="javascript:void(0)" >Update records now</a> </span> </div>
                        @foreach($domain_details as $key=>$record)
                       @php if($key=='id'|| $key=='project_id' || $key=='created_at'  || $key=='updated_at')  continue; @endphp 
                        <div class="panel-body  col-lg-6  col-md-6 ">
                            <div class="col-lg-6  col-md-6 ">
                                <label>{{$key}}</label>
                            </div> 
                            <div class="col-lg-6  col-md-6 ">
                                @if(!empty($record))
                                  @foreach(explode(',', $record) as $key=>$value)
                                 {{$value}}      
                               @endforeach
                               @endif
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span id="records_success_message"><a id="update_records_now"  project-id="{{$project->id}}" href="javascript:void(0)" >Update records now</a> </span> </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
