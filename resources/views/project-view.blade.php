@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$project->name}}</div>

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
                            <th>Id</th>
                            <th>Short Name</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                          </tr>
                        </thead>
                        <tbody>
                              <tr>
                              <td>{{$project->id}}</td>
                              <td>{{$project->short_name}}</td>
                              <td>{{$project->name}}</td>
                              <td><a href="{{$project->url}}" target="_blank">{{$project->url}}</a></td>
                              <td>{{date('Y-m-d', strtotime($project->created_at))}}</td>
                              <td>{{date('Y-m-d', strtotime($project->updated_at))}}</td>
                              </tr>
                        </tbody>
                      </table>   
                    </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
