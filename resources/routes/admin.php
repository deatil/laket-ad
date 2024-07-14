<?php

use think\facade\Route;
use Laket\Admin\Facade\Flash;

use Laket\Admin\Ad\Controller\Admin\Cate;
use Laket\Admin\Ad\Controller\Admin\Content;

/**
 * 插件路由
 */
Flash::routes(function() {
    // 分类
    Route::get('ad/cate/index', Cate::class . '@index')->name('admin.ad-cate.index');
    Route::get('ad/cate/add', Cate::class . '@add')->name('admin.ad-cate.add');
    Route::post('ad/cate/add', Cate::class . '@add')->name('admin.ad-cate.add-save');
    Route::get('ad/cate/edit', Cate::class . '@edit')->name('admin.ad-cate.edit');
    Route::post('ad/cate/edit', Cate::class . '@edit')->name('admin.ad-cate.edit-save');
    Route::post('ad/cate/delete', Cate::class . '@delete')->name('admin.ad-cate.delete');
    Route::post('ad/cate/status', Cate::class . '@status')->name('admin.ad-cate.status');
    Route::post('ad/cate/sort', Cate::class . '@sort')->name('admin.ad-cate.sort');
    
    // 内容
    Route::get('ad/content/index', Content::class . '@index')->name('admin.ad-content.index');
    Route::get('ad/content/add', Content::class . '@add')->name('admin.ad-content.add');
    Route::post('ad/content/add', Content::class . '@add')->name('admin.ad-content.add-save');
    Route::get('ad/content/edit', Content::class . '@edit')->name('admin.ad-content.edit');
    Route::post('ad/content/edit', Content::class . '@edit')->name('admin.ad-content.edit-save');
    Route::post('ad/content/delete', Content::class . '@delete')->name('admin.ad-content.delete');
    Route::post('ad/content/status', Content::class . '@status')->name('admin.ad-content.status');
    Route::post('ad/content/sort', Content::class . '@sort')->name('admin.ad-content.sort');
});