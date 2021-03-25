<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'cateid' =>  'require' 
        
    ];

    protected $message  =   [
        'title.require' => '文章标题不能为空',
        'cateid.require' => '文章栏目不能为空',
        
 		  
    ];

    protected $scene = [
        'add'  =>  ['title','cateid'],
        'edit' =>  ['title','cateid'],
    ];
}