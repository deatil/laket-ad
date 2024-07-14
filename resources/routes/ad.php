<?php

use think\facade\Route;

use Laket\Admin\Ad\Controller\Ad\Data;
use Laket\Admin\Ad\Controller\Ad\Html;

// 前端输出数据
Route::get('ad/data', Data::class . '@index')->name('ad.data.index');
Route::get('ad/html', Html::class . '@index')->name('ad.html.index');
