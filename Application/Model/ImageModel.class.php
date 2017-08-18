<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/26
 * Time: 10:52
 */
class ImageModel extends Model
{
    /**
     * 图片类型
     * @var array
     */
    private $mime = [
        "image/jpeg"=>"jpeg",
        "image/png"=>"png",
        "image/gif"=>"gif",
    ];

    public function thumb($src_path,$thumb_width,$thumb_height){
        //创建两张画布
        //原图画布
        //获取原图的绝对路径
        if(!is_file($src_path)){
            $this->error = "原图不存在!";
            return false;
        }
        $src_info = getimagesize($src_path);
        list($src_width,$src_height) = $src_info;

        //获取图片的类型
        $mime = $src_info['mime'];
        //拼接创建方法名字
        $create_func = "imagecreatefrom".$this->mime[$mime];
        $src_image = $create_func($src_path);//可变方法名

//        if($mime == "image/jpeg"){
//            $src_image = imagecreatefromjpeg($src_path);
//        }elseif($mime == "image/png"){
//            $src_image = imagecreatefrompng($src_path);
//        }

        //目标画布
        $thumb_image = imagecreatetruecolor($thumb_width,$thumb_height);

        //补白
        $white = imagecolorallocate($thumb_image,255,255,255);
        imagefill($thumb_image,0,0,$white);
        //等比例缩放
        //计算最大的缩放比例
        $scale = max($src_width/$thumb_width,$src_height/$thumb_height);

        //计算缩放后图片占目标图片中的宽高,用原图除以最大比例
        $width = $src_width/$scale;
        $height = $src_height/$scale;

        //将原图拷贝到目标图片
//        imagecopyresampled($thumb_image,$src_image,0,0,0,0,$thumb_width,$thumb_height,$src_width,$src_height);
        imagecopyresampled($thumb_image,$src_image,($thumb_width-$width)/2,($thumb_height-$height)/2,0,0,$width,$height,$src_width,$src_height);

        //输出图片
        //保存到与原图一样的目录下 只加上 后缀
        //IT_59279a0a880fb_$宽度x$高度.png
        $pathinfo = pathinfo($src_path);//获取图片路径信息
        //拼接目录图片路径
        $thumb_path = $pathinfo['dirname'].'\\'.$pathinfo['filename']."_{$thumb_width}x{$thumb_height}.".$pathinfo['extension'];

        //拼接 输出方法名字
        $out_func = "image".$this->mime[$mime];
        $out_func($thumb_image,$thumb_path);

//        if($mime == "image/jpeg"){
//            imagejpeg($thumb_image,$thumb_path);
//        }elseif($mime == "image/png"){
//            imagepng($thumb_image,$thumb_path);
//        }
        //销毁图片
        imagedestroy($src_image);
        imagedestroy($thumb_image);

        //返回缩略图片的相对路
        $row= str_replace(UPLOADS_PATH,'',$thumb_path);
        //$row['logo']=str_replace(UPLOADS_PATH,'',$src_path);
        return $row;
    }
}