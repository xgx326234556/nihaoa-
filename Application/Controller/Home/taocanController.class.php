<?php

class taocanController extends Controller
{
public function index (){
    $taocan=new taocanModel();
    $row=$taocan->taocan();
    $this->assign('key',$row);
    $this->display('taocan');
}
}