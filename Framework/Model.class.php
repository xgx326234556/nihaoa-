<?php

/**
 * 基础模型类
 * Class Model
 */
abstract class Model
{
    protected $db;//保存创建好的DB对象

    protected $error;//保存错误信息

    public function __construct()
    {
//        require TOOLS_PATH.'DB.class.php';
        $this->db = DB::getInstance($GLOBALS['config']['db']);
    }
    /**
     * 获取错误信息
     * @return mixed
     */
    public function getError(){
        return $this->error;
    }
}