<?php

class codesModel extends Model
{
 public function add($codes){
     $sql="insert into codes values(null,'{$codes['code']}','{$codes['user_id']}','{$codes['money']}',
'{$codes['status']}')";
     $this->db->query($sql);
 }
    public function select($page){
        $pageSize=2;
        $start=($page-1)*$pageSize;
        $sql="select * from codes limit $start,$pageSize";
        $row=$this->db->fetchAll($sql);
        $sql="select count(*) from codes";
        $count=$this->db->fetchColumn($sql);
        $total=ceil($count/$pageSize);
        $data=[];
        $data['row']=$row;
        $data['total']=$total;
        $data['page']=$page;
        return $data;

    }
    public function delete($id){
        $sql="delete from codes where code_id=$id";
        $this->db->query($sql);
    }
    public function enid($id){
        $sql="select * from codes where code_id=$id";
       return  $this->db->fetchRow($sql);
    }
    public function update($update){
        $sql="update codes set code='{$update['code']}',
user_id='{$update['user_id']}',money='{$update['money']}',status='{$update['status']}' where
code_id='{$update['id']}'";
        $this->db->query($sql);
    }
}