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
            <li class='tooltip'><a href="javascript:void(0)" class="selected">首页</a></li>
                <?php
 foreach($categories as $row){ $Name=$row['catname']; $Id=$row['catid']; echo "<li class='tooltip'><a href='\yynews\index.php\Home\News\\newslist?catId=$Id'>$Name</a></li>"; } ?>
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
                <form action="/yynews/index.php/Admin/Manager/login" method="post">
                 <p style="margin-left:24px;margin-bottom:14px;font-size:25px;font-family:'微软雅黑'">用&nbsp 户&nbsp 名 :</p>
                 <input type="text" name="name" style="width:200px;margin-left:24px;height:30px;"><br />
                 <p style="margin-left:24px;margin-top:6px;margin-bottom:13px;font-size:25px;font-family:'微软雅黑'">密&nbsp码 :</p>
                 <input type="password" name="password" style="width:200px;margin-left:24px;height:30px;"><br />
                 <p style="margin-left:24px;margin-bottom:14px;font-size:25px;font-family:'微软雅黑';">验&nbsp证 &nbsp码  :</p>
                 <input type="text" name="verify" style="width:200px;margin-left:24px;height:30px;">
                 <img src="/yynews/index.php/Admin/Manager/verifyImg" alt="" style="display:inline;" onclick="this.src='/yynews/index.php/Admin/Manager/verifyImg/'+Math.random()">
                 <input type="submit" value="登录" style="font-size:17px;width:74px;height:27px;margin-left:77px;font-family:'微软雅黑'" />&nbsp &nbsp 
                 <a href="/yynews/index.php/Admin/Manager/register" style="font-size:20px;margin-left:50px;font-family:'微软雅黑'">注册</a>
             </form>
         </div>
     </div>
     <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
     <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>