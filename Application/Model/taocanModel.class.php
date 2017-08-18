<?php

class taocanModel extends Model
{
public function taocan(){
    $sql="select * from plans";
    return $this->db->fetchAll($sql);
}
}