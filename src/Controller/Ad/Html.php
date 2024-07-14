<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad\Controller\Ad;

/**
 * 广告页面内容
 *
 * @create 2021-2-2
 * @author deatil
 */
class Html
{
    /**
     * 广告html内容
     * 
     * eg: 
     * /ad/html?name=[name]
     */
    public function index()
    {
        $name = request()->param('name');
        if (empty($name)) {
            return "";
        }
        
        $contents = ad_content_html_list($name);
        return response($contents);
    }
}
