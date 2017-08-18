<?php

class goodsController extends Controller
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
    public function from (){
        $goods=new goodsModel();
        $row=$goods->from();
        $this->assign('key',$row['row']);
        $this->assign('rows',$row['rows']);
        $this->display('add');
    }
    public function add(){
        $add=$_POST;
        $goods=new goodsModel();
        $goods->add($add);
        $this->redirect('index.php?p=Admin&c=goods&a=goods','发货成功了哦',1);
    }
    public function goods(){
        $page=isset($_GET['page'])?$_GET['page']:1;
        $goods=new goodsModel();
        $row=$goods->select($page);
        $this->assign('key',$row['row']);
        $this->assign('total',$row['totel']);
        $this->assign('page',$row['page']);
        $this->display('goods');
    }
}