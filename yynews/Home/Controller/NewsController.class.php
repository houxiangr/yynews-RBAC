<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller{
	//新闻显示功能
	public function shownews(){
		if(!empty($_GET)){
			$category=new \Model\CategoriesModel();
			$categories=$category->select();
			$this->assign("categories",$categories);
			$newsId=$_GET["newsId"];
			//显示新闻内容
			$news=new \Model\NewsModel();
			//将此新闻的访问量加一
			$news->execute("update news set hot=hot+1 where newsId=".$newsId);
			$tempnews1=$news->query("select title,content,pic,createTime from news where newsId=$newsId");
			//var_dump($tempnews1);
			$this->assign("tempnews1",$tempnews1);
			//显示新闻评论和增加评论的逻辑
			$comments=new \Model\CommentsModel();
			if(!empty($_POST)){
				$ip=$_SERVER["REMOTE_ADDR"];
				$content=$_POST['commentSet'];
				$createTime=time();
				$comments->execute("insert into comments (content,createTime,newsId,userIP)values('$content',$createTime,$newsId,'$ip')");				
				$this->redirect('shownews',array("newsId"=>$newsId),1,"评论成功");
			}
			$tempcomments1=$comments->query("select content from comments where newsId=$newsId");
			//var_dump($tempcomments1);
			$this->assign("newsId",$newsId);
			$this->assign("tempcomments1",$tempcomments1);
			//显示友情链接
			$link=new \Model\Friend_linkModel();
			$linkData=$link->select();
			$this->assign("linkData",$linkData);
			$this->display();
		}else{
			$this->redirect('Index/index');
		}
	} 
	//显示新闻分类
	public function newslist(){
		if(!empty($_GET)){
			$catId=$_GET["catId"];
			//显示类别
			$category=new \Model\CategoriesModel();
			$categories=$category->select();
			//var_dump($categories);
			$this->assign("categories",$categories);
			//显示新闻
			$news=new \Model\NewsModel();
			$tempnews1=$news->query("select newsId,title,createTime,pic from news,categories where news.catId=categories.catId and news.catId=$catId order by createTime");
			$this->assign("tempnews1",$tempnews1);
			//显示友情链接
			$link=new \Model\Friend_linkModel();
			$linkData=$link->select();
			$this->assign("linkData",$linkData);
			$this->display();
		}else{
			$this->redirect('Index/index');
		}
	}
	//返回新闻搜索结果
	public function newssearch(){
		if(!empty($_POST)){
			//显示类别
			$category=new \Model\CategoriesModel();
			$categories=$category->select();
			//var_dump($categories);
			$this->assign("categories",$categories);
			$select=$_POST["select"];
			$searchContent=$_POST["searchContent"];
			$news=new \Model\NewsModel();
			$newsData=$news->query("select newsId,title,pic,createTime,length(replace(title,'$searchContent',''))+length(replace(content,'$searchContent','')) as length,length(title)+length(content) as wholelength from news where title like '%$searchContent%' or content like '%$searchContent%' order by length/wholelength asc");
			$this->assign("newsData",$newsData);
			//显示友情链接
			$link=new \Model\Friend_linkModel();
			$linkData=$link->select();
			$this->assign("linkData",$linkData);
			$this->display();
		}else{//没有post数据
			$this->redirect("Index/index");
		}
	}
}
?>