  $(document).ready(function(){
  	  var tenums=0;
  	  var teurls=0;
  	  var tefanyu=0;
  	  var teked=0;
  	  var tere_h=0;
  	  var tere_f=0;
  	  var tedbr=0;
  	  var tecndb=0;
  	  var nums="";
  	  var seotype="";
  	  var wstyle="";
  	  var rewrite="";
  	  var wjs="";
  	  var wsub="";
  	  var wfked="";
  	  var rewrite_h="";
  	  var rewrite_f="";
		  var r = /^[0-9]*[1-9][0-9]*$/;
		  //取值校验数据
		$("#sitenums").blur(function(){
			nums = $("#sitenums").val();
			$("#muns").show();
			if(r.test(nums)){
				 $("#muns").replaceWith("<img src=\"img/icons/right.png\" id=\"muns\" />");
				 $('#sitenums').css("background", "#fff");
				 tenums=1; 
			}
			else{
				$("#muns").replaceWith("<img src=\"img/icons/shut.png\" id=\"muns\" />");
				tenums=0;
			}; 
	  });
			$("#url_fan").click(function(){
			$('#fanyu').show();
			$("#main_url").show();
			$("#wwurl").hide();
		});
		
		$("#url_normal").click(function(){
			$('#fanyu').hide();
			$("#main_url").hide();
			$("#wwurl").show();
		});
		i = $('input:radio[name="rand_type"]:checked').val();
			if(i==0){
				rand_type=0;
			}
			else{
				rand_type=1;
			}
			i = $('input:radio[name="rand_url"]:checked').val();
			if(i==3){
				rand_url=3;
			}
			else if(i==4){
				rand_url=4;
			}
			else if(i==5){
				rand_url=5;
			}
			else{
				rand_url=6;
			}
		//获得焦点，取泛域值
		$("#fanyu").focus(function(){
			$("#fanurl1")[0].focus();
			var fanyu = $("#fanyu").val();
			$("#fanurl1").html(fanyu);
			$('#ff1').show();
			
		});
		//输入结束，将值写入泛域框内
		$("#inputok1").click(function(){
			var fanyu2 = $("#fanurl1").val();
			$("#fanyu").html(fanyu2);
			$("#fanurl1").html("");
			$('#ff1').hide();
			$("#ymg").show();
			urltype = $("#fanyu").val();
			serror=0;
			r = /^(\w|[\u4E00-\u9FA5])*$/;
	  	urltype = wsplit(urltype);
	  	for(i=0;i <= (urltype.length-1); i++){
	  		if(!r.test(urltype[i])){	
			}; 	
	  	};
	  	if(serror == 0){
	  		 $("#ymg").replaceWith("<img src=\"img/icons/right.png\" id=\"ymg\" />"); 
	  		 tefanyu=1;
			}
			else{
				$("#ymg").replaceWith("<img src=\"img/icons/shut.png\" id=\"ymg\" />");
				tefanyu=0;
			}; 
		})
	
		//获得焦点，取url
		$("#wwurl").focus(function(){
			var wurl = $("#wwurl").val();
			$("#fanurl2").html(wurl);
			$('#ff2').show();
		})
		//输入结束，将值写入url框内
		$("#inputok2").click(function(){
			var wurl2 = $("#fanurl2").val();
			$("#wwurl").html(wurl2);
			$("#fanurl2").html("");
			$('#ff2').hide();
			$("#url2").show();
			urls = $("#wwurl").val();
			serror=0;
			r = /^([0-9a-z_-]+\.)*?([a-z0-9-]+\.[a-z]{2,6}(\.[a-z]{2})?(\:[0-9]{2,6})?)((\/[^?#<>\/\\*":]*)+(\?[^#]*)?(#.*)?)?$/i;
	  	urls = wsplit(urls);
	  	for(i=0;i <= (urls.length-1); i++){
	  		if(!r.test(urls[i])){
				//serror+=1;	
			}; 	
	  	};
	  	if(serror == 0 & urls.length != 0){
	  		 $("#url2").replaceWith("<img src=\"img/icons/right.png\" id=\"url2\" />");
	  		 teurls=1; 
			}
			else{
				$("#url2").replaceWith("<img src=\"img/icons/shut.png\" id=\"url2\" />");
				teurls=0;
			}; 
		});
		
		//获得焦点，取keywords
		$("#keywords").focus(function(){
			var wurl = $("#keywords").val();
			$("#fanurl3").html(wurl);
			$('#ff3').show();
		});
		//输入结束，将值写入keywords框内
		$("#inputok3").click(function(){
			var wurl2 = $("#fanurl3").val();
			$("#keywords").html(wurl2);
			$("#fanurl3").html("");
			$('#ff3').hide();
			$("#ked2").show();
		  keywords = $("#keywords").val();
			serror=0;
	  	keywords = wsplit(keywords);
	  		 $("#ked2").replaceWith("<img src=\"img/icons/right.png\" id=\"ked2\" />");
	  		 teked=1; 
		}) ;
		
		//获得焦点，取channel
		$("#channel").focus(function(){
			var wurl = $("#channel").val();
			$("#fanurl16").html(wurl);
			$('#ff16').show();
		});
		//输入结束，将值写入channel框内
		$("#inputok16").click(function(){
			var wurl2 = $("#fanurl16").val();
			$("#channel").html(wurl2);
			$("#fanurl16").html("");
			$('#ff16').hide();
		  channel = $("#channel").val();
			serror=0;
	  	channel = wsplit(channel);
		}) ;
		
		//seo句
		$("#seoselt").click(function(){
			$('#seosent').hide();
		}); 
		$("#seoselt2").click(function(){
			$('#seosent').show();
		}); 
		//获得焦点，取seo
		$("#seosent").focus(function(){
			var wurl = $("#seosent").val();
			$("#fanurl4").html(wurl);
			$('#ff4').show();
		});
		//输入结束，将值写入seo框内
		$("#inputok4").click(function(){
			var wurl2 = $("#fanurl4").val();
			$("#seosent").html(wurl2);
			$("#fanurl4").html("");
			$('#ff4').hide();
			seotype = $("#seosent").val();
			seotype = wsplit(seotype);
		}) ;
		//获得焦点，取style
		$("#wstyle").focus(function(){
			var wurl = $("#wstyle").val();
			$("#fanurl5").html(wurl);
			$('#ff5').show();
		});
		//输入结束，将值写入style框内
		$("#inputok5").click(function(){
			var wurl2 = $("#fanurl5").val();
			$("#wstyle").html(wurl2);
			$("#fanurl5").html("");
			$('#ff5').hide();
			$("#wsty2").show();
			wstyle = $("#wstyle").val();
			var serror=0;
			r = /^[0-9]*[1-9][0-9]*$/;
	  	wstyle = wsplit(wstyle);
	  	for(i=0;i <= (wstyle.length-1); i++){
	  		if(!r.test(wstyle[i])){
				serror+=1;	
			}; 	
	  	};
	  	if(serror == 0){
	  		$("#wsty2").replaceWith("<img src=\"img/icons/right.png\" id=\"wsty2\" />");
	  		tewstyle=1; 
			}
			else{
				$("#wsty2").replaceWith("<img src=\"img/icons/shut.png\" id=\"wsty2\" />");
				tewstyle=0;
			}; 
		}) ;
		
		//伪静态
		$("#rewritec").click(function(){
			$('#rewrite_h').hide();
			$('#rewrite_f').hide();
		}) ;
		$("#rewriteo").click(function(){
			$('#rewrite_h').show();
			$('#rewrite_f').show();
		}) ;
		//获得焦点，取rewrite_h
		$("#rewrite_h").focus(function(){
			var wurl = $("#rewrite_h").val();
			$("#fanurl6").html(wurl);
			$('#ff6').show();
		});
		//输入结束，将值写入rewrite_h框内
		$("#inputok6").click(function(){
			var wurl2 = $("#fanurl6").val();
			$("#rewrite_h").html(wurl2);
			$("#fanurl6").html("");
			$('#ff6').hide();
			$("#re_h").show();
			serror=0;
			r = /^(\w|[\u4E00-\u9FA5])*$/;
	  	rewrite_h = wsplit(wurl2);
	  	for(i=0;i <= (rewrite_h.length-1); i++){
	  		if(!r.test(rewrite_h[i])){
				serror+=1;	
			}; 	
	  	};
	  	if(serror == 0){
	  		$("#re_h").replaceWith("<img src=\"img/icons/right.png\" id=\"re_h\" />"); 
	  		tere_h=1;
			}
			else{
				$("#re_h").replaceWith("<img src=\"img/icons/shut.png\" id=\"re_h\" />");
				tere_h=0;
			}; 
		}); 
		//获得焦点，取rewrite_f
		$("#rewrite_f").focus(function(){
			var wurl = $("#rewrite_f").val();
			$("#fanurl7").html(wurl);
			$('#ff7').show();
		});
		//输入结束，将值写入rewrite_f框内
		$("#inputok7").click(function(){
			var wurl2 = $("#fanurl7").val();
			$("#rewrite_f").html(wurl2);
			$("#fanurl7").html("");
			$('#ff7').hide();
			$("#re_f").show();
			serror=0;
			r = /^(\w|[\u4E00-\u9FA5])*$/;
	  	rewrite_f = wsplit(wurl2);
	  	for(i=0;i <= (rewrite_f.length-1); i++){
	  		if(!r.test(rewrite_f[i])){
				serror+=1;	
			}; 	
	  	};
	  	if(serror == 0){
	  		$("#re_f").replaceWith("<img src=\"img/icons/right.png\" id=\"re_f\" />"); 
	  		tere_f=1;
			}
			else{
				$("#re_f").replaceWith("<img src=\"img/icons/shut.png\" id=\"re_f\" />");
				tere_f=0;
			}; 
		}) ;
		
		//JS
		$("#wjsc").click(function(){
			$('#wjsr').hide();	
		});
		$("#wjso").click(function(){
			$('#wjsr').show();	
		});
		//获得焦点，取wjs
		$("#wjsr").focus(function(){
			var wurl = $("#wjsr").val();
			$("#fanurl8").html(wurl);
			$('#ff8').show();
		});
		//输入结束，将值写入wjs框内
		$("#inputok8").click(function(){
			var wurl2 = $("#fanurl8").val();
			$("#wjsr").html(wurl2);
			$("#fanurl8").html("");
			$('#ff8').hide();
			wjs=$("#wjsr").val();
			wjs=wsplit(wjs);
		}) ;
		
		//获得焦点，取wsub
		$("#wsub").focus(function(){
			var wurl = $("#wsub").val();
			$("#fanurl9").html(wurl);
			$('#ff9').show();
		});
		//输入结束，将值写入wsub框内
		$("#inputok9").click(function(){
			var wurl2 = $("#fanurl9").val();
			$("#wsub").html(wurl2);
			$("#fanurl9").html("");
			$('#ff9').hide();
			wsub=$("#wsub").val();
			wsub=wsplit(wsub);
		}) ;
		
		//获得焦点，取wfkey
		$("#wfkey").focus(function(){
			var wurl = $("#wfkey").val();
			$("#fanurl10").html(wurl);
			$('#ff10').show();
		});
		//输入结束，将值写入wfkey框内
		$("#inputok10").click(function(){
			var wurl2 = $("#fanurl10").val();
			$("#wfkey").html(wurl2);
			$("#fanurl10").html("");
			$('#ff10').hide();
			wfked=$("#wfkey").val();
			wfked=wsplit(wfked);
		}) ;
		//获得焦点，取IP
		$("#wip").focus(function(){
			var wip = $("#wip").val();
			$("#fanurl12").html(wip);
			$('#ff12').show();
		});
		//输入结束，将值写入wip框内
		$("#inputok12").click(function(){
		  wurl2 = $("#fanurl12").val();
			$("#wip").html(wurl2);
			$("#fanurl12").html("");
			$('#ff12').hide();
			wip=$("#wip").val();
			wip=wsplit(wip);
			$("#wip2").show();
			$("#wip2").replaceWith("<img src=\"img/icons/right.png\" id=\"wip2\" />");
		}) ;
		
		//获得焦点，取wdir
		$("#wdir").focus(function(){
			var wdir = $("#wdir").val();
			$("#fanurl13").html(wdir);
			$('#ff13').show();
		});
		//输入结束，将值写入wdir框内
		$("#inputok13").click(function(){
		  wurl2 = $("#fanurl13").val();
			$("#wdir").html(wurl2);
			$("#fanurl13").html("");
			$('#ff13').hide();
			wdir=$("#wdir").val();
			wdir=wsplit(wdir);
			$("#wdir2").show();
			$("#wdir2").replaceWith("<img src=\"img/icons/right.png\" id=\"wdir2\" />");
		}); 
		
		//获得焦点，取wname
		$("#wname").focus(function(){
			var wname = $("#wname").val();
			$("#fanurl14").html(wname);
			$('#ff14').show();
		});
		//输入结束，将值写入wname框内
		$("#inputok14").click(function(){
		  wurl2 = $("#fanurl14").val();
			$("#wname").html(wurl2);
			$("#fanurl14").html("");
			$('#ff14').hide();
			wname=$("#wname").val();
			wname=wsplit(wname);
			$("#wname2").show();
			$("#wname2").replaceWith("<img src=\"img/icons/right.png\" id=\"wname2\" />");
		}) ;
		
		//数据库
		$("#dbc").click(function(){
			$('#dbr').hide();	
		});
		$("#dbo").click(function(){
			$('#dbr').show();	
		});
		
		//获得焦点，取dbr
		$("#dbr").focus(function(){
			var wurl = $("#dbr").val();
			$("#fanurl11").html(wurl);
			$('#ff11').show();
		});
		//输入结束，将值写入dbr框内
		$("#inputok11").click(function(){
			var wurl2 = $("#fanurl11").val();
			$("#dbr").html(wurl2);
			$("#fanurl11").html("");
			$('#ff11').hide();
			$("#dbr2").show();
			serror=0;
			r = /^(\w|[\u4E00-\u9FA5])*$/;
	  	dbr = wsplit(wurl2);
	  	for(i=0;i <= (dbr.length-1); i++){
	  		if(!r.test(dbr[i])){
				serror+=1;	
			}; 	
	  	};
	  	if(serror == 0 & dbr.length != 0){
	  		$("#dbr2").replaceWith("<img src=\"img/icons/right.png\" id=\"dbr2\" />"); 
	  		tedbr=1;
			}
			else{
				$("#dbr2").replaceWith("<img src=\"img/icons/shut.png\" id=\"dbr2\" />");
				tedbr=0;
			}; 
		}) ;
		//生成随机泛域
	$("#creat_fanyu").click(function(){
		$.post("test/creat_fanyu.php",{rand_type:rand_type,rand_url:rand_url,nums:nums},function(data){
			alert(data);
			$("#fanyu").html(data);
		});
	});
		
		//测试数据库连接
		$("#detest").click(function(){
			$("#dbte").show();
		   dbhost=$("#dbaddre").val();
			 dbuser=$("#dbuser").val();
			 dbpasswd=$("#dbpasswd").val();
			 i = $('input:radio[name="db"]:checked').val();
			if(i=="nomal"){
				dbr=$("#dbr2").val();
				tedbr=1;
			}
			$.post("test/testdb.php",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd,dbr:dbr},function(data){
				alert(data);
				var ttt = data.split("\n");
			if(ttt[0]=="数据库连接成功")
			{
				$("#dbte").replaceWith("<img src=\"img/icons/right.png\" id=\"dbte\" />");
				tecndb=1; 
			}
			else
				{
				$("#dbte").replaceWith("<img src=\"img/icons/shut.png\" id=\"dbte\" />");
				tecndb=0;
			}; 	
			});	
		});
		//取值提交
		$("#submit").click(function(){
			i = $('input:radio[name="seotype"]:checked').val();
			if(i=="nomal"){
				seotype=$("#seosent2").val();	
			}
			i = $('input:radio[name="rewrite"]:checked').val();
			if(i=="urlfan"){
				rewrite_h="";
				rewrite_f="";
				rewrites=0;
				tere_h=1;
				tere_f=1;
			}
			else{
				rewrites=1;	
			}
			i = $('input:radio[name="urltype"]:checked').val();
			if(i=="nomal"){
				urltype="";
				fanyus=0;
				tefanyu=1;
			}
			else{
				fanyus=1;	
				urls=$("#main_url").val();
			}
			i = $('input:radio[name="wjs"]:checked').val();
			if(i=="nomal"){
				wjs=$("#wjsr2").val();	
			}
			i = $('input:radio[name="db"]:checked').val();
			if(i=="nomal"){
				dbr=$("#dbr2").val();
				tedbr=1;
			}
			
			//校验数据
			serror=0;
			subcheck(tenums,"#sitenums");
			subcheck(teurls,"#wwurl");
			//subcheck(tefanyu,"#fanyu");
			subcheck(teked,"#keywords");
			//subcheck(tere_h,"#rewrite_h");
			//subcheck(tere_f,"#rewrite_f");
			subcheck(tedbr,"#dbr");
			if(tecndb != 1){
			serror+=1;
		}
		serror=0;
		if(serror != 0){
			alert("请填入必要信息并测试数据库连接");	
		}
		
		//数据展示框
		if(serror == 0 ){
		$("#winfo").show();
		$("#wcount").html(nums);
		if(fanyus == 1){
		$("#wut").html("<img src=\"img/icons/right.png\"  />");
		}
		else{
		$("#wut").html("<img src=\"img/icons/shut.png\"  />");		
		}
		$("#wus").html("<img src=\"img/icons/right.png\"  />"+urls.length+"条");
		$("#wkc").html("<img src=\"img/icons/right.png\"  />"+keywords.length+"个");
		if(seotype.constructor == Array){
		$("#wss").html("<img src=\"img/icons/right.png\"  />"+seotype.length+"条");
	  }
	else{
		$("#wss").html("<img src=\"img/icons/right.png\"  />1条");
		}
		$("#wsl").html("<img src=\"img/icons/right.png\"  />"+wstyle.length+"个");
		if(rewrites == 1){
		$("#wre").html("<img src=\"img/icons/right.png\"  />前缀"+rewrite_h.length+"条,后缀"+rewrite_f.length);
	  }
	  else{
	  $("#wre").html("<img src=\"img/icons/shut.png\"  />关闭");		
	  }
		if(wjs.constructor == Array){
	 	$("#wwjs").html("<img src=\"img/icons/right.png\"  />"+wjs.length+"条");
 	  }
 	  else{
 	  $("#wwjs").html("<img src=\"img/icons/right.png\"  />1条");		
 	  }
		$("#wwsu").html("<img src=\"img/icons/right.png\"  />"+wsub.length+"条");
		$("#wwf").html("<img src=\"img/icons/right.png\"  />"+wfked.length+"条");
		$("#wwdh").html("<img src=\"img/icons/right.png\"  />");
		$("#wwdu").html("<img src=\"img/icons/right.png\"  />");
		if(wjs.constructor == Array){
		$("#wwdb").html("<img src=\"img/icons/right.png\"  />"+dbr.length+"条");
	  }
	  else{
	  $("#wwdb").html("<img src=\"img/icons/right.png\"  />1条");	
	  }
	}
		$("#wclose").click(function(){
			$("#winfo").hide();	
		});
		$("#iwclose").click(function(){
			$("#iinfo").hide();	
			$("#install").hide();
		});
		$("#ibegin2").click(function(){
			$("#install").hide();
		});
		$("#begin").click(function(){
		$("#winfo").hide();	
		//提交数据
		if(serror == 0){
			$("#showinfo").html("hh");
			$("#iinfo").show();
			urltype = $("#fanyu").val();
			urltype = wsplit(urltype);
			$.post("creatwebs/creat.php?step=1",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd,nums:nums,urltype:urltype,seotype:seotype,keywords:keywords,wname:wname,channel:channel,urls:urls,wip:wip,wdir:wdir,wstyle:wstyle,rewrites:rewrites,rewrite_h:rewrite_h,rewrite_f:rewrite_f,fanyus:fanyus,wjs:wjs,wsub:wsub,wfked:wfked,dbr:dbr},function(data){
				var re =new RegExp(/[\d]+.xls/);
				var nus = nums;
				excfile = data.match(re);
				$("#showinfo").html(data);	
			});
			alert(123);
			$("#ibegin").click(function(){
				//alert(nus);
				$("#iinfo").hide();	
				$("#install").show();	
				 $("#iframe_in").attr("src","creatwebs/creat.php?step=2&file="+excfile+"&nums="+nums)
			});
		}
		});
		});
		//批量删除IIS网站
		$("#del_a").click(function(){
			  var iis_a = $("#del_all").val();
			  iis_a = wsplit(iis_a);
			  $.post("test/deliis.php",{iis_a:iis_a},function(data){
			  	alert(data);	
			  	//$("#add_add").hide();
			  });
		});
	});
	
	//功能函数
	function wsplit(fdata){
		var arr = fdata.split('\n');
		//删除空白元素
		for(i=0;i <= (arr.length-1);i++){
			var j = (arr.length-1)
			if(arr[i]==""){
				arr.splice(i,1);	
			}
		}
		return arr;
	}
	function subcheck(te,lable){
		if(te != 1){
			serror+=1;
			$(lable).css("background", "pink");
		}	
	}
	
hs.graphicsDir = 'highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';