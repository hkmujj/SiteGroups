<?php
set_time_limit(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站群后台管理</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<link href="css/chosen.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script src="js/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="js/site_collect.js"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>

<body>
	<div id="view" style="position: absolute;margin-top: 200px;margin-left: 30%;background: url(img/all.gif) no-repeat;width: 20%;height: 38%;display:none;">正在采集，亲耐心等候........</div>
	<div id="container">
    	<?php require_once 'head.php';?>
        <div id="wrapper">
            <div id="content">
       			<div id="rightnow">
                    <h3 class="reallynow">
                        <span>批量建站</span>
                        <a href="javascript:void(0)" id="del_iis" class="add">批量删除</a>
													<div id="add_add" style="width:600px;height:600px;display:none;">
														<h3>输入要删除的站点名称</h3>
														<textarea id="del_all"></textarea>
														<a id="del_a" href="javascript:void(0)">确认</a>
													</div>
                        <a href="#" class="app_add">增加站点</a>
                        <br />
                    </h3>
				    <p class="youhave">请选择并填入网站基本信息
                    </p>
			  </div>
              <div id="infowrap">
              	<h3 class="reallynow">采集内容</h3>
				<label>目标采集点:</label><select class="chosen" id="select_port"  style="width:400px;"><option>淘宝评论采集</option>
<option>新浪滚动新闻</option><option>天涯(博客)</option><option>中国新闻网体育新闻</option><option>两性知识</option></select>
<br>
<br>
<label style="display:none;">商品关键词:<input type="text" id="prokey" name="prokey" value="化妆品">(搜索商品关键词，在评论采集下有效)</label>
<br>
<br>
<label>淘宝商品地址:<input type="text" id="taobaoye" name="taobaoye" value="http://detail.tmall.com/item.htm?spm=a2106.m874.1000384.1.NCile7&id=35121475160&source=dou&scm=1029.newlist-0.1.50102538&ppath=&sku=&ug="></label>（淘宝商品介绍页面的全部地址）
<br>
<br>
<label>采集数目:<input type="text" id="nums" name="nums" value="100">条</label>（采集成功数目存在误差，建议采集数目为10—200,如果为淘宝评论采集建议采集基数为100+越大采集越多，由于淘宝采取对评论有保护作用，所以采集一般选取评论较多的商品进行采集，如果成功采集条数为0，请重新输入另外一个商品进行采集，更多功能在继续......）
<br>
<br>
<h3>数据库连接</h3> 
<br>
<label>数据库地址:<input type="text" name="dbhost" id="dbhost" value="localhost"/></label> 
<label>数据库用户:<input type="text" name="dbuser" id="dbuser" value="root" /></label>  
<label>数据库密码:<input type="password" name="dbpasswd" id="dbpasswd" /></label>     
<br>
<br>
<label>数据库名称:<input type="text" name="dbname" id="dbname" /></label> 
<br>
<br>
<a href="javascript:void(0)" id="cstart" style="margin-left:360px;">确认</a>             	
</div>

            </div>
            <?php require_once 'sider.php';?>
        <div id="footer">
        <div id="credits">
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
                <li><a href="javascript: document.cookie='theme=5'; window.location.reload();" title="Mix" id="defswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
<script>
$("#cstart").click(function(){
	$("#view").show();
	var sport=$("#select_port").val();
	var nums=$("#nums").val();
	var taobao=$("#taobaoye").val();
	var dbhost=$("#dbhost").val();
	var dbuser=$("#dbuser").val();
	var dbpasswd=$("#dbpasswd").val();
	var dbname=$("#dbname").val();
	var prokey=$("#prokey").val();
	//alert(taobao);
	$.post("creatwebs/collect.php",{nums:nums,sport:sport,dbhost:dbhost,dbuser:dbuser,dbpasswd:dbpasswd,prokey:prokey,dbname:dbname,taobao:taobao},function(data){
		$("#view").hide();
		alert(data);
	});
});
</script>
