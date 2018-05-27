<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

class ManagerController extends Controller{
	//登陆功能
	public function login(){
		//显示类别
		$category=new \Model\CategoriesModel();
		$categories=$category->select();
		$this->assign("categories",$categories);
		if(!empty($_POST)){
			$name=$_POST["name"];
			$password=sha1(md5($_POST["password"]));
			$verify=$_POST["verify"];
			//检查表单提交的状态
			if(empty($name)) $this->redirect("Manager/login",array(),1,"用户名不能为空");
			if(empty($password)) $this->redirect("Manager/login",array(),1,"密码不能为空");
			if(empty($verify)) $this->redirect("Manager/login",array(),1,"验证码不能为空");
			//检查验证码的正确性
			$ver=new Verify();
			if(!$ver->check($verify)){
				$this->redirect("Manager/login",array(),1,"验证码错误");
			}
			//验证账号和密码的正确性
			$Admin=new \Model\AdminModel();
			$tempAdmin=$Admin->query("select * from admin where userName='$name' and userPwd='$password'");
			if(!empty($tempAdmin)){
				session('admin_name',$name);
				$this->redirect("Power/newsManager");
			}else{
				$this->redirect("Manager/login",array(),1,"用户名或密码有错");
			}
		}else{
			$this->display();
		}
	}
	//注册
	public function register(){
		//显示类别
		$category=new \Model\CategoriesModel();
		$categories=$category->select();
		$this->assign("categories",$categories);
		if(!empty($_POST)){
			$uname=$_POST["uname"];
			$upassword1=$_POST["upassword1"];
			$upassword2=$_POST["upassword2"];
			if(empty($uname)) $this->redirect("Manager/register",array(),1,"用户名不能为空");
			if(empty($upassword1)) $this->redirect("Manager/register",array(),1,"密码不能为空");
			if($upassword1!=$upassword2) $this->redirect("Manager/register",array(),1,"两次密码不相同");
			$admin=new \Model\AdminModel();
			$flag=$admin->query("select * from admin where userName='$uname'");
			if(!empty($flag)){
				$this->redirect("Manager/register",array(),1,"用户名已被占用");
			}
			$upassword1=sha1(md5($upassword1));
			$flag=$admin->execute("insert into admin(userName,userPwd)values('$uname','$upassword1')");
			if($flag) $this->redirect("Manager/login",array(),1,"注册成功，请登陆");
			else $this->redirect("Manager/register",array(),1,"注册失败，请重试");
		}else{
			$this->display();
		}
	}
	//验证码
	public function verifyImg(){
		$cfg=array(
		'imageH'    =>  45,               // 验证码图片高度
        'imageW'    =>  120,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'fontSize'  =>  15,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        );
		$very=new Verify($cfg);
		$very->entry();
	}
	public function test(){
		$admin=new \Model\AdminModel();
		$admin_data=$admin->query("select * from admin");
		var_dump($admin_data);
	}
}
?>