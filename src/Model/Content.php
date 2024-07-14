<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Model;

use think\Model as BaseModel;

/**
 * 内容
 *
 * @create 2021-2-1
 * @author deatil
 */
class Content extends BaseModel
{
    // 数据表名称
    protected $name = 'ad_content';
    
    // 主键名
    protected $pk = 'id';
    
    // 时间字段取出后的默认时间格式
    protected $dateFormat = false;
    
    // 追加字段
    protected $append = [
        'contents',
    ];
    
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
     * 分组
     */
    public function cate()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    
    /**
     * 具体内容
     */
    public function getContentsAttr()
    {
        if ($this->getAttr('type') == 1) {
            $content = lake_get_file_path($this->getAttr('content'));
        } else {
            $content = $this->getAttr('content');
        }
        
        return $content;
    }

}
