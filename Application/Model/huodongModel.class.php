<?php

class huodongModel extends Model
{
public function index(){
     $sql="select * from article";
    return $this->db->fetchAll($sql);
}
}