<?php
class goodsController extends Controller
{
public function goods(){
    $page=isset($_GET['page'])?$_GET['page']:1;
    $goods=new goodsModel();
    $row=$goods->select($page);
    $this->assign('key',$row['row']);
    $this->assign('total',$row['totel']);
    $this->assign('page',$row['page']);
    $this->display('goods');
}
    public function form(){
     $this->display('add');
    }
    public function update(){
        $update=$_POST;
        $goods=new goodsModel();
        $goods->update($update);
        $this->redirect('index.php?p=Home&c=goods&a=goods','回复成功了哦',1);
    }
}