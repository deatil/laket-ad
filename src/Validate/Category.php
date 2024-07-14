<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Validate;

use think\Validate;

use Laket\Admin\Ad\Model\Category as CategoryModel;

/**
 * 分类
 *
 * @create 2021-2-1
 * @author deatil
 */
class Category extends Validate 
{
    protected $rule = [
        'name' => 'require|/^[a-zA-Z\w]{0,50}$/|checkNameUnique',
        'title' => 'require',
    ];
    
    protected $message = [
        'name.require' => '分类标识不能为空',
        'title.require' => '分类名称不能为空！',
    ];
    
    protected $scene = [
        'add' => [
            'name', 
            'title',
        ],
        'edit' => [
            'name', 
            'title',
        ],
    ];
    
    /**
     * 验证唯一性
     */
    protected function checkNameUnique($value, $rule, $data)
    {
        if (isset($data['id']) && ! empty($data['id'])) {
            $where = [
                ['name', '=', $value],
                ['id', '<>', $data['id']]
            ];
        } else {
            $where = [
                'name' => $value,
            ];
        }
        
        $data = CategoryModel::where($where)->find();
        if (! empty($data)) {
            return '分类标识已经存在';
        } else {
            return true;
        }
    }
}