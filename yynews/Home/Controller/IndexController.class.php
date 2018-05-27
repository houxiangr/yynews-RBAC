<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		//显示类别
		$category=new \Model\CategoriesModel();
		$categories=$category->select();
		$this->assign("categories",$categories);
		$news=new \Model\NewsModel();
		//显示最新七条
		$newest_news=$news->query("select newsId,title,pic from news order by createTime desc limit 6");
		//显示最热七条
		$hotest_news=$news->query("select newsId,title from news order by hot desc limit 7");
		$this->assign("newest_news",$newest_news);
		$this->assign("hotest_news",$hotest_news);
		$cate_news=array();
		for($i=0;$i<count($categories);$i++){
			$cate_news[$i]=$news->query("select newsId,title from news where catId=".$categories[$i]["catid"]);
		}
		$this->assign("cate_news",$cate_news);
		//显示友情链接
		$link=new \Model\Friend_linkModel();
		$linkData=$link->select();
		$this->assign("linkData",$linkData);
		$this->display();
	}
}