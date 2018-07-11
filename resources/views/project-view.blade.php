@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading center-align"><h3>{{ getProjectName($project->id,1)}} </h3></div>

                <div class="panel-body">
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
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Domain Registrant</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Contact</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Name Servers</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Website title</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Website description</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>language</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Server Type</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Hosted On</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>DNSSEC</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Contact Email</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Created date</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Expires Date</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>Alexa rank</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>SSL </label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>SSL expiry </label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                     <div class="panel-body  col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>SSL type </label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                           
                        </div>
                     </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
