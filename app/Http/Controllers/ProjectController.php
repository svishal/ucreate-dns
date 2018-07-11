<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\ProjectDetail;
use Illuminate\Http\Request;
class ProjectController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $projects= Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-edit-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {  
        return view('project-view', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('create-edit-project', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->short_name = $request->short_name;
        $project->name = $request->name;
        $project->url = $request->url;
        if($project->save()){
            return redirect('projects');
        }
    }
    
    public function ProjectDetails($id, Request $request) { 
       $project_details= ProjectDetail::all();
         // echo"<pre>"; print_r($project_details);
       return view('project-detail-view', compact($project_details));
    }
    public function EditProjectDetails($id, Request $request) {
         
       return $data;
    }

}
