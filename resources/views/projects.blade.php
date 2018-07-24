@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3>All Projects</h3> 
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                     <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Domain Expiry Date</th>
                            <th>SSL Expiry Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($projects))
                           @foreach($projects as $project)
                            <tr>
                                <td><a href="@if(isset($project->project_id)) {{url('projects/'.$project->project_id)}} @else {{url('projects/'.$project->id)}} @endif">{{ucfirst($project->name)}}</a>
                                    <span class="site_url"><a target="_blank"href="{{$project->url}}"><img src="{{url('/images/external_url.png')}}"></a></span>

</td>
                              <td>
                                   @if(isset($project->projectDetail['expires_date']) && !empty($project->projectDetail['expires_date']))
                                        {{date('d-m-Y', strtotime($project->projectDetail['expires_date']))}}
                                   @elseif(isset($project->expires_date) && !empty($project->expires_date))
                                        {{date('d-m-Y', strtotime($project->expires_date))}}
                                   @else
                                        {{''}}
                                   @endif
                              </td>
                              <td>
                                    @if(isset($project->projectDetail['ssl_expiry']) && !empty($project->projectDetail['ssl_expiry']))
                                        {{date('d-m-Y', strtotime($project->projectDetail['ssl_expiry']))}}
                                    @elseif(isset($project->ssl_expiry) && !empty($project->ssl_expiry))
                                        {{date('d-m-Y', strtotime($project->ssl_expiry))}}
                                    @else
                                        {{''}}
                                    @endif
                              </td>
                              </tr>
                              </a>
                             @endforeach
                             @else
                              <tr>
                              <td> No projects found !!</td>
                               </tr>
                             @endif
                        </tbody>
                      </table>   
                    </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

