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
function get_domain($url) {
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return false;
}
function stripScriptingTags($input_fields_data){
     foreach($input_fields_data as $key => $input_field_data){
        if(is_string($input_field_data)){
         $input_fields_data[$key]= strip_tags($input_field_data,'<br><b>');   
        }        
    }
    return $input_fields_data;    
}