<?php


class huodongController extends Controller
{
public function index(){
    $huodong=new huodongModel();
    $row=$huodong->index();
    $this->assign('key',$row);
    $this->display('huodong');
}
}