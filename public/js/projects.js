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
  
// url = $("#url");
//    if (url.length) {
//        $.ajax({
//            url: base_url + '/get-additional-domain-details' + url,
//            cache: false,
//            success: function (html) {
//                $("#results").append(html);
//            }
//        });
//    }  
});
