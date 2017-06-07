<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller {
    public function index(){
        $this->display();
	}
	
	public function welcome(){
        $this->display();
	}
}