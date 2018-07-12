<?php
use App\Model\Project;

function getProjectName($id,$short_name_only){ 
   return ($short_name_only)? Project::find($id)->short_name:Project::find($id)->name;
 
}
function uploadFile($file){ 
   if(!empty($file)){
   $original_file= $file->getClientOriginalName();
   $name=time()."_".$original_file;
   $s3 = \Storage::disk('s3');
   $s3_bucket = getenv("S3_BUCKET_NAME");
   $file_path = '/' . $name;
   $s3->put($file_path, file_get_contents($file),'public');
   return $name;
  }
}
function getImageUrl($name){ 
   $s3 = \Storage::disk('s3');
   $s3_bucket = getenv("S3_BUCKET_NAME");
   return $full_url= getenv('BUCKET_URL').$name;
}