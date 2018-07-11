@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading center-align"><h3>{{ getProjectName(5,1)}} </h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-4 col-md-offset-2">
                            <label>test</label>
                        </div> 
                        <div class="col-md-4 col-md-offset-2">
                            value
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
