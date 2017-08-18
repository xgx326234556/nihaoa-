<?php
header('Content-Type: text/html;charset=utf-8');
/**
 * 定义项目路径常量
 * 每个路径都以 DS 结束
 */
defined("DS") or define("DS",DIRECTORY_SEPARATOR);
defined("ROOT_PATH") or define("ROOT_PATH",__DIR__.DS);//项目根路径
defined("APP_PATH") or define("APP_PATH",ROOT_PATH."Application".DS);//应用文件路径
defined("FRAME_PATH") or define("FRAME_PATH",ROOT_PATH."Framework".DS);//框架路径
defined("PUBLIC_PATH") or define("PUBLIC_PATH",ROOT_PATH."Public".DS);//公共文件路径
defined("UPLOADS_PATH") or define("UPLOADS_PATH",ROOT_PATH."Uploads".DS);//上传文件路径
defined("CONFIG_PATH") or define("CONFIG_PATH",APP_PATH."Config".DS);//配置文件路径
defined("CONTROLLER_PATH") or define("CONTROLLER_PATH",APP_PATH."Controller".DS);//控制器文件路径
defined("MODEL_PATH") or define("MODEL_PATH",APP_PATH."Model".DS);//模型文件路径
defined("VIEW_PATH") or define("VIEW_PATH",APP_PATH."View".DS);//视图文件路径
defined("TOOLS_PATH") or define("TOOLS_PATH",FRAME_PATH."Tools".DS);//工具文件路径

//引入配置文件
$GLOBALS['config'] = require CONFIG_PATH.'application.config.php';

//接收url参数,确定调用的控制器,方法
$p = isset( $_GET['p']) ?  $_GET['p'] : $GLOBALS['config']['app']['default_platform'];
$c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['app']['default_controller'];//代表控制器
$a = isset($_GET['a']) ? $_GET['a'] :$GLOBALS['config']['app']['default_action'];//代表方法
//添加 当前控制器路径的常量 当前视图文件的路径常量
defined("CURRENT_CONTROLLER_PATH") or define("CURRENT_CONTROLLER_PATH",CONTROLLER_PATH.$p.DS);
defined("CURRENT_VIEW_PATH") or define("CURRENT_VIEW_PATH",VIEW_PATH.$p.DS.$c.DS);


//引入控制器类文件
//require CURRENT_CONTROLLER_PATH."{$c}Controller.class.php";

//创建控制器类对象
$class_name = $c."Controller";
$controller = new $class_name();//可变类名

//控制器类对象中的调用方法
$controller->$a();//可变方法名

/**
 * 自动加载 类
 * @param $class_name 类名
 */
function __autoload($class_name){
    //根据类名加载类
    $classMapping = [
        'DB'=>TOOLS_PATH."DB.class.php",
        'Model'=>FRAME_PATH."Model.class.php",
        'Controller'=>FRAME_PATH."Controller.class.php"
    ];
    //先判断框架核心类
    if(isset($classMapping[$class_name])){//加载框架核心类
        require $classMapping[$class_name];
    }elseif(substr($class_name,-10) == "Controller"){ //标示加载控制器
        require CURRENT_CONTROLLER_PATH.$class_name.".class.php";
    }elseif(substr($class_name,-5) == "Model"){//加载模型类
        require MODEL_PATH.$class_name.".class.php";
    }
}

