<?php

use Laket\Admin\Ad\Model\Category as CategoryModel;
use Laket\Admin\Ad\Model\Content as ContentModel;

if (! function_exists('ad_content_list')) {
    /**
     * 当前广告信息，列表
     */
    function ad_content_list($name = null) {
        if (empty($name)) {
            return [];
        }
        
        $cate = CategoryModel
            ::where([
                'name' => $name,
                'status' => 1,
            ])
            ->find();
        if (empty($cate)) {
            return [];
        }
        
        $contents = ContentModel
            ::where([
                'category_id' => $cate['id'],
                'status' => 1,
            ])
            ->where([
                ['start_time', '<=', time()],
                ['end_time', '>=', time()],
            ])
            ->order('sort DESC, add_time DESC')
            ->select();
        if (empty($contents)) {
            return [];
        }
        
        $contents = $contents->toArray();
        
        $newContent = [];
        foreach ($contents as $content) {
            $newContent[] = [
                'type'    => $content['type'],
                'title'   => $content['title'],
                'url'     => $content['url'],
                'target'  => $content['target'],
                'content' => $content['contents'],
            ];
        }
        
        return $newContent;
    }
}

if (! function_exists('ad_content_html_list')) {
    /**
     * 当前广告显示信息
     */
    function ad_content_html_list($name = null) {
        $contents = ad_content_list($name);
        
        $newContents = collect($contents)->map(function($item) {
            if ($item['type'] == 1) {
                $data = '<span class="laket-ad-image">';
                $data .= '<a href="'.$item['url'].'" title="'.$item['title'].'" target="'.$item['target'].'">';
                $data .= '<img src="'.$item['content'].'" alt="'.$item['title'].'" />';
                $data .= '</a>';
                $data .= '</span>';
            } elseif ($item['type'] == 2) {
                $data = '<span class="laket-ad-url">';
                $data .= '<a href="'.$item['content'].'" title="'.$item['title'].'">'.$item['title'].'</a>';
                $data .= '</span>';
            } elseif ($item['type'] == 3) {
                $data = '<span class="laket-ad-code">';
                $data .= $item['content'];
                $data .= '</span>';
            } elseif ($item['type'] == 4) {
                $data = '<span class="laket-ad-text">';
                $data .= '<a href="'.$item['url'].'" title="'.$item['title'].'" target="'.$item['target'].'">';
                $data .= $item['content'];
                $data .= '</a>';
                $data .= '</span>';
            }
            
            return $data;
        })->toArray();
        
        return implode('', $newContents);
    }
}

