<?php
namespace Admin\Controller;
use Think\Controller;
class RBACController extends Controller{
	//管理员管理
	public function adminManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$status=$admin->query("select is_admin from admin where userName='".session('admin_name')."'");
		if($status[0]["is_admin"]!=1){
			$this->redirect("error",array("model"=>"adminManager"));
		}
		$admin=new \Model\AdminModel();
		$role=new \Model\RoleModel();
		if(!empty($_GET)){
			$name=$_GET["adminName"];
			$admin->execute("delete from admin where userName='$name'");
			$this->redirect("adminManager",array(),1,"删除成功");
		}else{
			$adminData=$admin->query("select userName,admin.create_time,admin.updata_time,role_name from admin,role where admin.role_id=role.id and is_admin=0");
			$roleData=$role->query("select id,role_name from role where status=1");
			$this->assign("adminData",$adminData);
			$this->assign("roleData",$roleData);
			$this->display();
		}
	}
	//用户修改
	public function userModify(){
		$admin=new \Model\AdminModel();
		$role=new \Model\RoleModel();
		if(!empty($_POST)){
			$name=$_POST["name"];
			$new_name=$_POST["userName"];
			$new_role=$_POST["role"];
			if($new_name==""){
				$this->redirect("userModify",array("adminName"=>$name),1,"输入不能为空");
			}
			$admin->execute("update admin set userName='$new_name',role_id=$new_role where userName='$name'");
			$this->redirect("adminManager",array(),1,"修改成功");
		}else{
			$name=$_GET["adminName"];
			$adminData=$admin->query("select userName,role_id from admin where userName='$name'");
			$roleData=$role->query("select id,role_name from role where status=1");
			$this->assign("adminData",$adminData);
			$this->assign("roleData",$roleData);
			$this->display();
		}
	}
	//角色管理
	public function roleManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$status=$admin->query("select is_admin from admin where userName='".session('admin_name')."'");
		if($status[0]["is_admin"]!=1){
			$this->redirect("error",array("model"=>"roleManager"));
		}
		$role=new \Model\RoleModel();
		$access=new \Model\AccessModel();
		$role_access=new \Model\Role_accessModel();
		if(!empty($_POST)){
			$role_name=$_POST["role_name"];
			if($role_name==""){
				$this->redirect("roleManager",array(),1,"输入不能为空");
			}
			$role->execute("insert into role (role_name)values('$role_name')");
			$role_id=$role->query("select id from role where role_name='$role_name'");
			$newrole_id=$role_id[0]["id"];
			for($i=1;$i<count($_POST);$i++){
				if(!empty($_POST[$i])){
					$access_id=$_POST[$i];
					$role_access->execute("insert into role_access (access_id,role_id)values($access_id,$newrole_id)");
				}
			}
			$this->redirect("roleManager",array(),1,"添加成功");
		}else if(!empty($_GET)){
			$id=$_GET["roleId"];
			$role->execute("delete from role where id=$id");
			$role_access->execute("delete from role_access where role_id=$id");
			$this->redirect("roleManager",array(),1,"删除成功");
		}else{
			$roleData=$role->query("select * from role");
			$this->assign("roleData",$roleData);
			$accessData=$access->query("select access_name,id from access where status=1");
			$this->assign("accessData",$accessData);
			$this->display();
		}
	}
	//对角色的修改
	public function RoleModify(){
		$role=new \Model\RoleModel();
		$access=new \Model\AccessModel();
		$role_access=new \Model\Role_accessModel();
		if(!empty($_POST)){
			//var_dump($_POST);
			$id=$_POST["role_id"];
			$name=$_POST["roleName"];
			if($name==""){
				$this->redirect("roleManager",array("roleId"=>$id),1,"输入不能为空");
			}
			if($_POST["role_status"]==1){
				$status=1;
			}else{
				$status=0;
			}
			$role->execute("update role set role_name='$name',status=$status where id=$id");
			$role_access->execute("delete from role_access where role_id=$id");
			for($i=1;$i<count($_POST)-2;$i++){
				if(!empty($_POST[$i])){
					$access_id=$_POST[$i];
					$role_access->execute("insert into role_access (access_id,role_id)values($access_id,$id)");
				}
			}
			$this->redirect("roleManager",array(),1,"修改成功");
		}
		$id=$_GET["roleId"];
		$role_name=$role->query("select role_name,status from role where id=$id");
		$this->assign("role_name",$role_name);
		$accessData=$access->query("select access_name,id from access where status=1");
		$this->assign("accessData",$accessData);
		$role_access_data=$role_access->query("select access_id from role_access where role_id=$id");
		$role_access_data=array_column($role_access_data, 'access_id');
		$this->assign("role_access_data",$role_access_data);
		$this->display();
	}
	//权限管理
	public function accessManager(){
		if(empty(session('admin_name'))){
			$this->redirect("Manager/login",array(),1,"请先登陆");
		}
		$admin=new \Model\AdminModel();
		$status=$admin->query("select is_admin from admin where userName='".session('admin_name')."'");
		if($status[0]["is_admin"]!=1){
			$this->redirect("error",array("model"=>"accessManager"));
		}
		$access=new \Model\AccessModel();
		if(!empty($_POST)){//处理增加
			$accessName=$_POST["accessName"];
			$accessUrl=$_POST["accessUrl"];
			if($accessName==""||$accessUrl==""){
				$this->redirect("accessManager",array(),1,"输入不能为空");
			}
			$access->execute("insert into access(access_name,urls)values('$accessName','$accessUrl')");
			$this->redirect("accessManager",array(),1,"增加成功");
		}else if(!empty($_GET)){//处理删除
			$accessId=$_GET["accessId"];
			$access->execute("delete from access where id=$accessId");
			$this->redirect("accessManager",array(),1,"删除成功");
		}else{
			$tempaccess=$access->query("select * from access");
			$this->assign("tempaccess",$tempaccess);
			$this->display();
		}
	}
	public function accessModify(){
		header("Content-Type: application/json;charset=utf-8");
		$access=new \Model\AccessModel();
		$accessId=$_POST["accessId"];
		$accessName=$_POST["newName"];
		$accessUrl=$_POST["url"];
		$accessStatus=$_POST["status"];
		$flag=$access->execute("update access set access_name='$accessName',urls='$accessUrl',status=$accessStatus where id=$accessId");
		$newData=$access->query("select updata_time from access where id=$accessId");
		$jsonData=json_encode($newData);
		echo $jsonData;

	}
	public function error(){
		$this->display();
	}
}
?>