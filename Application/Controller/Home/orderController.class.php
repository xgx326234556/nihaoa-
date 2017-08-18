<?php

class orderController extends Controller
{
 public function form(){
     $order=new orderModel();
     $row=$order->gg();
     $this->assign('key',$row['row']);
     $this->assign('row',$row['rows']);
     $this->display('add');
 }
    public function index(){
        $page=isset($_GET['page'])?$_GET['page']:1;
        $order=new orderModel();
        $row=$order->select($page);
        $this->assign('key',$row['row']);
        $this->assign('key',$row['row']);
        $this->assign('total',$row['totel']);
        $this->assign('page',$row['page']);
        $this->display('index');
    }
    public function home_edit(){
        $id=$_GET['id'];
        $order=new orderModel();
        $row=$order->home_edit($id);
        $this->assign('key',$row['row']);
        $this->assign('rows',$row['rows']);
        $this->assign('rowss',$row['rowss']);
        $this->display('edit');
    }

}