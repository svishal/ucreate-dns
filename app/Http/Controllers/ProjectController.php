<?php

namespace App\Http\Controllers;

use App\Model\{Project,ProjectDetail};
use Illuminate\Http\Request;
use Validator;
use App\Jobs\GetNameServerRecords;

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
    public function index(Request $request)
    {
        $form_data = $request->all();
        if(count($form_data) && array_key_exists('having_ssl', $form_data)){
             $projects = Project::searchProject('', '', 'having_ssl');
        }elseif(count($form_data) && array_key_exists('expiring_ssl', $form_data)){
            $projects = Project::searchProject('', date("Y-m-d", strtotime("+15 day")), 'ssl_expiry');
        }elseif(count($form_data) && array_key_exists('expiring_domains', $form_data)){
            $projects = Project::searchProject('', date("Y-m-d", strtotime("+15 day")), 'expires_date');
        }elseif(count($form_data) && array_key_exists('having_delegate_access', $form_data)){
            $projects = Project::searchProject('', '', 'having_delegate_access');
        }else{
            $projects = Project::allProjects();
        }
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
        $form_data = $request->all();
        $form_data['short_name'] = strtolower($request->short_name);
        $form_data['name'] = strtolower($request->name);
        $form_data['url'] = strtolower($request->url);
        $form_data['created_date'] = (!empty($request->created_date))?date('Y-m-d', strtotime($request->created_date)):'';
        $form_data['expires_date'] = (!empty($request->expires_date))?date('Y-m-d', strtotime($request->expires_date)):'';
        $form_data['ssl_expiry'] = (!empty($request->ssl_expiry))?date('Y-m-d', strtotime($request->ssl_expiry)):'';
        
        $validator = Validator::make($form_data, [
            'short_name' => 'bail|required|unique:projects',
            'name' => 'bail|required|unique:projects',
            'url' => 'bail|required|url|unique:projects',
            'contact_email' => 'bail|nullable|email',
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $project = new Project([
            'short_name' => $form_data['short_name'],
            'name' => $form_data['name'],
            'url' => $form_data['url']
        ]);
        
        $project_details = [];
        foreach ($form_data as $key=>$value){
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
    {   $domain_details= ($project->nameServerRecord()->count() > 0)? $project->nameServerRecord()->first():"";
        if(!empty($domain_details))  $domain_details= array_filter($domain_details->toArray());
        return view('project-view', compact('project','domain_details'));
        
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
        $request->short_name = strtolower($request->short_name);
        $request->name = strtolower($request->name);
        $request->url = strtolower($request->url);
        
        $validator = Validator::make($request->all(), [
            'short_name' => "bail|required|unique:projects,short_name,$project->id",
            'name' => "bail|required|unique:projects,name,$project->id",
            'url' => "bail|required|url|unique:projects,url,$project->id",
            'contact_email' => "bail|nullable|email",
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $project_detail_count = 0;
        $project->short_name = strip_tags($request->short_name);
        $project->name = strip_tags($request->name);
        $project->url = $request->url;
        
        $form_data=stripScriptingTags($request->all());
        $file1=$request->file('ssl_crt_file');
        $form_data['ssl_crt_file']= uploadFile($file1);
        $file2=$request->file('ssl_server_key_file');
        $form_data['ssl_server_key_file']= uploadFile($file2);
        $file3=$request->file('ssl_csr_file');
        $form_data['ssl_csr_file']= uploadFile($file3);
        
        $form_data['created_date'] = (!empty($request->created_date))?date('Y-m-d', strtotime($request->created_date)):'';
        $form_data['expires_date'] = (!empty($request->expires_date))?date('Y-m-d', strtotime($request->expires_date)):'';
        $form_data['ssl_expiry'] = (!empty($request->ssl_expiry))?date('Y-m-d', strtotime($request->ssl_expiry)):'';
          
        if($project->save()){
            $project_details = [];
            foreach ($form_data as $key=>$value){
                if($key == 'short_name' || $key == 'name' || $key == 'url' || $key == '_token' || $key == '_method') continue;
                if(isset($project->projectDetail->id)){
                    if(!empty(trim($value))){
                        $project->projectDetail->$key = $value;
                        $project_detail_count++;
                    }
                }else{
                    $project_details['project_id'] = $project->id;
                    if(!empty(trim($value))) $project_details[$key] = $value;
                    $project_detail_count++;
                }
            }
            if($project_detail_count){
                if(count($project_details)){
                    $project_detail = new ProjectDetail($project_details);
                    $project_detail->save();
                }else{
                    $project->projectDetail->save();
                }
            }
            return redirect('projects/'.$project->id);
        }
    }
    public function destroy(Request $request, Project $project){
        if($project->delete()){
            return redirect('projects')->with('status', 'Record succesfully deleted!');
        }
    }
    public function search(Request $request){
        $title = $request->search;
        $projects = \App\Model\Project::searchProject($title);
        return view('projects', compact('projects'));
    }
    
    public function createNameServerRecordRequest($project_id){
        if(GetNameServerRecords::dispatch($project_id)){
            return 'Request submitted successfully!!';
        }
    }
}
