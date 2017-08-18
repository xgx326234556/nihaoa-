<?php

class orderController extends Controller
{
 public function form(){
     $this->display('add');
 }
    public function add(){
        $add=$_POST;
        $order=new orderModel();
        $order->add($add);
        $this->redirect('index.php?p=Home&c=order&a=index','预约提交成功了哦',1);

    }
    public function index(){
        $page=isset($_GET['page'])?$_GET['page']:1;
        $order=new orderModel();
        $row=$order->select($page);
        $this->assign('key',$row['row']);
        $this->assign('total',$row['totel']);
        $this->assign('page',$row['page']);
        $this->display('index');

    }
     public function delete(){
       $id=$_GET['id'];
         $order=new orderModel();
         $order->delete($id);
         $this->redirect('index.php?p=Home&c=order&a=index','取消成功了哦',1);
     }
    public function edit(){
        //$id=$_GET['id'];
       // $order=new orderModel();
       // $row=$order->edit($id);
        //$this->assign('key',$row);
        $this->display('edit');
    }
    public function update(){
        $update=$_POST;
        $order=new orderModel();
        $order->update($update);
        $this->redirect('index.php?p=Home&c=order&a=index','修改成功了哦',1);
    }
    public function status(){
        $status=$_POST;
        $order=new orderModel();
        $order->eidt($status);
        $this->redirect('index.php?p=Admin&c=order&a=index','回复成功了哦',1);
    }

}