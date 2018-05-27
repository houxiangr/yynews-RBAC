<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="<?php echo CSS_URL?>Initial.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL?>yynews.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL?>comment.css" />
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-3.0.0.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>accessManager.js"></script>
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
                <a href='/yynews/index.php/Admin/Power/newsManager'>新闻管理</a>
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
                <a href='/yynews/index.php/Admin/RBAC/roleManager' class="selected">角色管理</a>
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
        <div id="main">
            <div id="listRifht">
            <form action="/yynews/index.php/Admin/RBAC/roleModify" method="post">
                <p style="font-family:'微软雅黑';font-size:21px">&nbsp &nbsp &nbsp角色内容修改:</p>
                <input type="hidden" name="role_id" value="<?php echo $_GET['roleId']?>">
                &nbsp &nbsp角色名称：<input type="text" name="roleName" style="height:25px;margin-top:18px" value="<?php echo $role_name[0]['role_name']?>"/></br>
                此角色是否有效
                <input type="checkbox" name="role_status" value="1" <?php if($role_name[0]["status"]==1) echo "checked='checked'"; ?>></br>
                权限拥有情况：</br>
                <?php
 $i=1; foreach($accessData as $row){ $access_name=$row["access_name"]; $access_id=$row["id"]; if(in_array($access_id,$role_access_data)){ echo "
                    <input type='checkbox' name='$i' value='$access_id' checked='checked'>$access_name</br>
                    "; }else{ echo "
                    <input type='checkbox' name='$i' value='$access_id'>$access_name</br>
                    "; } $i++; } ?>
                </br>
                <input type="submit" value="修改"  style="height:27px;width:60px;margin-left:4px"/>
            </form>
        </div>
    </div>
    <!--－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
    <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>