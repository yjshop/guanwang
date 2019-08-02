




$(function(){  

	    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
      },
    });


  var checkLoginId = 0;
  $('.login').click(function(){
	  $.ajax({ 
			type : "POST", //提交方式 
		    url : '/wx/qrcode.html',//路径 
		   /*  data : { 
		    	"scene_id" : ""
		    }, */
		    success : function(data) {
		    	$('#login').find('img').attr('src',data);
		    } 
		});
     	checkLoginId = setInterval(checkLogin,5000);
  }); 
  $('.close-btn').click(function(){	
	 clearInterval(checkLoginId);
  }); 

function checkLogin(){
	$.ajax({ 
		type : "POST", //提交方式 
	    url : '/wx/checklogin.html',//路径 
	   /*  data : { 
	    	"scene_id" : ""
	    }, */
	    success : function(data) {
	    	var result = JSON.parse(data);
	    	if (result.flag) { 
	      		window.location.reload();
	      	} else { 
	       		
	      	} 
	    } 
	}); 
}


     



	
	      $(".help-box-l>ul>li a").hover(function(){
	           if($(this).next().is(":hidden")){
	             $(this).next().slideDown();
	             $(this).find(".icon-dayuhao").css({"transform":"rotate(180deg)","-webkit-transform":"rotate(180deg)"});
	           }else{
	             $(this).next().slideUp();
	             $(this).find(".icon-dayuhao").css({"transform":"rotate(360deg)","-webkit-transform":"rotate(360deg)"});
	           }
	         })

      //案例二维码显示
      $(".anli li").mouseover(function(){
        $(this).children(".code-img-box").show()
      })
      $(".anli li").mouseout(function(){
        $(this).children(".code-img-box").hide()
      })

    $('.am-thumbnail').mouseover(function(){
      $(this).children('.shadow').show();
    })
    $('.am-thumbnail').mouseout(function(){
      $(this).children('.shadow').hide();
    })

    
    



    });





