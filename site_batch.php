<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站群后台管理</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="js/site_batch.js" charset="utf-8"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>
	<div id="back_hui"></div>
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
              	<ul>
              <a id="jiben_a" href="javascript:void(0)">	<li id="jiben_l" class="tags">基本信息配置</li></a>
               <a id="wzxx_a" href="javascript:void(0)"><li id="wzxx_l" class="tags">网站信息配置</li></a>
              	<a id="gjpz_a" href="javascript:void(0)"><li id="gjpz_l" class="tags">网站高级配置</li></a>
              <a id="sjk_a" href="javascript:void(0)"><li id="sjk_l" class="tags">数据库配置</li></a>
              </ul>
              <div class="clear"></div>
              	<form id="site_info">
              		<?php
              		for($i=1;$i <= 16;$i++){
              			echo "<div id=\"ff$i\" style=\"position: absolute;opacity: 0.6;background: #eee;display:none;\"><div><a id=\"inputok$i\" href=\"javascript:void(0)\">确认</a></div><textarea id=\"fanurl$i\" style=\"width: 681px;height: 340px;opacity: 1;/* background: #eee; */color: #375b91;font-size: 20px;font-weight: bold;border: #000 solid 1px;padding: 20px;\"></textarea></div>";	
              		}
              		?>
              		<div id="winfo" style="position: absolute;opacity: 1;background: #eee;display:none;width: 650px;height: 500px;
margin-left: 40px;">
              		 <table>
              		 	<th>数据确认</th>
              		  <tr>
              		  	<td>建站数量</td><td id="wcount"></td>	
              		  </tr>
              		  <tr>
              		  	<td>域名规则</td><td id="wut"></td>	
              		  </tr>
              		  <tr>
              		  	<td>域名</td><td id="wus"></td>	
              		  </tr>
              		  <tr>
              		  	<td>关键词</td><td id="wkc"></td>	
              		  </tr>
              		  <tr>
              		  	<td>SEO关键句</td><td id="wss"></td>	
              		  </tr>
              		  <tr>
              		  	<td>风格</td><td id="wsl"></td>	
              		  </tr>
              		  <tr>
              		  	<td>伪静态</td><td id="wre"></td>	
              		  </tr>
              		  <tr>
              		  	<td>网站JS</td><td id="wwjs"></td>	
              		  </tr>
              		  <tr>
              		  	<td>统计代码</td><td id="wwsu"></td>	
              		  </tr>
              		  <tr>
              		  	<td>友情key</td><td id="wwf"></td>	
              		  </tr>
              		  <tr>
              		  	<td>数据库地址</td><td id="wwdh"></td>	
              		  </tr>
              		  <tr>
              		  	<td>数据库用户</td><td id="wwdu"></td>	
              		  </tr>
              		  <tr>
              		  	<td>所用数据库</td><td id="wwdb"></td>	
              		  </tr>
              		</table>
              		<div style="float:left;width: 80px;height: 25px;background:url(img/icons/bottom.gif);"><a id="begin" href="javascript:void(0)"style="size: px;font-size: 18px;color: #000;width: 80px;padding-left: 20px;">确认</a></div><div style="float:left; margin-left:88px;width: 80px;height: 25px;background:url(img/icons/bottom.gif)"><a id="wclose" href="javascript:void(0)" style="size: px;font-size: 18px;color: #000;width: 80px;padding-left: 20px;">关闭</a></div>
              		</div>
              			<div id="iinfo" style="position: absolute;opacity: 1;background: #eee;display:none;width: 650px;height: 500px;
