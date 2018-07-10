<?php
use App\Model\Project;

function getProjectName($id,$short_name_only){ 
   return ($short_name_only)? Project::find($id)->short_name:Project::find($id)->name;
 
}