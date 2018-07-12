@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-success"><a href="{{url('projects')}}">Domains</a><span class="label label-primary pull-right">{{$dashboard['domain_count']}}</span> </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-success"><a href="{{url('projects?having_ssl')}}">SSL</a><span class="label label-primary pull-right">{{$dashboard['domains_with_ssl']}}</span> </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-success"><a href="{{url('projects?having_delegate_access')}}">Delegate Access</a><span class="label label-primary pull-right">{{$dashboard['domains_with_delegate_access']}}</span> </h4>
                                    </div>
                                </div>
                            </div><!--/row-->    
                        </div><!--/col-12-->
                    </div><!--/row-->
                     <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-danger">Expiring Soon</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-danger"><a href="{{url('projects?expiring_domains')}}">Domains</a><span class="label label-danger pull-right">{{$dashboard['domains_expiring_soon']}}</span>  </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-danger"><a href="{{url('projects?expiring_ssl')}}">SSL</a><span class="label label-danger pull-right">{{$dashboard['ssl_expiring_soon']}}</span>  </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well">
                                        <h4 class="text-danger"><a href="{{url('projects?expiring_domains')}}">Hosting</a><span class="label label-danger pull-right">{{$dashboard['hosting_expiring_soon']}}</span>  </h4>
                                    </div>
                                </div>
                            </div><!--/row-->    
                        </div><!--/col-12-->
                    </div><!--/row-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
