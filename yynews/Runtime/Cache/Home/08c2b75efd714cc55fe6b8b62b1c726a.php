<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="/yynews/Public/css/Initial.css" />
    <link rel="stylesheet" href="/yynews/Public/css/yynews.css" />
    <script type="text/javascript">
        function Foucus(obj){
            //alert('注册成功!');
            document.getElementById(obj).value = "";
        }
    </script>
</head>
<body>
<!--－－－－－－－－－－－－头部－－－－－－－－－－－－－－－－－－－－－-->
      <div id="header">
       
</div>
<div id="search">
        <a href="adminLogin.php"> 后台管理中心</a>
    <form action="searchResult.php" method="post" style="align=center;">
        <input type="submit" value="搜索新闻" />
  
        <input type="text" name="searchContent" id="name" value="" onfocus="Foucus('name')" />
            <p>按内容</p>
        <input type="radio" name="select" value="1" />
            <p>按标题</p>
        <input type="radio" name="select" value="2" />
    </form>
    </div>
<!--－－－－－－－－－－－－main－－－－－－－－－－－－－－－－－－－－－-->
    <div id="main">
        
        <div id="register_form">
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td>新&nbsp用&nbsp户&nbsp名:</td>
                        <td> <input type="text" name="uname"  style="height:23px;width:160px"/></td>
                    </tr>
                    <tr>
                        <td>输&nbsp入&nbsp密&nbsp码:&nbsp</td>
                        <td><input type="password" name="upassword" style="height:23px;width:160px"/></td>
                    </tr>
                    <tr>
                        <td>再次输入密码:&nbsp</td>
                        <td><input type="password" name="upassword2"  style="height:23px;width:160px"/></td>
                    </tr>
                </table>
                <input type="submit" name="register" value="完成注册"  style="margin-top:18px;width:81px;height:32px;margin-left:120px;font-size:17px;font-family:'微软雅黑'"/>
            </form>
        </div>
        
    </div>
    <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
<div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="#"> 长沙理工大学计算机与通信工程学院</a>
         </div>
</body>
</html>