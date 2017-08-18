<?php

//配置文件
return [
    'db'=>[//数据库配置
        'host'=>'127.0.0.1',
        'user'=>'root',
        'password'=>'root',
        'dbname'=>'gao',
        'port'=>3306,
        'charset'=>'utf8'
    ],
    'app'=>[//默认访问平台,控制器,方法
        'default_platform'=>'Admin',
        'default_controller'=>'Admin',
        'default_action'=>'index'
    ]
];