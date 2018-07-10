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
        //
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
        //
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
        //
    }

     public function addProjectsFromDocument($document_name='domain_details.csv') {
        $csv_file = url($document_name);
        $data = [];
        $project_data=file_get_contents($csv_file);
        $projects = array_map("str_getcsv", explode("\n", $project_data));
        foreach ($projects as $name) {
          $data[]=$name;
       }
       echo"<pre>"; print_r($data);
       return $data;
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
