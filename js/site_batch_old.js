  $(document).ready(function(){
  	  tenums=0;
  	  teurls=0;
  	  tefanyu=0;
  	  teked=0;
  	  tere_h=0;
  	  tere_f=0;
  	  tedbr=0;
  	  tecndb=0;
		  var r = /^[0-9]*[1-9][0-9]*$/;
		  //ȡֵУ������
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
		})
		
		$("#url_normal").click(function(){
			$('#fanyu').hide();
		})
		//��ý��㣬ȡ����ֵ
		$("#fanyu").focus(function(){
			$("#fanurl1")[0].focus();
			var fanyu = $("#fanyu").val();
			$("#fanurl1").html(fanyu);
			$('#ff1').show();
			
		})
		//�����������ֵд�뷺�����
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
				serror+=1;	
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
	
		//��ý��㣬ȡurl
		$("#wwurl").focus(function(){
			var wurl = $("#wwurl").val();
			$("#fanurl2").html(wurl);
			$('#ff2').show();
		})
		//�����������ֵд��url����
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
				serror+=1;	
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
		})  
		
		//��ý��㣬ȡkeywords
		$("#keywords").focus(function(){
			var wurl = $("#keywords").val();
			$("#fanurl3").html(wurl);
			$('#ff3').show();
		})
		//�����������ֵд��keywords����
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
		}) 
		
		//seo��
		$("#seoselt").click(function(){
			$('#seosent').hide();
		}) 
		$("#seoselt2").click(function(){
			$('#seosent').show();
		}) 
		//��ý��㣬ȡseo
		$("#seosent").focus(function(){
			var wurl = $("#seosent").val();
			$("#fanurl4").html(wurl);
			$('#ff4').show();
		})
		//�����������ֵд��seo����
		$("#inputok4").click(function(){
			var wurl2 = $("#fanurl4").val();
			$("#seosent").html(wurl2);
			$("#fanurl4").html("");
			$('#ff4').hide();
			seotype = $("#seosent").val();
			seotype = wsplit(seotype);
		}) 
		//��ý��㣬ȡstyle
		$("#wstyle").focus(function(){
			var wurl = $("#wstyle").val();
			$("#fanurl5").html(wurl);
			$('#ff5').show();
		})
		//�����������ֵд��style����
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
		}) 
		
		//α��̬
		$("#rewritec").click(function(){
			$('#rewrite_h').hide();
			$('#rewrite_f').hide();
		}) 
		$("#rewriteo").click(function(){
			$('#rewrite_h').show();
			$('#rewrite_f').show();
		}) 
		//��ý��㣬ȡrewrite_h
		$("#rewrite_h").focus(function(){
			var wurl = $("#rewrite_h").val();
			$("#fanurl6").html(wurl);
			$('#ff6').show();
		})
		//�����������ֵд��rewrite_h����
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
		}) 
		//��ý��㣬ȡrewrite_f
		$("#rewrite_f").focus(function(){
			var wurl = $("#rewrite_f").val();
			$("#fanurl7").html(wurl);
			$('#ff7').show();
		})
		//�����������ֵд��rewrite_f����
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
		}) 
		
		//JS
		$("#wjsc").click(function(){
			$('#wjsr').hide();	
		})
		$("#wjso").click(function(){
			$('#wjsr').show();	
		})
		//��ý��㣬ȡwjs
		$("#wjsr").focus(function(){
			var wurl = $("#wjsr").val();
			$("#fanurl8").html(wurl);
			$('#ff8').show();
		})
		//�����������ֵд��wjs����
		$("#inputok8").click(function(){
			var wurl2 = $("#fanurl8").val();
			$("#wjsr").html(wurl2);
			$("#fanurl8").html("");
			$('#ff8').hide();
			wjs=$("wjsr").val();
			wjs=wsplit(wjs);
		}) 
		
		//��ý��㣬ȡwsub
		$("#wsub").focus(function(){
			var wurl = $("#wsub").val();
			$("#fanurl9").html(wurl);
			$('#ff9').show();
		})
		//�����������ֵд��wsub����
		$("#inputok9").click(function(){
			var wurl2 = $("#fanurl9").val();
			$("#wsub").html(wurl2);
			$("#fanurl9").html("");
			$('#ff9').hide();
			wsub=$("wsub").val();
			wsub=wsplit(wsub);
		}) 
		
		//��ý��㣬ȡwfkey
		$("#wfkey").focus(function(){
			var wurl = $("#wfkey").val();
			$("#fanurl10").html(wurl);
			$('#ff10').show();
		})
		//�����������ֵд��wfkey����
		$("#inputok10").click(function(){
			var wurl2 = $("#fanurl10").val();
			$("#wfkey").html(wurl2);
			$("#fanurl10").html("");
			$('#ff10').hide();
			wfked=$("wfkey").val();
			wfked=wsplit(wfked);
		}) 
		
		//���ݿ�
		$("#dbc").click(function(){
			$('#dbr').hide();	
		})
		$("#dbo").click(function(){
			$('#dbr').show();	
		})
		
		//��ý��㣬ȡdbr
		$("#dbr").focus(function(){
			var wurl = $("#dbr").val();
			$("#fanurl11").html(wurl);
			$('#ff11').show();
		})
		//�����������ֵд��dbr����
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
		}) 
		
		//�������ݿ�����
		$("#detest").click(function(){
			$("#dbte").show();
		   dbhost=$("#dbaddre").val();
			 dbuser=$("#dbuser").val();
			 dbpasswd=$("#dbpasswd").val();
			$.post("test/testdb.php",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd},function(data){
			if(data == 1){
				$("#dbte").replaceWith("<img src=\"img/icons/right.png\" id=\"dbte\" />");
				tecndb=1; 
			}
			else{
				$("#dbte").replaceWith("<img src=\"img/icons/shut.png\" id=\"dbte\" />");
				tecndb=0;
			}; 	
			});	
		})
		//ȡֵ�ύ
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
			
			//У������
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
		
		//����չʾ��
		if(serror == 0 ){
			alert(keywords.length);
		$("#winfo").show();
		$("#wcount").html(nums);
		if(fanyus == 1){
		$("#wut").html("<img src=\"img/icons/right.png\"  />");
		}
		else{
		$("#wut").html("<img src=\"img/icons/shut.png\"  />");		
		}
		$("#wus").html("<img src=\"img/icons/right.png\"  />");
		$("#wkc").html("<img src=\"img/icons/right.png\"  />"+keywords.length+"��");
		$("#wss").html("<img src=\"img/icons/right.png\"  />"+seotype.length+"��");
		$("#wsl").html("<img src=\"img/icons/right.png\"  />"+wstyle.length+"��");
		$("#wre").html("<img src=\"img/icons/right.png\"  />ǰ׺"+rewrite_h.length+"��,��׺"+rewrite_f.length);
		$("#wwjs").html("<img src=\"img/icons/right.png\"  />"+wjs.length+"��");
		$("#wwsu").html("<img src=\"img/icons/right.png\"  />"+wsub.length+"��");
		$("#wwf").html("<img src=\"img/icons/right.png\"  />"+wfked.length+"��");
		$("#wwdh").html("<img src=\"img/icons/right.png\"  />");
		$("#wwdu").html("<img src=\"img/icons/right.png\"  />");
		$("#wwdb").html("<img src=\"img/icons/right.png\"  />"+dbr.length+"��");
	}
		$("#wclose").click(function(){
			$("#winfo").hide();	
		})
		$("#begin").click(function(){
		$("#winfo").hide();	
		//�ύ����
		if(serror == 0){
			$.post("creatwebs/creat.php",{dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd},function(data){
					
			})
		}
		})	
		})
	})
	
	//���ܺ���
	function wsplit(fdata){
		var arr = fdata.split('\n');
		//ɾ���հ�Ԫ��
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