<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Controller\Ad;

/**
 * 广告
 *
 * @create 2021-2-2
 * @author deatil
 */
class Data
{
    /**
     * 广告列表内容
     * 
     * eg: 
     * /ad/data?name=[name]
     */
    public function index()
    {
        $name = request()->param('name');
        if (empty($name)) {
            return json([]);
        }
        
        $contents = ad_content_list($name);
        return json($contents);
    }

}
