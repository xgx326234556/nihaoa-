<?php

class codesController extends Controller
{
 public function form(){
     $this->display('codes_add');
 }
    public function add(){
        $codes=$_POST;
        $codesModel=new codesModel();
        $codesModel->add($codes);
        $this->redirect('index.php?p=Admin&c=codes&a=index','添加成功了哦',1);
    }
    public function index(){
        $page=isset($_GET['page'])?$_GET['page']:1;
       $codes=new codesModel();
        $row=$codes->select($page);
        $this->assign('key',$row['row']);
        $this->assign('total',$row['total']);
        $this->assign('page',$row['page']);
        $this->display('codes_index');
    }
    public function delete(){
        $id=$_GET['id'];
        $codes=new codesModel();
        $codes->delete($id);
        $this->redirect('index.php?p=Admin&c=codes&a=index','删除成功了哦',1);

    }
    public function edit(){
        $id=$_GET['id'];
        $codes=new codesModel();
        $row=$codes->enid($id);
        $this->assign('key',$row);
        $this->display('codes_edit');
    }
    public function update(){
        $update=$_POST;
        $codes=new codesModel();
        $codes->update($update);
        $this->redirect('index.php?p=Admin&c=codes&a=index','修改成功了哦',1);
    }
}