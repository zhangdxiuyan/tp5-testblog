<?php
namespace gm1\gmsm;
header("constant-type:text/html;charset=utf-8");
function getmsg(){
    echo'123';
}
define('nm','zhangsan');
const NM='zhangsan1';
class Animals{
    public $obj='dog';
    static $name='大黄';
}


namespace gm2\gmss;
function getmsg(){
    echo'345';
}
define('nm','lisi');
const NM='lisi1';
class Animals{
    public $obj='pig';
    static $name='哼哼';
}

use gm1\gmsm\Animals;
$Animal=new Animals();
echo $Animal->obj;
//echo Animals::$name;


