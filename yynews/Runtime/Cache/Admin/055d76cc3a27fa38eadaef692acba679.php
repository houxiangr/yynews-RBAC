<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="/yynews/Public/css/Initial.css" />
    <link rel="stylesheet" href="/yynews/Public/css/yynews.css" />
    <link rel="stylesheet" href="/yynews/Public/css/comment.css" />
    </head>
    <body>
        <!--－－－－－－－－－－－－头部－－－－－－－－－－－－－－－－－－－－－-->
        <div id="header">
            <img src="<?php echo IMG_URL; ?>banner5.jpg">
        </div>
        <!--－－－－－－－－－－－－导航条和搜索－－－－－－－－－－－－－－－－－－－－－-->
       <div id="nav_search">
            <ul id="nav">
                <li class='tooltip'>
                <a href="/yynews/index.php/Home/Index/index">首页</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/Power/categoryManager'>类别管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/Power/newsManager' class="selected">新闻管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/Power/commentManager'>评论管理</a>
                </li>
                 <li class='tooltip'>
                <a href='/yynews/index.php/Admin/Power/linkManager'>友情链接管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/adminManager'>用户管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/roleManager'>角色管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/accessManager'>权限管理</a>
                </li>
                 <span>欢迎管理员：<?php echo session('admin_name')?></span>&nbsp
                <a href="/yynews/index.php/Admin/Power/exited">退出登陆</a>&nbsp
                <a href="/yynews/index.php/Admin/Power/usernameModify">修改用户名</a>
                &nbsp
                <a href="/yynews/index.php/Admin/Power/userpasswordModify">修改密码</a>
            </ul>
            <div id="search_div">
                <form action="/yynews/index.php/Admin/News/newssearch" method="post" style="text-align:center;">
                        <input type="text" name="searchContent" id="search_content" class="comment_text" />
                        <div id="search_submit">搜索</div>
                    <input type="submit" class="hidden" id="search_submit_input"/>
                </form>
            </div>
        </div>
        <!--－－－－－－－－－－－－main－－－－－－－－－－－－－－－－－－－－－-->
        <div id="main">
            <div >
                <form action="/yynews/index.php/Admin/Power\newsModify2" method="post" id="newsModify_form"  >
                    <input type="hidden" name="newsId" value=<?php echo $tempnews1[0]["newsid"]?>>
                    所属类别：<br />
                    <select name="catId">
                        <?php
 foreach($tempcategory as $row){ $tempCatName=$row["catname"]; $tempCatId=$row["catid"]; if($tempCatId==$tempnews1[0]["catid"]) echo "<option value='$tempCatId' selected>$tempCatName</option>"; else echo "<option value='$tempCatId'>$tempCatName</option>"; } ?>
                    </select>
                    <br />
                    新闻标题：<br />
                    <input type="text" id="newsTitle" style="height:30px;width:190px" name="newsTitle" value=<?php echo $tempnews1[0]["title"] ?>><br />
                    新闻内容：<br />
                    <textarea name="newsContent" id="newsContent" cols="50" rows="9" ><?php echo $tempnews1[0]["content"]?></textarea><br />
                    <input type="submit" name="modifyNews" value="保存返回" style="margin-top:8px;height:28px"/>
                </form>
            </div>
            
            
        </div>
        <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
        <div id="footer">
            <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
        </div>
    </body>
    </html>