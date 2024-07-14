<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Model;

use think\Model as BaseModel;

/**
 * 分类
 *
 * @create 2021-2-1
 * @author deatil
 */
class Category extends BaseModel
{
    // 数据表名称
    protected $name = 'ad_category';
    
    // 主键名
    protected $pk = 'id';
    
    // 时间字段取出后的默认时间格式
    protected $dateFormat = false;
    
    // 追加字段
    protected $append = [];
    
    public static function onBeforeInsert($model)
    {
        $model->setAttr('edit_time', time());
        $model->setAttr('edit_ip', request()->ip());
        $model->setAttr('add_time', time());
        $model->setAttr('add_ip', request()->ip());
    }
    
    public static function onBeforeUpdate($model)
    {
        $model->setAttr('edit_time', time());
        $model->setAttr('edit_ip', request()->ip());
    }
    
    /**
     * 广告列表
     *
     * @create 2021-2-1
     * @author deatil
     */
    public function contents()
    {
        return $this->hasMany(Content::class, 'category_id', 'id')
            ->where([
                'status' => 1,
            ])
            ->order('sort ASC, add_time DESC');
    }

}
