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

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>0</h3>
                                <p>Domains</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark-circled" style="padding-top:16px;"></i>
                            </div>
                        </div>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>0</h3>
                                <p>Domains</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark-circled" style="padding-top:16px;"></i>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
