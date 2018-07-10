@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(isset($project))
                <div class="panel-heading">{{$project->name}}</div>
                @endif
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                     @if(isset($project))
                        <form action="{{url('projects/'.$project->id)}}" method="Post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @else
                        <form action="{{url('projects/create')}}" method="Post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @endif
                        <label>Short Name</label>
                        <input type="text" name="short_name" value="{{($project->short_name)??old('short_name')}}">
                        <label>Name</label>
                        <input type="text" name="name" value="{{($project->name)??old('name')}}">
                        <label>URL</label>
                        <input type="text" name="url" value="{{($project->url)??old('url')}}">
                        <input type="submit">
                    </form>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
