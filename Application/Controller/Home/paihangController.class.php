<?php

class paihangController extends Controller
{
public function index(){
    $paihang=new paihangModel();
    $row=$paihang->select();
    $this->assign('keys',$row);
    $rows=$paihang->chaxun();
    $this->assign('ro',$rows);
    $result=$paihang->huwu();
    $this->assign('huwu',$result);
    $this->display('paihang');





}
}