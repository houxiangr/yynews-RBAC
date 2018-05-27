<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="/yynews/Public/css/Initial.css" />
    <link rel="stylesheet" href="/yynews/Public/css/yynews.css" />
    <script language="javascript">
    //     function reginster(){
    //         location.href = "register.php";
    //         alert("lalasl");
    //     }

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

    <div id="main">
        <div id="login_form"  >
            <form action="adminLogin.php" method="post">
           <p style="margin-left:24px;margin-bottom:14px;font-size:25px;font-family:'微软雅黑'">用&nbsp 户&nbsp 名 :</p>
            <input type="text" name="name" style="width:200px;margin-left:24px;height:30px;"/><br />
             <p style="margin-left:24px;margin-top:6px;margin-bottom:13px;font-size:25px;font-family:'微软雅黑'">密&nbsp码 :</p>
            <input type="password" name="password" style="width:200px;margin-left:24px;height:30px;"/><br /><br />


            <input type="submit" value="登录" style="font-size:17px;width:74px;height:27px;margin-left:77px;font-family:'微软雅黑'" />&nbsp &nbsp 
           <a href="register.php" style="font-size:20px;margin-left:50px;font-family:'微软雅黑'">注册</a>
        </form>
        </div>
    </div>
    <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
<div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="#"> 长沙理工大学计算机与通信工程学院</a>
         </div>
</body>
</html>