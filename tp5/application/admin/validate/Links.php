<?php
namespace app\admin\validate;

use think\Validate;

class Links extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'url' =>  'require',
        
    ];

    protected $message  =   [
        'title.require' => '链接标题不能为空',
        'url.require'  => '链接地址不能为空',
        
 		  
    ];

    protected $scene = [
        'add'  =>  ['title','url'],
        'edit' =>  ['title','url'],
    ];
}