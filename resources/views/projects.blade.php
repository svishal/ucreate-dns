@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Projects</div>

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
                            <th>Short_name</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($projects as $project)
                        
                              <tr>
                              <td>{{$project->short_name}}</td>
                              <td>{{$project->name}}</td>
                              <td><a target="_blank"href="{{$project->url}}">{{$project->url}}</a></td>
                              <td>
                                  <a href="{{url('projects/'.$project->id)}}">View</a>
                                  <a href="{{url('projects/'.$project->id.'/edit')}}">Edit</a>
                              </td>
                              </tr>
                              </a>
                             @endforeach
                        </tbody>
                      </table>   
                    </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
