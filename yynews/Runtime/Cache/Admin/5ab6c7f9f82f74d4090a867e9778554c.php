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
                <a href='/yynews/index.php/Admin/RBAC/roleManager'>角色管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/accessManager' class="selected">权限管理</a>
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
                    友情链接管理
                </div>
                <div id="catManTable">
                   <table id="cm_table" border="1" >
                    <thead>
                        <tr >
                            <td align="center">序号</td>
                            <td align="center">权限名</td>
                            <td align="center">权限包含的操作</td>
                            <td align="center">权限是否可用</td>
                            <td align="center">创建时间</td>
                            <td align="center">更新时间</td>
                            <td align="center" width="120px">操作</td>
                        </tr>
                    </thead>
                    <?php
 $i=1; foreach($tempaccess as $row){ $accessId=$row["id"]; $accessName=$row["access_name"]; $url=$row["urls"]; $status=$row["status"]; $create_time=$row["create_time"]; $updata_time=$row["updata_time"]; echo "<tr>
                        <td align='center' class='id_td'>
                        $i
                        <input class='hidden modify_input' type='hidden' value='$accessId'>
                        </td>
                        <td align='center' class='name_td'>
                        <span class='content'>$accessName</span>
                        <input class='hidden modify_input' type='text' value='$accessName'>
                        </td>
                        <td align='center' class='url_td'>
                        <span class='content'>$url</span>
                        <input class='hidden modify_input' type='text' value='$url'>
                        </td>
                        <td align='center' class='status_td'>
                        <span class='content'>$status</span>
                        <input class='hidden modify_input' type='text' value='$status'>
                        </td>
                        <td align='center'>$create_time</td>
                        <td align='center' class='updata_time_td'>
                        <span id='updata_time_content'>$updata_time</span>
                        </td>
                        <td align='center'>
                        <a href='/yynews/index.php/Admin/RBAC/accessManager?accessId=$accessId'>删除</a>
                        <a href='javascript:void(0)' class='modify_access'>修改</a>
                        </td>
                        </tr>"; $i++; } ?>
                </table>
            </div>
            <form action="/yynews/index.php/Admin/RBAC/accessManager" method="post">
                <p style="font-family:'微软雅黑';font-size:21px">&nbsp &nbsp &nbsp请输入新权限信息:</p>
                &nbsp &nbsp权限名称：<input type="text" name="accessName" style="height:25px;margin-top:18px"/>
                权限内容：<input type="text" name="accessUrl" style="height:25px;margin-top:18px"/>
                <input type="submit" value="添加"  style="height:27px;width:60px;margin-left:4px"/>
            </form>
            
        </div>
    </div>
    <!--－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
    <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>