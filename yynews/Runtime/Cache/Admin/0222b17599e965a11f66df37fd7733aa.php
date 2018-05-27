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
                <a href='/yynews/index.php/Admin/Power/categoryManager' class="selected">类别管理</a>
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
                    类别管理
                </div>
                <div id="catManTable">
                   <table id="cm_table" border="1" >
                    <thead>
                        <tr >
                            <td align="center">序号</td>
                            <td align="center">类别名称</td>
                            <td align="center" width="120px">操作</td>
                        </tr>
                    </thead>
                    <?php
 foreach($tempcategory1 as $row){ $catId=$row["catid"]; $catName=$row["catname"]; echo "<tr>
                        <td align='center'>$catId</td>
                        <td align='center'>$catName</td>
                        <td align='center'><a href='/yynews/index.php/Admin/Power/categoryManager?catId=$catId'>删除</a></td>
                        </tr>"; } ?>
                </table> 
            </div>
            
            <form action="/yynews/index.php/Admin/Power/categoryManager" method="post">
                <p style="font-family:'微软雅黑';font-size:21px">&nbsp &nbsp &nbsp请输入新类别名称:</p>
                &nbsp &nbsp<input type="text" name="addCategory" style="height:25px;margin-top:18px"/>
                <input type="submit" value="添加类别"  style="height:27px;width:60px;margin-left:4px"/>
            </form>
            
        </div>
    </div>
    <!--－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
    <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>