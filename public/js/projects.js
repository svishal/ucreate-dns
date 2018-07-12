$(function() {
if($('#ssl').is(':checked')){ 
    $('#ssl_info').show();
 }else{
     $('#ssl_info').hide();
 }
 $('#ssl').on("change",function(){
     $('#ssl_info').toggle();
 });
});