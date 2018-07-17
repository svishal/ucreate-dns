$(function() {
 if($('#ssl').is(':checked') || $('#view_ssl').data('ssl')===1){ 
    $('#ssl_info').show();
 }else{
     $('#ssl_info').hide();
 }
 $('#ssl').on("change",function(){
     $('#ssl_info').toggle();
 });
 
 $('.date_picker').datetimepicker({
    format: 'DD-MM-YYYY',
    ignoreReadonly: true
  });
  
$("#update_records_now").on("click",function(){ 
         $.ajax({
            url: base_url + '/get-additional-domain-details/' +  $(this).attr('project-id'),
            cache: false,
            success: function (response) { 
                $("#records_success_message").html(response);
            }
        });
    });
});
