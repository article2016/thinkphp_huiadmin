<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
    public function member_list(){
        $this->display();
	}
	
	public function welcome(){
        $this->display();
	}
}