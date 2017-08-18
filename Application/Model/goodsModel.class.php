<?php


class goodsModel extends Model
{
public function add($add){
    $sql="insert into goods(name,phone,status,date,indent_id) values('{$add['name']}',
'{$add['phone']}','{$add['status']}','{$add['date']}','{$add['indent']}')";
    $this->db->query($sql);
}
    public function select($page){
        $pageSize=4;
        $start=($page-1)*$pageSize;
        $sql="select * from goods limit $start,$pageSize";
        $row=$this->db->fetchAll($sql);
        $sql="select count(*) from `goods`";
        $cont=$this->db->fetchColumn($sql);
        $totel=ceil($cont/$pageSize);
        $data=[];
        $data['row']=$row;
        $data['totel']=$totel;
        $data['page']=$page;
        return $data;
    }
    public function from(){
        $sql="select * from indent";
        $row= $this->db->fetchAll($sql);
        $sql="select * from goods";
        $rows=$this->db->fetchRow($sql);
        $data=[];
        $data['row']=$row;
        $data['rows']=$rows;
        return $data;
    }
    public function update($update){
        $sql="update goods set daole='{$update['daole']}' where goods_id='{$update['id']}'";
        $this->db->query($sql);
    }
}