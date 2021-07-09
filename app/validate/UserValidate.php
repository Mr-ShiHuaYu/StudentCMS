<?php

declare (strict_types=1);

namespace app\validate;

use think\Validate;

class UserValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'uid|学号' => 'require',
        'password|密码' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [

    ];

    public function sceneLogin()
    {
        return $this->only(['uid', 'password']);
    }
}
