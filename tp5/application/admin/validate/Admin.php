<?php
namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:10|min:2|unique:admin',
        'password' =>  'require',
    ];

    protected $message  =   [
        'username.require' => '管理员名称不能为空',
        'username.max'     => '管理员名称最多不能超过10个字符',
        'username.min'   => '管理员名称最少不能少于2个字符',
        'password.require'  => '管理员密码不能为空',
        'username.unique'   => '管理员名称不得重复',
 		  
    ];

    protected $scene = [
        'add'  =>  ['username','password'],
        'edit' =>  ['username'],
    ];
}