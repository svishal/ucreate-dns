@extends('layouts.projects_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                               
                            </div><!--/row-->    
                        </div><!--/col-12-->
                    </div><!--/row-->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
