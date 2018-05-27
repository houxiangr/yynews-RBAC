<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>Initial.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>yynews.css" />
     <link rel="stylesheet" href="<?php echo CSS_URL; ?>comment.css" />
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
                <a href='/yynews/index.php/Admin/RBAC/categoryManager'>类别管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/newsManager'>新闻管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/commentManager'>评论管理</a>
                </li>
                 <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/linkManager'>友情链接管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/adminManager' class="selected">用户管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/roleManager'>角色管理</a>
                </li>
                <li class='tooltip'>
                <a href='/yynews/index.php/Admin/RBAC/accessManager'>权限管理</a>
                </li>
                 <span style="padding-left:50px">欢迎管理员：<?php echo session('admin_name')?></span>&nbsp
                <a href="/yynews/index.php/Admin/RBAC/exited">退出登陆</a>
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
            <div id="login_form"  >
                <form action="/yynews/index.php/Admin/RBAC/userModify" method="post">
                <input type="hidden" name="name" value="<?php echo $adminData[0]['username'] ?>">
                 <p style="margin-left:24px;margin-bottom:14px;font-size:25px;font-family:'微软雅黑'">新&nbsp用&nbsp 户&nbsp 名 :</p>
                 <input type="text" name="userName" style="width:200px;margin-left:24px;height:30px;" value="<?php echo $adminData[0]['username'] ?>"><br />
                 <p style="margin-left:24px;margin-top:6px;margin-bottom:13px;font-size:25px;font-family:'微软雅黑'">角&nbsp色 :</p>
                 <select name="role">
                        <?php
 foreach($roleData as $row){ $id=$row["id"]; $role_name=$row["role_name"]; if($adminData[0]['role_id']==$id){ echo "
                        <option value='$id' selected='selected'>$role_name</option>
                        "; }else{ echo "
                             <option value='$id'>$role_name</option>
                        "; } } ?>
                 </select>
                 <input type="submit" value="修改" style="font-size:17px;width:74px;height:27px;margin-left:77px;font-family:'微软雅黑'" />&nbsp &nbsp 
             </form>
         </div>
     </div>
     <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
     <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>