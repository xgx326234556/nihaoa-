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
}