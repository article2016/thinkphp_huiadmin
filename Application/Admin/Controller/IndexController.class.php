<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       if(session('username')){
			$this->redirect('home');	
		}else{
			$this->redirect('login');
		}
	}
	
		public function login_act(){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = M("admin");
		
		$userinfo = $user->where("username ='$username'")->find();
		if(!empty($userinfo)){
			if($userinfo['password'] == $password){
				session('username', $userinfo['username']);          // 当前用户id
				cookie('username',$username,60);
				//cookie('userid',$userid,60);
				//cookie('lastlogintime',$lastlogintime,60);
				$this->success('登录成功,正跳转至系统首页...', U('home'));
				//$this->redirect('Home/index');	
			}else{
				//$this->redirect('index');	
				$this->error('登录失败,用户名或密码不正确!');
			}
		}else{
			$this->redirect('index');	
		}
	}
	
	public function welocme(){
       $this->display();
	}
}