<?php

class duifanController extends Controller
{
public function index(){
    $page=isset($_GET['page'])?$_GET['page']:1;
    $select=new duifanModel();
    $row=$select->select($page);
    $this->assign('key',$row['row']);
    $this->assign('total',$row['totel']);
    $this->assign('page',$row['page']);
    $this->display('index');
}
    public function update(){
        $this->display('update');
    }
    public function kk(){
        $kk=$_POST;
        $duifan=new duifanModel();
        $duifan->kk($kk);
        $this->redirect('index.php?p=Admin&c=duifan&a=index','回复客服成功了哦',1);
    }
}