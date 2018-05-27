<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>Initial.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>yynews.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>comment.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>newslist.css" />
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-3.0.0.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>comment.js"></script>
    </head>
    <body>
        <!--－－－－－－－－－－－－头部－－－－－－－－－－－－－－－－－－－－－-->
        <div id="header">
            <img src="<?php echo IMG_URL; ?>banner5.jpg">
        </div>
        <!--－－－－－－－－－－－－导航条和搜索－－－－－－－－－－－－－－－－－－－－－-->
        <div id="nav_search">
            <ul id="nav">
            <li class='tooltip'><a href="/yynews/index.php/Home/Index/index">首页</a></li>
                <?php
 foreach($categories as $row){ $Name=$row['catname']; $Id=$row['catid']; if($Id==$_GET["catId"]){ echo "<li class='tooltip'><a href='\yynews\index.php\Home\News\\newslist?catId=$Id' class='selected'>$Name</a></li>"; }else{ echo "<li class='tooltip'><a href='\yynews\index.php\Home\News\\newslist?catId=$Id'>$Name</a></li>"; } } ?>
            </ul>
            <div id="search_div">
                <form action="/yynews/index.php/Home/News/newssearch" method="post" style="text-align:center;">
                        <input type="text" name="searchContent" id="search_content" class="comment_text" />
                        <div id="search_submit">搜索</div>
                    <input type="submit" class="hidden" id="search_submit_input"/>
                </form>
            </div>
        </div>
        <!--－－－－－－－－－－－－main－－－－－－－－－－－－－－－－－－－－－-->
    <div id="main">
    <div class="newsone">
                <ul class="news-content">
                <?php
 foreach($tempnews1 as $row){ $news_title=$row['title']; $news_id=$row['newsid']; $news_img_url=$row['pic']; $time=explode('-',date('Y-m-d H:i:s',$row['createtime'])); $year=substr($time[0],2,3); echo "
                <li>
                <img src='$news_img_url' style='height:100%;'>
                        <a href='/yynews/index.php/Home/News/shownews/newsId/$news_id' target='_blank' title='查看详情' class='chakan'>查看详情</a>
                        <h4>
                            <b>$year</b>
                            <span>$time[1]-$time[2]</span>
                        </h4>
                        <p>
                            <b><a href='/yynews/index.php/Home/News/shownews/newsId/$news_id' target='_blank' >$news_title</a></b>
                            <span>$simple_content</span>
                        </p>
                    </li>
                "; } ?>
                </ul>
            </div>
    </div>
    <!--－－－－－－－－－－－－footer－－－－－－－－－－－－－－－－－－－－－-->
        <div id="friend_link">
    <span>友情链接：</span>
        <?php
 foreach($linkData as $row){ $name=$row["link_name"]; $link=$row["link_url"]; echo"
        <a href='$link'>$name</a>
        "; } ?>
    </div>
    <div id="footer">
        <font color=#909090 size="3px"/>版权所有  |<a href="http://www.csust.edu.cn/pub/cslg/jgsz/yxsz/jsjytxgcxy/"> 长沙理工大学计算机与通信工程学院</a>
    </div>
</body>
</html>