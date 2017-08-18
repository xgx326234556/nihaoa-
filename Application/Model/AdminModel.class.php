<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/17
 * Time: 6:47
 */
class AdminModel extends Model
{

    public function getList(){
        $sql = "select * from admin";
        return $this->db->fetchAll($sql);
    }
}