<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\ProjectDetail;
use Illuminate\Http\Request;
use Validator;
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
        $validator = Validator::make($request->all(), [
            'short_name' => 'bail|required|unique:projects',
            'name' => 'bail|required|unique:projects',
            'url' => 'bail|required|url|unique:projects',
            'contact_email' => 'bail|nullable|email|unique:projects',
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $project = new Project([
            'short_name' => $request->short_name,
            'name' => $request->name,
            'url' => $request->url
        ]);
        
        $project_details = [];
        foreach ($request->all() as $key=>$value){
            if($key == 'short_name' || $key == 'name' || $key == 'url' || $key == '_token') continue;
            if(!empty(trim($value))) $project_details[$key] = $value;
        }
        
        if($project->save()){
            if(count($project_details)){
                $project_details['project_id'] = $project->id;
                $project_detail = new ProjectDetail($project_details);
                $project_detail->save();
            }
            return redirect('projects');
        }
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

}
