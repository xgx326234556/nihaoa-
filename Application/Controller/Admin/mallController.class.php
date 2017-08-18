<?php
class mallController extends Controller
{
public function index(){
    $mall=new mallModel();
    $row= $mall->select();
    $this->assign('key',$row['row']);
    $this->assign('keys',$row['rows']);
    $this->assign('keyss',$row['rowss']);
    $this->assign('keysss',$row['rowsss']);
    $this->assign('keyssss',$row['rowsss']);
    $this->display('mall');
}
    public function form(){
        $this->display('add');
    }
    public function add(){
        $row=$_POST;
        $photo=$_FILES['tupian'];
        $path=UPLOADS_PATH . uniqid("to_") . strrchr($photo['name'], '.');
        move_uploaded_file($photo['tmp_name'], $path);
        $mall=new mallModel();
        $image=new imageModel();
        $path=$image->thumb($path,300,100);
        $mall->add($row,$path);
        $this->redirect('index.php?p=Admin&c=mall&a=index','添加成功了哦',1);
    }
    public function edit(){
        $id=$_GET['id'];
        $mall=new mallModel();
        $row=$mall->edit($id);
        $this->assign('key',$row);
        $this->display('edit');
    }
    public function update(){
        $update=$_POST;
        $photo=$_FILES['tupian'];
        $path=UPLOADS_PATH . uniqid("to_") . strrchr($photo['name'], '.');
        move_uploaded_file($photo['tmp_name'], $path);
        $image=new imageModel();
        $path=$image->thumb($path,300,100);
        $mall=new mallModel();
        $mall->update($update,$path);
        $this->redirect('index.php?p=Admin&c=mall&a=index','修改成功了哦',1);
    }
    public function delete(){
        $id=$_GET['id'];
        $mall=new mallModel();
        $mall->delete($id);
        $this->redirect('index.php?p=Admin&c=mall&a=index','删除成功了哦',1);
    }
}