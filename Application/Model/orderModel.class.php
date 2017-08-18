<?php

class orderModel extends Model
{
public function add($add){
    //$time=time();
//    $sql="select * from members where realname='{$add['realname']}'";
//    $row=$this->db->query($sql);
//    if(!empty($row)){
//        $status='成功';
        $sql="insert into `order`(order_id,phone,realname,barber,date,content,taocan,status) values(null,{$add['phone']},'{$add['realname']}','{$add['barber']}',
'{$add['date']}','{$add['content']}','{$add['taocan']}','{$add['status']}')";
        $this->db->query($sql);
//    }else{
//        $status='失败';
//        $sql="insert into `order` values(null,{$add['phone']},'{$add['realname']}','{$add['barber']}',
//'{$add['content']}',{$time},'{$status}','{$add['reply']}')";
//        $this->db->query($sql);
//    }


}
    public function select($page){
         $pageSize=6;
        $start=($page-1)*$pageSize;
        $sql="select * from `order` limit $start,$pageSize";
        $row=$this->db->fetchAll($sql);
        $sql="select count(*) from `order`";
        $cont=$this->db->fetchColumn($sql);
        $totel=ceil($cont/$pageSize);
        $data=[];
        $data['row']=$row;
        $data['totel']=$totel;
        $data['page']=$page;
        return $data;

    }
    public function delete($id){
        $sql="delete from `order` where order_id=$id";
        $this->db->query($sql);
    }
    public function eidt($status){

        $sql="update `order` set status='{$status['status']}', reply='{$status['reply']}' where order_id='{$status['id']}'";
        $this->db->query($sql);

    }
    public function gg(){
        $sql="select * from members";
        $row=$this->db->fetchAll($sql);
        $sql="select * from plans";
        $rows=$this->db->fetchAll($sql);
        $data=[];
        $data['row']=$row;
        $data['rows']=$rows;
        return $data;
    }
    public function home_edit($id){
        $sql="select * from `order` where order_id=$id";
        $row=$this->db->fetchRow($sql);
        $sql="select * from members";
        $rowss=$this->db->fetchAll($sql);//美发师
        $sql="select * from plans";
        $rows=$this->db->fetchAll($sql);//套餐
        $data=[];
        $data['row']=$row;
        $data['rows']=$rows;
        $data['rowss']=$rowss;
        return $data;

    }
    public function update($update){
        $sql="update `order` set phone='{$update['phone']}',realname='{$update['realname']}',
barber='{$update['barber']}',content='{$update['content']}',date='{$update['date']}',taocan='{$update['taocan']}' where order_id='{$update['id']}'";
        $this->db->query($sql);
    }
}
