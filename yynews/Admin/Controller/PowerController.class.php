<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class PowerController extends Controller{
	//管理新闻类别
	public function categoryManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$admin_name=session('admin_name');
		$accessData=$admin->query("select urls from admin,role_access,access,role where admin.role_id=role_access.role_id and role_access.access_id=access.id and role.id=role_access.role_id and role.status=1 and access.status=1 and admin.username='$admin_name'");
		$is_admin=$admin->query("select is_admin from admin where userName='$admin_name'");
		$accessData=array_column($accessData,"urls");
		if(!in_array("categoryManager",$accessData)&&$is_admin[0]["is_admin"]!=1){
			$this->redirect("RBAC/error");
		}
		$category=new \Model\CategoriesModel();
		$news=new \Model\NewsModel();
		$comment=new \Model\CommentsModel();
		if(!empty($_POST)){//处理增加
			$catName=$_POST["addCategory"];
			if($catName==""){
				$this->redirect("categoryManager",array(),1,"输入不能为空");
			}
			$category->execute("insert into categories(catName)values('$catName')");
			$this->redirect("categoryManager",array(),1,"增加成功");
		}else if(!empty($_GET)){//处理删除
			$catId=$_GET["catId"];
			$category->execute("delete from categories where catId=$catId");
			$news_pic=$news->query("select pic,newsId from news where catId=$catId");
			foreach($news_pic as $row){
				$id=$row["newsid"];
				unlink(str_replace("/yynews",".",$row["pic"]));
				$comment->execute("delete from comments where newsId=$id");
			}
			$news->execute("delete from news where catId=$catId");
			$this->redirect("categoryManager",array(),1,"删除成功");
		}else{
			$tempcategory1=$category->query("select * from categories order by catId");
			$this->assign("tempcategory1",$tempcategory1);
			$this->display();
		}
	}
	//管理友情链接
	public function linkManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$admin_name=session('admin_name');
		$accessData=$admin->query("select urls from admin,role_access,access,role where admin.role_id=role_access.role_id and role_access.access_id=access.id and role.id=role_access.role_id and role.status=1 and access.status=1 and admin.username='$admin_name'");
		$is_admin=$admin->query("select is_admin from admin where userName='$admin_name'");
		$accessData=array_column($accessData,"urls");
		if(!in_array("linkManager",$accessData)&&$is_admin[0]["is_admin"]!=1){
			$this->redirect("RBAC/error");
		}
		$link=new \Model\Friend_linkModel();
		if(!empty($_POST)){//处理增加
			$linkName=$_POST["linkName"];
			$linkUrl=$_POST["linkUrl"];
			if($linkName==""||$linkUrl==""){
				$this->redirect("linkManager",array(),1,"输入不能为空");
			}
			$link->execute("insert into friend_link(link_name,link_url)values('$linkName','$linkUrl')");
			$this->redirect("linkManager",array(),1,"增加成功");
		}else if(!empty($_GET)){//处理删除
			$linkId=$_GET["linkId"];
			$link->execute("delete from Friend_link where id=$linkId");
			$this->redirect("linkManager",array(),1,"删除成功");
		}else{
			$templink=$link->query("select * from Friend_link");
			$this->assign("templink",$templink);
			$this->display();
		}
	}
	//管理评论
	public function commentManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$admin_name=session('admin_name');
		$accessData=$admin->query("select urls from admin,role_access,access,role where admin.role_id=role_access.role_id and role_access.access_id=access.id and role.id=role_access.role_id and role.status=1 and access.status=1 and admin.username='$admin_name'");
		$is_admin=$admin->query("select is_admin from admin where userName='$admin_name'");
		$accessData=array_column($accessData,"urls");
		if(!in_array("commentManager",$accessData)&&$is_admin[0]["is_admin"]!=1){
			$this->redirect("RBAC/error");
		}
		$comments=new \Model\CommentsModel();
		if(!empty($_GET)){
			$id=$_GET['commId'];
			$comments->execute("delete from comments where commId=$id");
			$this->redirect("commentManager",array(),1,"删除成功");
		}
		$tempcomments1=$comments->query("select * from comments");
		$this->assign('tempcomments1',$tempcomments1);
		$this->display();
	}
	//新闻增加
	public function newsAdd(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		if(!empty($_POST)){
			if($_FILES["newspic"]["error"]<4){
				//dump($_FILES);
				$cfg=array(
					'rootPath'      =>  './Public/Uploads/', //保存根路径
					);
				$up=new Upload($cfg);
				//执行成功后会把在服务器上的有关文件的信息返回
				$file=$up->uploadOne($_FILES["newspic"]);
				$img="/yynews/Public/Uploads/".$file['savepath'].$file['savename'];
				//echo $up->getError();
				//echo $img;
				//dump($file);
			}
			$catId=$_POST["catId"];
			$newsTitle=$_POST["newsTitle"];
			$newsContent=$_POST["newsContent"];
			if($newsTitle==""||$newsContent==""){
				$this->redirect("newsAdd",array(),1,"输入不能为空");
			}
			if(empty($_FILES)){
				$this->redirect("newsAdd",array(),1,"图片没有上传");
			}
			$createTime=time();
			$news=new \Model\NewsModel();
			$news->execute("insert into news (title,content,catId,createTime,pic)values('$newsTitle','$newsContent',$catId,$createTime,'$img')");
			$this->redirect("newsManager",array(),1,"增加成功");
		}else{
			$category=new \Model\CategoriesModel();
			$tempcategory=$category->query("select * from categories");
			$this->assign("tempcategory",$tempcategory);
			$this->display();
		}
	}
	//新闻管理
	public function newsManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$admin_name=session('admin_name');
		$accessData=$admin->query("select urls from admin,role_access,access,role where admin.role_id=role_access.role_id and role_access.access_id=access.id and role.id=role_access.role_id and role.status=1 and access.status=1 and admin.username='$admin_name'");
		$is_admin=$admin->query("select is_admin from admin where userName='$admin_name'");
		$accessData=array_column($accessData,"urls");
		if(!in_array("newsManager",$accessData)&&$is_admin[0]["is_admin"]!=1){
			$this->redirect("RBAC/error");
		}
		$news=new \Model\NewsModel();
		$tempnews1=$news->query("select newsId,title,catName from news,categories where news.catId=categories.catId");
		//var_dump($tempnews1);
		$this->assign("tempnews1",$tempnews1);
		$this->display();
	}
	//新闻修改
	public function newsModify(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		if(!empty($_GET)){
			$newsId=$_GET["newsId"];
			$news=new \Model\NewsModel();
			$category=new \Model\CategoriesModel();
			$tempnews1=$news->query("select newsId,title,news.content,catName,news.catId from news,categories where news.catId=categories.catId and newsId=$newsId");
			$tempcategory=$category->query("select * from categories");
			//var_dump($tempcategory);
			//var_dump($tempnews1);
			$this->assign("tempnews1",$tempnews1);
			$this->assign("tempcategory",$tempcategory);
			$this->display();
		}else{
			$this->redirect("newsManager");
		}
	}
	public function newsModify2(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		if(!empty($_POST)){
			//var_dump($_POST);
			$newsId=$_POST["newsId"];
			$catId=$_POST["catId"];
			$title=$_POST["newsTitle"];
			$content=$_POST["newsContent"];
			if($title==""||$content==""){
				$this->redirect("newsModify",array("newsId"=>$newsId),1,"输入不能为空");
			}
			$news=new \Model\NewsModel();
			$news->execute("update news set title='$title',content='$content',catId=$catId where newsId=$newsId");
			$this->redirect("newsManager",array(),1,"修改成功");
		}else{
			$this->redirect("newsManager");
		}
	}
	//新闻删除
	public function newsDelete(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		if(!empty($_GET)){
			$newsId=$_GET["newsId"];
			$news=new \Model\NewsModel();
			$comment=new \Model\CommentsModel();
			$pic=$news->query("select pic from news where newsId=$newsId");
			unlink(str_replace("/yynews",".",$pic[0]["pic"]));
			$news->execute("delete from news where newsId=$newsId");
			$comment->execute("delete from comments where newsId=$newsId");
			$this->redirect("newsManager",array(),1,"删除成功");
		}else{
			$this->redirect("newsManager");
		}
	}
	//退出登陆
	public function exited(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		session("admin_name",null);
		$this->redirect("Manager/login",array(),1,"退出成功");
	}
	//修改信息
	public function usernameModify(){
		if(!empty($_POST)){
			$name=session("admin_name");
			$newname=$_POST["name"];
			$password=sha1(md5($_POST["password"]));
			if($name==""||$password==""){
				$this->redirect("usernameModify",array(),1,"输入不能为空");
			}
			$admin=new \Model\AdminModel();
			$adminData=$admin->query("select count(*) as count from admin where userName='$name' and userPwd='$password'");
			if($adminData[0]["count"]!=1){
				$this->redirect("usernameModify",array(),1,"用户名或密码错误");
			}
			$flag=$admin->execute("update admin set userName='$newname' where userName='$name'");
			if($flag){
				session("admin_name",$newname);
				$this->redirect("newsManager",array(),1,"修改成功");
			}else{
				$this->redirect("newsManager",array(),1,"修改失败");
			}
		}else{
			$this->display();
		}
	}
	public function userpasswordModify(){
		if(!empty($_POST)){
			$name=session("admin_name");
			if($_POST["password1"]==""||$_POST["password2"]==""||$_POST["password3"]==""){
				$this->redirect("userpasswordModify",array(),1,"输入不能为空");
			}
			if($_POST["password2"]!=$_POST["password3"]){
				$this->redirect("userpasswordModify",array(),1,"两次输入的新密码不同");
			}
			$password1=sha1(md5($_POST["password1"]));
			$password2=sha1(md5($_POST["password2"]));
			$password3=sha1(md5($_POST["password3"]));
			$admin=new \Model\AdminModel();
			$adminData=$admin->query("select count(*) as count from admin where userName='$name' and userPwd='$password1'");
			if($adminData[0]["count"]!=1){
				$this->redirect("userpasswordModify",array(),1,"密码错误");
			}
			$flag=$admin->execute("update admin set userPwd='$password2' where userName='$name'");
			if($flag){
				$this->redirect("newsManager",array(),1,"修改成功");
			}else{
				$this->redirect("newsManager",array(),1,"修改失败");
			}
		}else{
			$this->display();
		}
	}
}
?>