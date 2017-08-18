<?php

class duifanModel extends Model
{
public function add($add){
    $string="123456789ABCDEFGLMHKSZXVM";
    $string=str_shuffle($string);
    $random=substr($string,0,17);
    $sql="insert into indent (username,phone,site,date,status,indent,evaluate) values('{$add['username']}',
'{$add['phone']}','{$add['site']}','{$add['date']}',
'{$add['status']}','{$random}','{$add['evaluate']}')";
    $this->db->query($sql);
}
    public function select($page){
        $pageSize=4;
        $start=($page-1)*$pageSize;
        $sql="select * from indent limit $start,$pageSize";
        $row= $this->db->fetchAll($sql);
        $sql="select count(*) from `indent`";
        $cont=$this->db->fetchColumn($sql);
        $totel=ceil($cont/$pageSize);
        $data=[];
        $data['row']=$row;
        $data['totel']=$totel;
        $data['page']=$page;
        return $data;
    }
    public function update($update){
        $sql="update indent set evaluate='{$update['evaluate']}' where indent_id='{$update['id']}'";
        $this->db->query($sql);
    }
    public function gg($gg){
        $sql="update indent set discuss='{$gg['discuss']}' where indent_id='{$gg['id']}'";
        $this->db->query($sql);
    }
    public function delete($id){
        $sql="delete from indent where indent_id=$id";
        $this->db->query($sql);
    }
    public function kk($kk){
        $sql="update indent set status='{$kk['status']}' where indent_id='{$kk['id']}'";
        $this->db->query($sql);
    }
}