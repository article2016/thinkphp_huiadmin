<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
        $this->display();
	}
	
	public function welcome(){
        $this->display();
	}
}