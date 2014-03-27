  $(document).ready(function(){
  	var tags_nums = 0;
  $("#sitenums").blur(function(){
  var r = /^[0-9]*[1-9][0-9]*$/;
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
	  
	  //TAGS切换
	  $("#jiben_next").click(function(){
	  	$("#jiben_l").css({"background":"none","font-weight":"normal"});
	  	$("#wzxx_l").css({"background":"#A8A8A6","font-weight": "bold"});
	  	$("#jiben").hide();	
	  	$("#wzxx").show();
	  	tags_nums = 1;
	  });
	  $("#jiben_a").click(function(){
		$("#wzxx_l").css({"background":"none","font-weight":"normal"});
		$("#gjpz_l").css({"background":"none","font-weight":"normal"});
		$("#sjk_l").css({"background":"none","font-weight":"normal"});
	  $("#jiben_l").css({"background":"#A8A8A6","font-weight": "bold"});
		$("#jiben").show();	
		$("#wzxx").hide();	
		$("#gaoji").hide();	
		$("#shujuku").hide();	
	});
	 $("#wzxx_a").click(function(){
	 	if(tags_nums > 0){
		$("#jiben_l").css({"background":"none","font-weight":"normal"});
		$("#gjpz_l").css({"background":"none","font-weight":"normal"});
		$("#sjk_l").css({"background":"none","font-weight":"normal"});
	  $("#wzxx_l").css({"background":"#A8A8A6","font-weight": "bold"});
		$("#jiben").hide();	
		$("#wzxx").show();	
		$("#gaoji").hide();	
		$("#shujuku").hide();	
	}
	else{
		alert("请按步骤填写必要信息");	
	}
	});
	 $("#gjpz_a").click(function(){
	 	if(tags_nums > 1){
		$("#jiben_l").css({"background":"none","font-weight":"normal"});
		$("#wzxx_l").css({"background":"none","font-weight":"normal"});
		$("#sjk_l").css({"background":"none","font-weight":"normal"});
	  $("#gjpz_l").css({"background":"#A8A8A6","font-weight": "bold"});
		$("#jiben").hide();	
		$("#wzxx").hide();	
		$("#gaoji").show();	
		$("#shujuku").hide();	
	}
	else{
		alert("请按步骤填写必要信息");	
	}
	});
	$("#sjk_a").click(function(){
	 	if(tags_nums > 2){
		$("#jiben_l").css({"background":"none","font-weight":"normal"});
		$("#wzxx_l").css({"background":"none","font-weight":"normal"});
		$("#gjpz_l").css({"background":"none","font-weight":"normal"});
	  $("#sjk_l").css({"background":"#A8A8A6","font-weight": "bold"});
		$("#jiben").hide();	
		$("#wzxx").hide();	
		$("#gaoji").hide();	
		$("#shujuku").show();	
	}
	else{
		alert("请按步骤填写必要信息");	
	}
	});
	  //TAGS 切换结束
	  $("#url_fan").click(function(){
			$('#rand_fanyu').show();
			$("#fanyu_zhu").show();
		});
		$("#url_normal").click(function(){
			$("#rand_fanyu").hide();
			$("#fanyu_zhu").hide();
		});
		$("#del_iis").click(function(){
			$("#add_add").show();
			
		});
		$("#del_a").click(function(){
			var iis_a = $("#del_all").val();
			  iis_a = wsplit(iis_a);
			  $.post("test/deliis.php",{iis_a:iis_a},function(data){
			  	alert(data);	
				});
				$("#add_add").hide();
		});
	$("#creat_fanyu").click(function(){
	i = $('input:radio[name="rand_type"]:checked').val();
	main_url = $("#main_url").val();
	if(main_url != ""){
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
		$.post("test/creat_fanyu.php",{rand_type:rand_type,rand_url:rand_url,nums:nums,main_url:main_url},function(data){
			data1 = data.split("\n")+"."+main_url;
			alert(data);
			$("#wwurl").html(data);
		});
	}
	else{
		alert("请先填入主域");	
	}
	});
	//网站信息下一步
	$("#wzxx_next").click(function(){
		var web_names = $("#wname").val();
		var error_nums = 0;
		if(web_names == ""){
			++error_nums;	
		}
		if($("#wwurl").val()==""){
			++error_nums;	
		}
		if($("#keywords").val() == ""){
			++error_nums	
		}
		if($("#seosent").val() == ""){
			++error_nums	
		}
		if(error_nums != 0){
			alert("请填入必要的建站信息");	
		}
		else{
			$("#wzxx").hide();
			$("#gaoji").show();
			$("#wzxx_l").css({"background":"none","font-weight":"normal"});	
			$("#gjpz_l").css({"background":"#A8A8A6","font-weight":"bold"});
			tags_nums = 2;	
		}
	});
	//高级配置下一步
	$("#gjpz_next").click(function(){
		error_nums = 0;
		if($("#rewrite_h").val() == ""){
			++error_nums	
		}	
		if($("#rewrite_f").val() == ""){
			++error_nums	
		}	
		if(error_nums != 0){
			alert("请填入必要的建站信息");	
		}
		else{
			$("#gaoji").hide();
			$("#shujuku").show();
			$("#gjpz_l").css({"background":"none","font-weight":"normal"});	
			$("#sjk_l").css({"background":"#A8A8A6","font-weight":"bold"});	
			tags_nums = 3;
		}
	});
	$("#seoselt").click(function(){
		$("#seosent").hide();
		$("#seosent2").show();
	});
	$("#seoselt2").click(function(){
		$("#seosent2").hide();
		$("#seosent").show();
	});
	$("#rewriteo").click(function(){
		$("#rewrite_h").show();
		$("#rewrite_f").show();
		$(".wjt_tr").show();
	});
	$("#rewritec").click(function(){
		$("#rewrite_h").hide();
		$("#rewrite_f").hide();
		$(".wjt_tr").hide();
	})
	$("#wjsc").click(function(){
		$("#wjsr").hide();
		$("#wjsr2").show();
	});
	$("#wjso").click(function(){
		$("#wjsr").show();
		$("#wjsr2").hide();
	});
	$("#dbc").click(function(){
		$("#dbr2").show();
		$("#dbr").hide();
	});
	$("#dbo").click(function(){
		$("#dbr").show();
		$("#dbr2").hide();
	});
	//数据库配置下一步
	$("#detest").click(function(){
			$("#dbte").show();
		   dbhost=$("#dbaddre").val();
			 dbuser=$("#dbuser").val();
			 dbpasswd=$("#dbpasswd").val();
			 i = $('input:radio[name="db"]:checked').val();
			if(i=="nomal"){
				dbr=$("#dbr2").val();
			}
			else if(i=="other"){
				dbr=$("#dbr").val();	
			}
			//alert(dbr);
			$.post("test/testdb.php",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd,dbr:dbr},function(data){
				alert(data);
				var ttt = data.split("\n");
			if(ttt[0]=="数据库连接成功")
			{
				$("#dbte").replaceWith("<img src=\"img/icons/right.png\" id=\"dbte\" />");
				var tecndb=1; 
			}
			else
				{
				$("#dbte").replaceWith("<img src=\"img/icons/shut.png\" id=\"dbte\" />");
				var tecndb=0;
			}; 	
			});	
			//alert(tecndb);
		});
	$("#submit").click(function(){
  	var  dbhost= $("#dbaddre").val();
	var  dbuser=$("#dbuser").val();
	var dbpasswd=$("#dbpasswd").val();
	var keywords=$("#keywords").val();
	var wname=$("#wname").val();
	var channel=$("#channel").val();
	var wip=$("#wip").val();
	var wdir=$("#wdir").val();
	var wstyle=$("#wstyle").val();
	var wsub=$("#wsub").val();
	var wfked=$("#wfkey").val();
	wname=wsplit(wname);
	keywords=wsplit(keywords);
	channel=wsplit(channel);
	wip=wsplit(wip);
	wdir=wsplit(wdir);
	wstyle=wsplit(wstyle);
	wsub=wsplit(wsub);
	wfked=wsplit(wfked);
	//alert(1123);
	i = $('input:radio[name="urltype"]:checked').val();
	if(i == "nomal"){
		var urls=$("#wwurl").val();
		urls=wsplit(urls);
		var urltype="";
		var fanyus=0;
	}
	else{
		var urls=$("#wwurl").val();
		urls=wsplit(urls);
		var fanyus=1;
	}
	i = $('input:radio[name="seotype"]:checked').val();
		if(i=="nomal"){
			var seotype=$("#seosent2").val();
		}
		else{
		seotype=$("#seosent").val();
		seotype=wsplit(seotype);
		}
	i = $('input:radio[name="rewrite"]:checked').val();
	if(i=="nomal"){
		rewrites=1;
		var rewrite_h=$("#rewrite_h").val();
		var rewrite_f=$("#rewrite_f").val();
		rewrite_h=wsplit(rewrite_h);
		rewrite_f=wsplit(rewrite_f);
	}
	else{
		rewrites=0;
		rewrite_h="";
		rewrite_f="";
	}
	i = $('input:radio[name="wjs"]:checked').val();
	if(i=="nomal"){
		var wjs=$("#wjsr2").val();
	}
	else{
		wjs=$("#wjsr").val();
		wjs=wsplit(wjs);
	}
	i = $('input:radio[name="db"]:checked').val();
	if(i=="nomal"){
		dbr=$("#dbr2").val();
	}
	else{
		dbr=$("#dbr").val();
		dbr=wsplit(dbr);
	}
	//alert(dbr);
	if(typeof wdir == 'undefined'| wdir.length==0 | wdir==""){
		var tewdir=0;
	}
	else {
		var tewdir=1;
	}
	if(typeof dbr == 'undefined'| dbr.length==0 | dbr==""){
		var tedbr=0;
	}
	else {
		var tedbr=1;
	}
	if(typeof wname == 'undefined'| wname.length==0 | wname==""){
		var tewname=0;
	}
	else {
		var tewname=1;
	}
	if(typeof urls == 'undefined'| urls.length==0 | urls==""){
		var teurls=0;
	}
	else {
		var teurls=1;
	}
	if(typeof nums == 'undefined'){
		tenums=0;
	}
	//alert(tecndb);
	if(typeof tecndb == 'undefined'){
		var tecndb=0;
	}
	
	serror=0;
	subcheck(tenums,"#sitenums");
	subcheck(tedbr,"#dbr");		
	subcheck(tewdir,"#wdir");
	subcheck(tewname,"#wname");
	//alert(tecndb);
	//subcheck(tecndb,"#detest");
	//serror=0;
	if(serror==0){
	 $.post("creatwebs/creat.php?step=1",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd,nums:nums,urltype:urltype,seotype:seotype,keywords:keywords,wname:wname,channel:channel,urls:urls,wip:wip,wdir:wdir,wstyle:wstyle,rewrites:rewrites,rewrite_h:rewrite_h,rewrite_f:rewrite_f,fanyus:fanyus,wjs:wjs,wsub:wsub,wfked:wfked,dbr:dbr},function(data){
				var re =new RegExp(/[\d]+.xls/);
				var nus = nums;
				excfile = data.match(re);
				$("#iinfo").show();
				$("#showinfo").html(data);	
			}); 
	  }
	  else{
		alert("填入必要信息以及测试数据库连接");
	  }
	});
	$("#ibegin").click(function(){
				//alert(nus);
				$("#iinfo").hide();	
				$("#install").show();	
				$("#back_hui").show();
				 $("#iframe_in").attr("src","creatwebs/creat.php?step=2&file="+excfile+"&nums="+nums)
			});
	$("#wclose").click(function(){
			$("#winfo").hide();	
		});
		$("#iwclose").click(function(){
			$("#iinfo").hide();	
			$("#install").hide();
		});
		$("#ibegin2").click(function(){
			$("#install").hide();
			$("#back_hui").hide();
		});
	});
	
	
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