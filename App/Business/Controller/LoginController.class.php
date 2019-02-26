<?php
namespace Business\Controller;
use Think\Controller;

class LoginController extends PublicController{
	//********************
	//
	//********************
	public function index(){
		if(IS_POST){
			$username=$_POST['name'];
			$admininfo=M('businessuser')->where("name='$username' AND del<1")->find();
			//查询app表看使用该系统的客户时间
			$appcheck=M('program')->find();
			if($admininfo){
				if(MD5(MD5($_POST['password']))==$admininfo['password']){
					$admin=array(
					   "id"         =>$admininfo["id"],
					   "name"       =>$admininfo["name"],

 					);
 					$system=array(
 						"name"       =>$appcheck['name'],//系统购买者
 						"sysname"    =>$appcheck['title'],//系统名称
					    "photo"      =>$appcheck['logo']//中心认证图片
 				    );
 						unset($_SESSION['businessinfo']);
						unset($_SESSION['system']);
						$_SESSION['businessinfo']=$admin;
						$_SESSION['system']=$system;
					    echo "<script>alert('登录成功');location.href='".U('Index/index')."'</script>";				
				}else{
					$this->error('账号密码错误');
				}
			}else{
				$this->error('账号不存在或已注销');
			}
		}else{
			$sysname= M('program')->find();
			$this->assign('sysname',$sysname['title']);
			$this->display();
		}
	}
	public function logout(){
		unset($_SESSION['businessinfo']);
		unset($_SESSION['system']);
		echo "<script>alert('注销成功');location.href='".U('Login/index')."'</script>";
		exit;
	}	
}