<?php

/**
 * 基础控制器
 */
abstract class Controller
{
    private $data = [];//保存所有的属性
    /**
     * @param $key 数组的键名
     * @param null $value 分配到页面的数据
     */
    protected function assign($key,$value = null){
        if(is_array($key)){//判断传入参数是否为一个数组
            $this->data = array_merge($this->data,$key);//合并数组
        }else{
            $this->data[$key] = $value;
        }
    }
    /**
     * 调用视图(加载视图页面)
     * @param $template 模板名称
     */
    protected function display($template){
//        $rows = $this->data['rows'];
//        $name = $this->data['name'];
//        $age = $this->data['age'];
        //使用extract函数, 将关联数组导入到当前符号表. 将数组的键作为变量名,数组的值作为变量的值
//        var_dump($this->data);
        extract($this->data);
//        var_dump($rows);
//        var_dump($name);
//        var_dump($age);
        require CURRENT_VIEW_PATH.$template.'.html';
        exit;
    }


    /**
     * @param 跳转的url $url
     * @param string $msg 提示信息
     * @param int $times 延迟时间 秒
     */
    protected function redirect($url,$msg='',$times = 0){
//        if($times){//提示信息后跳转
//            echo "<h1>{$msg}</h1>";
//            header("Refresh: {$times};{$url}");
//        }else{//立即调整
//            header("Location: {$url}");
//        }
        if($times){//提示后跳转
            echo "<h1>{$msg}</h1>";
        }
        header("Refresh: {$times};{$url}");
        exit;
    }
}