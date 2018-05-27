<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>wellcome to yynews</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>Initial.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>yynews.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>comment.css" />
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>banner.css" />
    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-3.0.0.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL; ?>index.js"></script>
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
            <li class='tooltip'><a href="javascript:void(0)" class="selected">首页</a></li>
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
            <div id="content">
                <div id="banner">
                  <div class="pic pic_active" id="pic_1">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[0][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[0][pic]; ?>" alt="" /> <span><?php echo $newest_news[0][title]; ?></span></a>
                  </div>

                  <div class="pic" id="pic_2">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[1][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[1][pic]; ?>" alt="" /> <span><?php echo $newest_news[1][title]; ?></span></a>
                  </div>

                  <div class="pic" id="pic_3">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[2][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[2][pic]; ?>" alt="" /> <span><?php echo $newest_news[2][title]; ?></span></a>
                  </div>

                  <div class="pic" id="pic_4">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[3][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[3][pic]; ?>" alt="" /> <span><?php echo $newest_news[3][title]; ?></span></a>
                  </div>

                  <div class="pic" id="pic_5">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[4][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[4][pic]; ?>" alt="" /> <span><?php echo $newest_news[4][title]; ?></span></a>
                  </div>

                  <div class="pic" id="pic_6">
                    <a href="/yynews/index.php/Home/News/shownews?newsId=<?php echo $newest_news[5][newsid]; ?>" target="blank"><img src="<?php echo $newest_news[5][pic]; ?>" alt="" /> <span><?php echo $newest_news[5][title]; ?></span></a>
                  </div>

                  <div id="contral_box">
                    <a href="javascript:void(0)" onclick="switchpic(1)" class="contral contral_active" id="contral_1" name="contral_1"></a>
                    <a href="javascript:void(0)" onclick="switchpic(2)" class="contral" id="contral_2" name="contral_2"></a>
                    <a href="javascript:void(0)" onclick="switchpic(3)" class="contral" id="contral_3" name="contral_3"></a>
                    <a href="javascript:void(0)" onclick="switchpic(4)" class="contral" id="contral_4" name="contral_4"></a>
                    <a href="javascript:void(0)" onclick="switchpic(5)" class="contral" id="contral_5" name="contral_5"></a>
                    <a href="javascript:void(0)" onclick="switchpic(6)" class="contral" id="contral_6" name="contral_6"></a>
                  </div>
                </div>
                <div id="hot">
                    <span id="hot_title">热点新闻</span>
                    <ul>
                        <?php
 foreach($hotest_news as $row){ $title=$row["title"]; $id=$row["newsid"]; echo "<li><a href='/yynews/index.php/Home/News/shownews?newsId=$id'>$title</a></li>"; } ?>
                    </ul>
                </div>
                <div id="all_part">
                    <?php
 for($i=0;$i<count($categories);$i++){ $cate_name=$categories[$i]['catname']; $cate_id=$categories[$i]['catid']; echo "
                    <div class='cate_part'>
                            <span class='cate_name'>$cate_name</span>
                            <a href='\yynews\index.php\Home\News\\newslist?catId=$cate_id'>more>></a>
                            <ul>
                    "; foreach($cate_news[$i] as $row){ echo "
                    <li><a href='/yynews/index.php/Home/News/shownews?newsId=$row[newsid]'>$row[title]</a></li>
                    "; } echo"
                    </ul>
                        </div>
                    "; } ?>
                        <!-- <div class="cate_part">
                            <span class="cate_name">类别一</span>
                            <a href="#">更多>></a>
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">1</a></li>
                            </ul>
                        </div> -->
                    <div class="clear"></div>
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