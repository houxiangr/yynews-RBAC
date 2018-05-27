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
                <div id="commentStyle">
                    角色管理
                </div>
                <div id="catManTable">
                   <table id="cm_table" border="1" >
                    <thead>
                        <tr >
                            <td align="center">序号</td>
                            <td align="center">角色名</td>
                            <td align="center">角色是否可用</td>
                            <td align="center">创建时间</td>
                            <td align="center">更新时间</td>
                            <td align="center" width="120px">操作</td>
                        </tr>
                    </thead>
                    <?php
 $i=1; foreach($roleData as $row){ $roleId=$row["id"]; $roleName=$row["role_name"]; $status=$row["status"]; $create_time=$row["create_time"]; $updata_time=$row["updata_time"]; echo "<tr>
                        <td align='center'>$i<input class='hidden modify_input' type='hidden' id='modify_role_id' value='$roleId'></td>
                        <td align='center'>$roleName</td>
                        <td align='center'>$status</td>
                        <td align='center'>$create_time</td>
                        <td align='center'>$updata_time</td>
                        <td align='center'><a href='/yynews/index.php/Admin/RBAC/roleManager?roleId=$roleId'>删除</a>
                        <a href='/yynews/index.php/Admin/RBAC/roleModify/roleId/$roleId'>修改</a></td>
                        </tr>"; $i++; } ?>
                </table>
            </div>
            <div id="add_role">
            <form method="post" action="/yynews/index.php/Admin/RBAC/roleManager">
                <h1>角色添加：</h1>
                <p>角色名：<input type="text" name="role_name"></p>
                <p>角色拥有的权限：</p>
                <?php
 $i=1; foreach($accessData as $row){ $access_name=$row["access_name"]; $access_id=$row["id"]; echo "
                <input type='checkbox' name='$i' value='$access_id'>$access_name</br>
                "; $i++; } ?>
                <input type="submit" name="">
            </form>
            </div>
        </div>
    </div>
    <!--－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
    <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>