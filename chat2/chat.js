function scTop(){
// $(".msgs").animate({scrollTop:$(".msgs")[0].scrollHeight});
 document.getElementById('EspacioChat').scrollTop = 9999999;
 console.log("Lo Bajo");
}
function load_new_stuff(){
 localStorage['lpid']=$(".msgs .msg:last").attr("title");
 $(".msgs").load("../chat2/msgs.php",function(){
  if(localStorage['lpid']!=$(".msgs .msg:last").attr("title")){
   scTop();
  }
 });
 $(".users").load("users.php");
}

$(document).ready(function(){ 
    $('.tab').click(function(){
		var dip = $(this).data('dip');
		if(dip == "chat"){
        $('.chat').css('display','block');
        $('.users').css('display','none');
		}else{
        $('.chat').css('display','none');
        $('.users').css('display','block');
		}
		return false;										 
    });
 scTop();
 $("#msg_form").on("submit",function(){
  t=$(this);
  val=$(this).find("input[type=text]").val();
  if(val!=""){
   $.post("../chat2/send.php",{msg:val},function(){
    load_new_stuff();
    t[0].reset();
   });
  }
  return false;
 });
});

setInterval(function(){
 load_new_stuff();
},5000);
