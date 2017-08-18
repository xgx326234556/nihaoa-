<?php
class paihangModel extends Model
{
public function select(){
    $sql="select sum(amount) as zongjine,`user_id`  from histories where
type=1 group by user_id order by zongjine desc limit 3";
   $row= $this->db->fetchAll($sql);
 foreach($row as $key=>$v){
            $sql = "select username from users where user_id='{$v['user_id']}'";
			$usernames = $this->db->fetchAll($sql);
     foreach($usernames as $username){
         $row[$key]['username'] = $username['username'];
     }

 }
    return $row;
}
    public function chaxun(){
        $sql="select sum(amount) as zongjine,`user_id`  from histories where
type=0 group by user_id order by zongjine desc limit 3";
        $row= $this->db->fetchAll($sql);
        foreach($row as $key=>$v){
            $sql = "select username from users where user_id='{$v['user_id']}'";
            $usernames = $this->db->fetchAll($sql);
            foreach($usernames as $username){
                $row[$key]['username'] = $username['username'];
            }

        }
        return $row;
    }
    public function huwu(){
     $sql="select count(member_id) as conuts,member_id
 from histories where type=0 group by member_id order by conuts desc limit 3";
        $row= $this->db->fetchAll($sql);
        foreach($row as $key=>$v){
            $sql = "select realname from members where member_id='{$v['member_id']}'";
            $usernames = $this->db->fetchAll($sql);
            foreach($usernames as $username){
                $row[$key]['username'] = $username['realname'];
            }

        }
        return $row;
    }
}