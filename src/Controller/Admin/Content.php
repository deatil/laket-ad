<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Controller\Admin;

use Laket\Admin\Ad\Model\Category as CategoryModel;
use Laket\Admin\Ad\Model\Content as ContentModel;

/**
 * 广告
 *
 * @create 2021-2-1
 * @author deatil
 */
class Content extends Base 
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
            
            $cateid = request()->param('cateid');
            if (! empty($cateid)) {
                $map[] = ['category_id', '=', $cateid];
            }
            
            $data = ContentModel::with(['cate'])
                ->where($map)
                ->order('sort DESC, id DESC')
                ->page($page, $limit)
                ->select()
                ->toArray();
            $total = ContentModel::where($map)->count();

            $result = [
                "code" => 0, 
                "count" => $total, 
                "data" => $data,
            ];
            return json($result);
        } else {
            $cateid = request()->param('cateid');
            
            $cate = CategoryModel::where([
                    'status' => 1,
                ])
                ->order('sort ASC, id DESC')
                ->select()
                ->toArray();

            $this->assign([
                'cateid' => $cateid,
                'cate' => $cate,
            ]);
            
            return $this->fetch("laket-ad::content.index");
        }
    }

    /**
     * 添加
     */
    public function add() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Ad\\Validate\\Content.add');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $result = ContentModel::create($data);
            if (false === $result) {
                return $this->error('添加失败！');
            }
            
            return $this->success('添加成功！');
        } else {
            $cateid = request()->param('cateid', 0);
            
            $cate = CategoryModel::where([
                    'status' => 1,
                ])
                ->order('sort ASC, id DESC')
                ->select()
                ->toArray();

            $this->assign([
                'cateid' => $cateid,
                'cate' => $cate,
            ]);
            
            return $this->fetch("laket-ad::content.add");
        }
    }

    /**
     * 编辑
     */
    public function edit() 
    {
        if (request()->isPost()) {
            $data = request()->post();
            $validate = $this->validate($data, '\\Laket\\Admin\\Ad\\Validate\\Content.edit');
            if (true !== $validate) {
                return $this->error($validate);
            }
            
            $id = request()->post('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = ContentModel::where([
                'id' => $id,
            ])->find();
            if (empty($info)) {
                return $this->error('内容不存在！');
            }
            
            $type = $data['type'];
            if ($type == 1) {
                $data['content'] = $data['content_image'];
            } elseif ($type == 2) {
                $data['content'] = $data['content_url'];
            } elseif ($type == 3) {
                $data['content'] = $data['content_code'];
            } elseif ($type == 4) {
                $data['content'] = $data['content_text'];
            }
            unset($data['content_image'], $data['content_url'], $data['content_code'], $data['content_text']);
            
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            
            $result = ContentModel::where([
                    'id' => $id,
                ])
                ->update($data);
            if (false === $result) {
                return $this->error('修改失败！');
            }
            
            return $this->success('修改成功！');
        } else {
            $id = request()->param('id');
            if (empty($id)) {
                return $this->error('ID错误！');
            }
            
            $info = ContentModel::where([
                'id' => $id ,
            ])->find();
            
            $cate = CategoryModel::where([
                    'status' => 1,
                ])
                ->order('sort ASC, id DESC')
                ->select()
                ->toArray();

            $this->assign([
                'info' => $info,
                'cate' => $cate,
            ]);
            
            return $this->fetch("laket-ad::content.edit");
        }
    }

    /**
     * 删除
     */
    public function delete() 
    {
        $id = request()->param('id');
        if (empty($id)) {
            return $this->error('非法操作！');
        }
        
        $info = ContentModel::where([
            'id' => $id,
        ])->find();
        if (empty($info)) {
            return $this->error('信息不存在！');
        }
        
        $result = ContentModel::where([
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

        $result = ContentModel::where([
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

        $result = ContentModel::where([
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