margin-left: 40px;"><textarea id="showinfo" style="width:600px;height:200px;margin-top:20px;margin-left:20px;"></textarea>
<div style="float:left;width: 80px;height: 25px;background:url(img/icons/bottom.gif);"><a id="ibegin" href="javascript:void(0)"style="size: px;font-size: 18px;color: #000;width: 80px;padding-left: 20px;">确认</a></div><div style="float:left; margin-left:88px;width: 80px;height: 25px;"><a id="iwclose" href="javascript:void(0)" style="size: px;font-size: 18px;color: #000;width: 80px;">关闭</a></div>
              		</div>
              		<div id="install" style="position: absolute;opacity: 1;background: #eee;display:none;width: 650px;height:160px;
margin-left: 40px;"><iframe name="iframe_in"id="iframe_in" frameborder="no" border="0" style="width:650px;height:250px;font-size:13px;"></iframe>
<div style="float:left;width: 80px;height: 25px;"><a id="ibegin2" href="javascript:void(0)"style="size: px;font-size: 18px;color: #000;width: 80px;position: relative;top: -125px;left: 150px;">确认</a></div><div style="float:left; margin-left:88px;width: 80px;height: 25px;"><a id="iwclose" href="javascript:void(0)" style="size: px;font-size: 18px;color: #000;width: 80px;position: relative;
top: -125px;left: 150px;">关闭</a></div>
              		</div>
              		
              			<div id="jiben">
              				<table class="tag_table">
              					<tr>
										<td>建站数量:</td><td><input type="text" name="sitenums" id="sitenums"   onblur="check()"     /><img src="img/icons/load.gif" id="muns" style="display:none;" /></td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<td>域名规则:</td><td><input type="radio" name="urltype" id="url_normal" value="nomal" />传统</td>
														<td><input type="radio" name="urltype" id="url_fan" value="urlfan" />泛域</td>
												</tr>		
												<tr>
													<td>伪静态:</td><td><input type="radio" name="rewrite" id="rewriteo" value="nomal" />开启
														<input type="radio" name="rewrite" id="rewritec" value="urlfan" />关闭</td>
												</tr>
										<tr>
									 <td>安装地址:</td><td><textarea name="wdir" id="wdir" class="turll">d:/</textarea></td>
									 <td><a id="jiben_next" class="next_step" href="javascript:void(0)">下一步</a></td>
									</table>
									</div>
									<!-- 网站信息-->
									<div id="wzxx" style="display:none;">
										<table class="tag_table">
													<tr id="rand_fanyu" style="display:none;">
														<td>自动随机泛域:</td><td><input type="radio" name="rand_url" id="f3" value="3" />3位</td>
														<td><input type="radio" name="rand_url" id="f4" value="4" />4位</td>
														<td><input type="radio" name="rand_url" id="f5" value="5" />5位</td>
														<td><input type="radio" name="rand_url" id="f6" value="6" />6位</td>
														<td><input type="radio" name="rand_type" id="zimu" value="0" />纯字母</td>
														<td><input type="radio" name="rand_type" id="zmsz" value="1" />字母+数字</td>
													</tr>
													<tr id="fanyu_zhu" style="display:none;">
													<td>主域:</td><td colspan="3"><input type="text" name="main_url" id="main_url" /></td><td><a href="javascript:void(0)" id="creat_fanyu">生成随机泛域</a></td>
													</tr>
													<tr>
													<td>网站名称:</td><td  colspan="6"><textarea name="wname" id="wname" class="turll"></textarea>&nbsp&nbsp<img src="img/icons/load.gif" id="wname2" style="display:none;" /></td>
													</tr>
													<tr>
										<td>域名(换行):</td><td colspan="6"><textarea name="url" id="wwurl" class="turll"></textarea>&nbsp&nbsp<img src="img/icons/load.gif" id="url2" style="display:none;" /></td></tr>
										<tr>
									<td>IP(换行):</td><td colspan="6"><textarea name="wip" id="wip" class="turll"></textarea>&nbsp&nbsp<img src="img/icons/load.gif" id="wip2" style="display:none;" /></td>
									</tr><tr>
								<td>关键词(换行):</td><td colspan="6"><textarea name="keywords" id="keywords" class="turll"></textarea> &nbsp&nbsp<img src="img/icons/load.gif" id="ked2" style="display:none;" /> </td></tr>
								<tr>
										<td>风格:</td><td colspan="6"><textarea name="wstyle" id="wstyle"  class="fege" >1</textarea>&nbsp&nbsp(请以换行相隔，如无则随机选取)<img src="img/icons/load.gif" id="wsty2" style="display:none;" />
									</td>
									</tr><tr>
										<td>SEO句:</td><td colspan="6"><textarea name="seosent" id="seosent" class="turll"></textarea>(请以换行相隔，关键词用"({})"代表)</td></tr>
															<tr><td>栏目:</td><td colspan="6"><textarea name="channel" id="channel"  class="turll" ></textarea>(请以换行相隔)</td><tr>
																<tr> <td colspan="8"><a id="wzxx_next" class="next_step" href="javascript:void(0)">下一步</a></td></tr>
														</table>
									</div>
									<!-- 高级配置-->
									<div id="gaoji" style="display:none" >
										<table class="tag_table">
									 <tr class="wjt_tr">
									<td>伪静态前缀:	</td><td><textarea name="rewrite_h" id="rewrite_h" class="turll" >stg</textarea>&nbsp&nbsp<img src="img/icons/load.gif" id="re_h" style="display:none;" /></td></tr><tr class="wjt_tr">
								<td>伪静态后缀:</td>	<td><textarea name="rewrite_f" id="rewrite_f" class="turll" >.html</textarea>&nbsp&nbsp<img src="img/icons/load.gif" id="re_f" style="display:none;" /></td></tr>
									<tr>	
									<td>网站JS:	</td><td><textarea name="wjsr" id="wjsr" class="turll" ></textarea> (请以换行相隔，如无则以输入第一个作为有效规则)</td></tr>
															<tr>
														<td>统计代码: </td><td> <textarea name="wsub" id="wsub" class="turll" ></textarea>  (请以换行相隔依次输入)</td></tr>
														<tr>
														<td>友情Key:</td> <td>	<textarea name="wfkey"  id="wfkey" class="turll" ></textarea> (请以换行相隔，如无则以输入第一个作为有效规则)</td></tr>
														<tr> <td colspan="2"><a id="gjpz_next" class="next_step" href="javascript:void(0)">下一步</a></td></tr>
													</table>
													</div>
														<!-- 数据库配置-->
														<div id="shujuku" style="display:none;">
															<table class="tag_table">
													<tr><td class="sort_td">数据库地址:</td><td><input type="text" name="dbaddre" id="dbaddre" value="localhost" /></td></tr>
													<tr><td class="sort_td">	用户名:</td><td><input type="text" name="dbuser" id="dbuser" value="root" /></td></tr>
														<tr><td class="sort_td">密码:</td><td><input type="password" name="dbpasswd" id="dbpasswd" value="root" /></td></tr>
														<tr>
														<td class="sort_td"  rowspan="2">数据库:</td><td><input type="radio" name="db" id="dbc" value="nomal">选择
														<select name="dbr" id="dbr2" class="selt">
																  <option value ="volvo">Volvo</option>
																  <option value ="saab">Saab</option>
																  <option value="opel">Opel</option>
																  <option value="audi">Audi</option>
																</select></td></tr>
																<tr><td class="in_s" colspan="2"><input type="radio" name="db" id="dbo" value="other"> 其他
															<textarea name="dbr" id="dbr"  class="tturll" ></textarea>(换行相隔，空输入第一个作为有效规则)&nbsp&nbsp<img src="img/icons/load.gif" id="dbr2" style="display:none;" /></td></tr>
															<tr> <td colspan="2"><a id="detest" class="next_step" href="javascript:void(0)">测试数据库</a></td></tr>
															<tr> <td colspan="2"><a id="submit" class="next_step" href="javascript:void(0)">下一步</a></td></tr>
															</table>
															</div>
 
              	</form>
  
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
