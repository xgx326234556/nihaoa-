<?php

class duifanController extends Controller
{
  public function form(){
      $this->display('duifan');
  }
    public function add(){
        $add=$_POST;
        $duifan=new duifanModel();
        $duifan->add($add);
        $this->redirect('index.php?p=Home&c=duifan&a=index','添加成功了哦',1);
    }
    public function index(){
        $page=isset($_GET['page'])?$_GET['page']:1;
        $select=new duifanModel();
        $row=$select->select($page);
        $this->assign('key',$row['row']);
        $this->assign('total',$row['totel']);
        $this->assign('page',$row['page']);
        $this->display('index');
    }
    public function edit(){
        $this->display('edit');
    }
    public function update(){
        $update=$_POST;
        $duifan=new duifanModel();
        $duifan->update($update);
        $this->redirect('index.php?p=Home&c=duifan&a=index','评价成功了哦',1);
    }
    public function liuyan(){
        $this->display('liuyan');
    }
    public function gg(){
        $gg=$_POST;
        $duifan=new duifanModel();
        $duifan->gg($gg);
        $this->redirect('index.php?p=Home&c=duifan&a=index','留言成功了哦',1);
    }
    public function delete(){
        $id=$_GET['id'];
        $duifan=new duifanModel();
        $duifan->delete($id);
        $this->redirect('index.php?p=Home&c=duifan&a=index','取消预约成功了哦',1);
    }
}