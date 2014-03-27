<?php 
	//设置需要替换的变量
	$rcss = new COLOR;
	$replace_title = '<?php echo $webname; ?>';
	$replace_keyword = '<?php for($u=1;$u <= $ked_times;$u++){echo strip_tags($keywords[$u-1],"").",";} ?>';
	$replace_description = '<?php echo strip_tags($webseo,""); ?>';
	$replace_css_file = $rcss->creat_tag(6).'.css';
	$replace_web_js = '<?php echo $webjs; ?>';
	$replace_web_name = '<?php echo $webname; ?>';
	$replace_main_content = $rcss->creat_tag(5);
	$replace_main_head = $rcss->creat_tag(4);
	$replace_head_line = $rcss->creat_tag(3);
	$replace_main = $rcss->creat_tag(6);
	$replace_mtop = $rcss->creat_tag(2);
	$replace_mmiddle = $rcss->creat_tag(2).'_'.$rcss->creat_tag(2);
	$replace_bline = $rcss->creat_tag(2).'_'.$rcss->creat_tag(3);
	$replace_picture = 'imgs/<?php echo $xulie1*2+$xulie*12; ?>.jpg"';
	$replace_uname = '<?php echo $myrowst[\'Title\']; ?>';
	$replace_uname_span = $rcss->creat_tag(3).'_'.$rcss->creat_tag(2);
	$replace_time_span = $rcss->creat_tag(3).'_'.$rcss->creat_tag(3);
	$replace_time = '<?php  echo $myrowst[\'Date\']; ?>';
	$replace_pinglun = '<?php $pinglun = $myrowst[\'Content\'];$pinglun = str_replace("{<ked>}",$keywords[0],$pinglun);echo $pinglun;?>';
	$replace_mbottom = $rcss->creat_tag(2).'_'.$rcss->creat_tag(4);
	$replace_plist = $rcss->creat_tag(1).'_'.$rcss->creat_tag(2);
	$replace_page_link = $page_link;
	$replace_flink = $rcss->creat_tag(3).'_'.$rcss->creat_tag(3);
	$replace_copyright = 'Copyright  2013 <?php echo $weburl; ?> All Rights Reserved.';
	$replace_web_sub = '<?php echo $websub; ?>';
	$replace_web_url = '<?php echo "http://".$weburl;?>';
	$replace_foot = $rcss->creat_tag(1).'_'.$rcss->creat_tag(3);
	$replace_flink_name = "";
	$replace_next_page_link = "";
	$replace_forword_page_link = $forword_page;
	$replace_foreach_pinglun = '<?php $xulie1=$dpage+1; while($myrowst=mysql_fetch_array($ra)){ ?>';
	$replace_next_page_link = '<?php if($wjtk==1 & $npg < $total_page) echo "/".$wjtqz."-".$npg.$wjthz;else echo "index.php?page=$npg"; ?>';
	$replace_forword_page_link = '<?php if($wjtk==1 & $prepg >= 1) echo "/".$wjtqz."-".$prepg.$wjthz;else echo "index.php?page=$prepg"; ?>';
	$replace_foreach_page = '<?php for($pg=1;$pg <= 10;$pg++){if($pg == $dpage){ echo "<span class=\"current\">$pg</span> ";	}	else{ if($wjtk==1){ echo 	"<a class=\"pages\" href=\"/".$wjtqz."-".$pg."".$wjthz."\">$pg</a>";	}else{ echo "<a class=\"pages\" href=\"index.php?page=$pg\">$pg</a>";	}}} ?>';
	$replace_foreach_flink = file_get_contents("../class/inc_flink.php");
	$replace_end_foreach_pinglun = '<?php $xulie1++; } ?>';
	$replace_end_foreach_page = "";
	$replace_end_foreach_flink = "";
	$replace_head_php = file_get_contents("../code/head_php.php");
	
	//css
	$ziti = array('微软雅黑','宋体','黑体','仿宋','楷体');
	$replace_css_body_color = $rcss->creat_color();
	$replace_css_body_font_size = rand(14,16).'px';
	$replace_css_font = $ziti[rand(0,4)];
	$replace_logo_background_pic = 'skin/imgs/banner'.rand(1,20).'.jpg';
	$replace_logo_font_color = $rcss->creat_color();
	$replace_head_line_color = $rcss->creat_color();
	$replace_head_line_color = $rcss->creat_color();
	$replace_pinglun_background_color = $rcss->creat_color();
	$replace_pinglun_margin_top = rand(5,30).'px';
	$replace_pinglun_font_size = rand(14,16).'px';
	$replace_pinglun_font_line_height = rand(10,60).'px';
	$replace_pinglun_fenjie_line_color = $rcss->creat_color();
	$replace_bitem1_color = $rcss->creat_color();
	$replace_bitem2_color = $rcss->creat_color();
	$replace_plist_a_color = $rcss->creat_color();
	$replace_plist_a_border_color = $rcss->creat_color();
	$replace_plist_a_background_color = $rcss->creat_color();
	$replace_plist_a_color = $rcss->creat_color();
	$replace_foot_background_color = $rcss->creat_color();
	$replace_foot_line_color = $rcss->creat_color();
	$replace_copyright_color =$rcss->creat_color();
	
	$index_file_root = "../code/index.php";
	$index_file_content = file_get_contents($index_file_root);
	//替换标题
	$index_file_content = str_replace('{<title>}',$replace_title,$index_file_content);
	//替换关键词
	$index_file_content = str_replace('{<keyword>}',$replace_keyword,$index_file_content);
	//替换描述
	$index_file_content = str_replace('{<description>}',$replace_description,$index_file_content);
	//替换css路径
	$index_file_content = str_replace('{<css_file>}',$replace_css_file,$index_file_content);
	//替换JS路径
	$index_file_content = str_replace('{<web_js>}',$replace_web_js,$index_file_content);
	//替换网站名称
	$index_file_content = str_replace('{<web_name>}',$replace_web_name,$index_file_content);
	//替换最外层标签
	$index_file_content = str_replace('{<main_content>}',$replace_main_content,$index_file_content);
	//替换头部标签
	$index_file_content = str_replace('{<main_head>}',$replace_main_head,$index_file_content);
	//替换头部虚线
	$index_file_content = str_replace('{<head_line>}',$replace_head_line,$index_file_content);
	//替换内容标签
	$index_file_content = str_replace('{<main>}',$replace_main,$index_file_content);
	//替换列表头部虚线
	$index_file_content = str_replace('{<mtop>}',$replace_mtop,$index_file_content);
	$index_file_content = str_replace('{<mmiddle>}',$replace_mmiddle,$index_file_content);
	$index_file_content = str_replace('{<bline>}',$replace_bline,$index_file_content);
	$index_file_content = str_replace('{<picture>}',$replace_picture,$index_file_content);
	$index_file_content = str_replace('{<uname>}',$replace_uname,$index_file_content);
	$index_file_content = str_replace('{<uname_span>}',$replace_uname_span,$index_file_content);
	$index_file_content = str_replace('{<time_span>}',$replace_time_span,$index_file_content);
	$index_file_content = str_replace('{<time>}',$replace_time,$index_file_content);
	$index_file_content = str_replace('{<pinglun>}',$replace_pinglun,$index_file_content);
	$index_file_content = str_replace('{<mbottom>}',$replace_mbottom,$index_file_content);
	$index_file_content = str_replace('{<plist>}',$replace_plist,$index_file_content);
	$index_file_content = str_replace('{<page_link>}',$replace_page_link,$index_file_content);
	$index_file_content = str_replace('{<flink>}',$replace_flink,$index_file_content);
	$index_file_content = str_replace('{<copyright>}',$replace_copyright,$index_file_content);
	$index_file_content = str_replace('{<web_sub>}',$replace_web_sub,$index_file_content);
	$index_file_content = str_replace('{<web_url>}',$replace_web_url,$index_file_content);
	$index_file_content = str_replace('{<foot>}',$replace_foot,$index_file_content);
	$index_file_content = str_replace('{<flink_name>}',$replace_flink_name,$index_file_content);
	$index_file_content = str_replace('{<head_php>}',$replace_head_php,$index_file_content);
	$index_file_content = str_replace('{<next_page_link>}',$replace_next_page_link,$index_file_content);
	$index_file_content = str_replace('{<forword_page_link>}',$replace_forword_page_link,$index_file_content);
	//替换循环开始
	$index_file_content = str_replace('{<foreach_pinglun>}',$replace_foreach_pinglun,$index_file_content);
	$index_file_content = str_replace('{<foreach_page>}',$replace_foreach_page,$index_file_content);
	$index_file_content = str_replace('{<foreach_flink>}',$replace_foreach_flink,$index_file_content);
	//替换循环结束
	$index_file_content = str_replace('{<end_foreach_pinglun>}',$replace_end_foreach_pinglun,$index_file_content);
	$index_file_content = str_replace('{<end_foreach_page>}',$replace_end_foreach_page,$index_file_content);
	$index_file_content = str_replace('{<end_foreach_flink>}',$replace_end_foreach_flink,$index_file_content);
	$css_file_root = "../code/style.css";
	$css_file = file_get_contents($css_file_root);
	$css_file = str_replace('{<main_content>}',$replace_main_content,$css_file);
	$css_file = str_replace('{<main_head>}',$replace_main_head,$css_file);
	$css_file = str_replace('{<head_line>}',$replace_head_line,$css_file);
	$css_file = str_replace('{<main>}',$replace_main,$css_file);
	$css_file = str_replace('{<mtop>}',$replace_mtop,$css_file);
	$css_file = str_replace('{<middle>}',$replace_mmiddle,$css_file);
	$css_file = str_replace('{<bline>}',$replace_bline,$css_file);
	$css_file = str_replace('{<mbottom>}',$replace_mbottom,$css_file);
	$css_file = str_replace('{<plist>}',$replace_plist,$css_file);
	$css_file = str_replace('{<flink>}',$replace_flink,$css_file);
	$css_file = str_replace('{<foot>}',$replace_foot,$css_file);
	
	$css_file = str_replace('{<css_body_color>}',$replace_css_body_color,$css_file);
	$css_file = str_replace('{<css_body_font_size>}',$replace_css_body_font_size,$css_file);
	$css_file = str_replace('{<css_font>}',$replace_css_font,$css_file);
	$css_file = str_replace('{<logo_background_pic>}',$replace_logo_background_pic,$css_file);
	$css_file = str_replace('{<logo_font_color>}',$replace_logo_font_color,$css_file);
	$css_file = str_replace('{<head_line_color>}',$replace_head_line_color,$css_file);
	$css_file = str_replace('{<pinglun_background_color>}',$replace_pinglun_background_color,$css_file);
	$css_file = str_replace('{<pinglun_margin_top>}',$replace_pinglun_margin_top,$css_file);
	$css_file = str_replace('{<pinglun_font_size>}',$replace_pinglun_font_size,$css_file);
	$css_file = str_replace('{<pinglun_font_line_height>}',$replace_pinglun_font_line_height,$css_file);
	$css_file = str_replace('{<pinglun_fenjie_line_color>}',$replace_pinglun_fenjie_line_color,$css_file);
	$css_file = str_replace('{<bitem1_color>}',$replace_bitem1_color,$css_file);
	$css_file = str_replace('{<bitem2_color>}',$replace_bitem2_color,$css_file);
	$css_file = str_replace('{<plist_a_color>}',$replace_plist_a_color,$css_file);
	$css_file = str_replace('{<plist_a_border_color>}',$replace_plist_a_border_color,$css_file);
	$css_file = str_replace('{<plist_a_background_color>}',$replace_plist_a_background_color,$css_file);
	$css_file = str_replace('{<plist_a_color>}',$replace_plist_a_color,$css_file);
	$css_file = str_replace('{<foot_background_color>}',$replace_foot_background_color,$css_file);
	$css_file = str_replace('{<foot_line_color>}',$replace_foot_line_color,$css_file);
	$css_file = str_replace('{<copyright_color>}',$replace_copyright_color,$css_file);
	
	
	
	
	
?>