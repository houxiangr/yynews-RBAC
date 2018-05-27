<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>Initial.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>yynews.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>comment.css">
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>shownews.css" />
    <script type="text/javascript" src="<?php echo JS_URL; ?>comment.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-3.0.0.js"></script>
    </head>
    <body>
        <!--－－－－－－－－－－－－头部－－－－－－－－－－－－－－－－－－－－－-->
        <div id="header">
            <img src="<?php echo IMG_URL; ?>banner5.jpg">
        </div>
        <!--－－－－－－－－－－－－导航条和搜索－－－－－－－－－－－－－－－－－－－－－-->
        <div id="nav_search">
            <ul id="nav">
            <li class='tooltip'><a href="javascript:void(0)">首页</a></li>
                <?php
 foreach($categories as $row){ $Name=$row['catname']; $Id=$row['catid']; echo "<li class='tooltip'><a href='\yynews\index.php\Home\News\\newslist?catId=$Id'>$Name</a></li>"; } ?>
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
            <div class="news_body">
                    <span class="news_title"><?php echo $tempnews1[0]["title"];?></span>
                    <div class="newssource">
                        <span class="time">
                            发布日期： <?php echo date('Y-m-d H:i:s',$tempnews1[0]["createtime"]); ?>
                        </span>
                    </div>
                    <div class="mainnews">
                        <img src="<?php echo $tempnews1[0]['pic']; ?>" class="news_img">
                        <p><?php echo $tempnews1[0]["content"]; ?></p>
                    </div>
                    <!-- <div class="preandnext">
                        <span>
                            上一篇：
                            <a href="<?php $news_id=$before[0]['newsid']; if(count($before)==1) echo '/yynews/index.php/Home/News/essaydetail/id/'.$news_id; else echo 'javascript:void(0)'; ?>"><?php if(count($before)==1) echo $before[0]['newstitle']; else echo '上一篇已经没有上一篇了'; ?></a>
                        </span> 
                        <span>
                            下一篇：
                            <a href="<?php $news_id=$after[0]['newsid']; if(count($after)==1) echo '/yynews/index.php/Home/News/essaydetail/id/'.$news_id; else echo 'javascript:void(0)'; ?>"><?php if(count($after)==1) echo $after[0]['newstitle']; else echo '下一篇已经没有下一篇了'; ?></a>
                        </span>
                    </div> -->
                </div>
                <div id="nc_commentSet">
                <span>发表对此篇文章的评论：</span>
                    <form action="/yynews/index.php/Home/News/shownews?newsId=3" method="post">
                        <textarea name="commentSet" id="commentSet" cols="90" rows="4"></textarea>
                        <input type="submit" value="提交评论" />
                    </form>
                </div>
                <div id="comment_get">
                    <span>已有评论：</span>
                    <?php
 foreach($tempcomments1 as $row){ $con=$row['content']; echo "
                    <div class='comment_content'>
                    $con
                    </div>
                    "; } ?>
                </div>
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