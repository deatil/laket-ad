<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Controller\Admin;

use Laket\Admin\Ad\Model\Category as CategoryModel;
use Laket\Admin\Ad\Model\Content as ContentModel;

/**
 * 分类
 *
 * @create 2021-2-1
 * @author deatil
 */
class Cate extends Base 
{
    /**
     * 列表
     */
    public function index() 
    {
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit/d', 20);
            $page = $this->request->param('page/d', 1);
            $map = $this->buildparams();
            
            $data = CategoryModel::where($map)
                ->order("sort ASC, id DESC")
                ->page($page, $limit)
                ->select()
                ->toArray();
            $total = CategoryModel::where($map)
                ->count();

            $result = [
                "code" => 0, 
                "count" => $total, 
                "data" => $data,
            ];
            return json($result);
        } else {
            return $this->fetch("laket-ad::cate.index");
        }
    }

    /**
     * 添加
     */
    public function add() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Ad\\Validate\\Category.add');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $result = CategoryModel::create($data);
            if (false === $result) {
                return $this->error('添加分类失败！');
            }
            
            return $this->success('添加分类成功！');
        } else {
            return $this->fetch("laket-ad::cate.add");
        }
    }

    /**
     * 编辑
     */
    public function edit() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Ad\\Validate\\Category.edit');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $id = request()->post('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = CategoryModel::where([
                'id' => $id,
            ])->find();
            if (empty($info)) {
                return $this->error('分类不存在！');
            }
            
            $result = CategoryModel::where([
                    'id' => $id,
                ])
                ->update($data);
            if (false === $result) {
                return $this->error('修改分类失败！');
            }
            
            return $this->success('修改成功！');
        } else {
            $id = request()->param('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = CategoryModel::where([
                'id' => $id ,
            ])->find();

            $this->assign([
                'info' => $info,
            ]);
            
            return $this->fetch("laket-ad::cate.edit");
        }
    }

    /**
     * 删除
     */
    public function delete($id = '') 
    {
        $data = CategoryModel::where([
            'id' => $id,
        ])->find();
        if (empty($data)) {
            return $this->error('分类不存在！');
        }
        
        $contentTotal = ContentModel::where([
                'category_id' => $id,
            ])
            ->count();
        if (! empty($contentTotal)) {
            return $this->error('分类还有数据，不能被删除！');
        }
        
        $result = CategoryModel::where([
            'id' => $id,
        ])->delete();
        if (false === $result) {
            return $this->error('删除失败！');
        }
        
        return $this->success('删除成功！');
    }
    
    /**
     * 状态
     */
    public function status() 
    {
        $id = request()->param('id');
        $status = request()->param('status', '0', 'trim,intval');

        if (!$id) {
            return $this->error("非法操作！");
        }

        $result = CategoryModel::where([
                'id' => $id,
            ])
            ->update([
                'status' => $status,
            ]);
        if (false === $result) {
            return $this->error("状态设置失败！");
        }
        
        return $this->success("状态设置成功！");
    } 
    
    /**
     * 排序
     */
    public function sort() 
    {
        $id = request()->param('id');
        $value = request()->param('value', '100', 'trim,intval');

        if (! $id) {
            return $this->error("非法操作！");
        }

        $result = CategoryModel::where([
                'id' => $id,
            ])
            ->update([
                'sort' => $value,
            ]);
        if (false === $result) {
            return $this->error("排序设置失败！");
        }
        
        return $this->success("排序设置成功！");
    } 
    
}