<?php
return [
    "title" => "广告管理",
    "url" => "ad/index",
    "method" => "GET",
    "slug" => $slug,
    "icon" => "icon-prompt",
    "listorder" => 115,
    "menu_show" => 1,
    "remark" => "",
    "children" => [
        [
            "title" => "分类位置",
            "url" => "ad/cate/index",
            "method" => "GET",
            "slug" => "admin.ad-cate.index",
            "icon" => "icon-label",
            "menu_show" => 1,
            "listorder" => 15,
            "children" => [
                [
                    "title" => "分类位置",
                    "url" => "ad/cate/index",
                    "method" => "GET",
                    "slug" => "admin.ad-cate.index",
                    "menu_show" => 0,
                    "listorder" => 15,
                ],
                [
                    "title" => "添加分类",
                    "url" => "ad/cate/add",
                    "method" => "GET",
                    "slug" => "admin.ad-cate.add",
                    "menu_show" => 0,
                    "listorder" => 13,
                ],
                [
                    "title" => "添加分类",
                    "url" => "ad/cate/add",
                    "method" => "POST",
                    "slug" => "admin.ad-cate.add-save",
                    "menu_show" => 0,
                    "listorder" => 12,
                ],
                [
                    "title" => "编辑分类",
                    "url" => "ad/cate/edit",
                    "method" => "GET",
                    "slug" => "admin.ad-cate.edit",
                    "menu_show" => 0,
                    "listorder" => 11,
                ],
                [
                    "title" => "编辑分类",
                    "url" => "ad/cate/edit",
                    "method" => "POST",
                    "slug" => "admin.ad-cate.edit-save",
                    "menu_show" => 0,
                    "listorder" => 10,
                ],
                [
                    "title" => "删除分类",
                    "url" => "ad/cate/delete",
                    "method" => "POST",
                    "slug" => "admin.ad-cate.delete",
                    "menu_show" => 0,
                    "listorder" => 9,
                ],
                [
                    "title" => "分类状态",
                    "url" => "ad/cate/status",
                    "method" => "POST",
                    "slug" => "admin.ad-cate.status",
                    "menu_show" => 0,
                    "listorder" => 8,
                ],
                [
                    "title" => "分类排序",
                    "url" => "ad/cate/sort",
                    "method" => "POST",
                    "slug" => "admin.ad-cate.sort",
                    "menu_show" => 0,
                    "listorder" => 7,
                ],
            ],
        ],
        [
            "title" => "广告数据",
            "url" => "ad/content/index",
            "method" => "GET",
            "slug" => "admin.ad-content.index",
            "icon" => "icon-shiyongwendang",
            "menu_show" => 1,
            "listorder" => 10,
            "children" => [
                [
                    "title" => "广告列表",
                    "url" => "ad/content/index",
                    "method" => "GET",
                    "slug" => "admin.ad-content.index",
                    "menu_show" => 0,
                    "listorder" => 15,
                ],
                [
                    "title" => "添加广告",
                    "url" => "ad/content/add",
                    "method" => "GET",
                    "slug" => "admin.ad-content.add",
                    "menu_show" => 0,
                    "listorder" => 13,
                ],
                [
                    "title" => "添加广告",
                    "url" => "ad/content/add",
                    "method" => "POST",
                    "slug" => "admin.ad-content.add-save",
                    "menu_show" => 0,
                    "listorder" => 12,
                ],
                [
                    "title" => "编辑广告",
                    "url" => "ad/content/edit",
                    "method" => "GET",
                    "slug" => "admin.ad-content.edit",
                    "menu_show" => 0,
                    "listorder" => 11,
                ],
                [
                    "title" => "编辑广告",
                    "url" => "ad/content/edit",
                    "method" => "POST",
                    "slug" => "admin.ad-content.edit-save",
                    "menu_show" => 0,
                    "listorder" => 10,
                ],
                [
                    "title" => "删除广告",
                    "url" => "ad/content/delete",
                    "method" => "POST",
                    "slug" => "admin.ad-content.delete",
                    "menu_show" => 0,
                    "listorder" => 9,
                ],
                [
                    "title" => "广告状态",
                    "url" => "ad/content/status",
                    "method" => "POST",
                    "slug" => "admin.ad-content.status",
                    "menu_show" => 0,
                    "listorder" => 8,
                ],
                [
                    "title" => "广告排序",
                    "url" => "ad/content/sort",
                    "method" => "POST",
                    "slug" => "admin.ad-content.sort",
                    "menu_show" => 0,
                    "listorder" => 7,
                ],
            ],
        ],
    ],
];
