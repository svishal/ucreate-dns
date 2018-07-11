@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3>All Projects</h3> 
                <form class="search-project form-group" id="search" action="{{url('/search')}}" method="GET">
                        <input class="form-control" name='search' type="text" placeholder="Search Project">
                        <button  class="btn btn-primary"  type="submit">search</button>
                    </form>
                  
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
                            <th>Short_name</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($projects))
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
