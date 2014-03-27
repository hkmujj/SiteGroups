{<head_php>}
<!DOCTYPE html common "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title> {<title>} </title>
<meta content="{<keyword>}" name="keywords">
<meta content="{<description>}" name="description">
<link href="{<css_file>}" rel="stylesheet" type="text/css" />
{<web_js>}
</head>
<body>
<div class="{<main_content>}"></div>
<div class="{<main_head>}">
  <h1><a href="{<web_url>}">{<web_name>}</a></h1>
</div>
<div class="{<head_line>}"></div>
<div class="{<main>}">
  <ul>
  	{<foreach_pinglun>}
    <li>
      <div class="{<mmiddle>}">
        <p class="{<bline>}"> <img src="{<picture>}" alt="{<uname>}" border="0" width="40" height="40"> <span class="{<uname_span>}">{<uname>}</span> <span class="{<time_span>}">{<time>}</span> </p>
        <p>{<pinglun>}</p>
      </div>
    </li>
    {<end_foreach_pinglun>}
  </ul>
</div>
<div class="{<plist>}"> {<foreach_page>}{<end_foreach_page>}<a class="nextPage" href="{<forword_page_link>}">上一页</a><a class="nextPage" href="{<next_page_link>}">下一页</a> </div>
<div class="{<foot>}">
  <div class="{<flink>}">
    <ul>
      {<foreach_flink>}{<end_foreach_flink>}
    </ul>
  </div>
  <p>{<copyright>}</p>
  <script src="{<web_sub>}"></script> 
</div>
</body>
</html>