<?php

class mallModel extends Model
{
public function add($row,$path){
    $sql="insert into mall values(null,'{$row['name']}','{$row['jifen']}','{$row['kuchun']}','{$path}')";
    $this->db->query($sql);

}
    public function select(){
        $sql="select * from mall limit 0,4";
       $row= $this->db->fetchAll($sql);
        $sql="select * from mall limit 4,4";
        $rows= $this->db->fetchAll($sql);
        $sql="select * from mall limit 8,4";
        $rowss=$this->db->fetchAll($sql);
        $sql="select * from mall limit 12,4";
        $rowsss=$this->db->fetchAll($sql);
        $sql="select * from mall limit 16,4";
        $rowssss=$this->db->fetchAll($sql);
        $date=[];
        $date['row']=$row;
        $date['rows']=$rows;
        $date['rowss']=$rowss;
        $date['rowsss']=$rowsss;
        $date['rowssss']=$rowssss;
        return $date;

    }
    public function edit($id){
       $sql="select * from mall where mall_id=$id";
        return $this->db->fetchRow($sql);
    }
    public function update($update,$path){
        if(empty($path)){
            $sql="update mall set name='{$update['name']}',jifen='{$update['jifen']}',
kuchun='{$update['kuchun']}' where mall_id='{$update['id']}'";
            $this->db->query($sql);
        }else{
            $sql="update mall set name='{$update['name']}',jifen='{$update['jifen']}',
kuchun='{$update['kuchun']}',tupian='{$path}' where mall_id='{$update['id']}'";
            $this->db->query($sql);
        }

    }
    public function delete($id){
        $sql="delete from mall where mall_id=$id";
        $this->db->query($sql);
    }
}