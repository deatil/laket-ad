<?php

declare (strict_types = 1);

namespace Laket\Admin\Ad;

use Laket\Admin\Facade\Flash;
use Laket\Admin\Flash\Menu;
use Laket\Admin\Flash\Service as BaseService;

class Service extends BaseService
{
    /**
     * 权限菜单 slug
     */
    protected $slug = 'laket-admin.flash.ad';
    
    /**
     * 启动
     */
    public function boot()
    {
        Flash::extend('laket/laket-ad', __CLASS__);
    }
    
    /**
     * 开始，只有启用后加载
     */
    public function start()
    {
        // 路由
        $this->loadRoutesFrom(__DIR__ . '/../resources/routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/../resources/routes/ad.php');
        
        // 视图
        $this->loadViewsFrom(__DIR__ . '/../resources/view', 'laket-ad');
        
        // 导入帮助文件
        $this->loadFilesFrom(__DIR__ . '/helper.php');
    }
    
    /**
     * 安装后
     */
    public function install()
    {
        $slug = $this->slug;
        $menus = include __DIR__ . '/../resources/menus/menus.php';
        
        // 添加菜单
        Menu::create($menus);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/install.sql');
    }
    
    /**
     * 卸载后
     */
    public function uninstall()
    {
        Menu::delete($this->slug);
        
        // 数据库
        Flash::executeSql(__DIR__ . '/../resources/database/uninstall.sql');
    }
    
    /**
     * 更新后
     */
    public function upgrade()
    {}
    
    /**
     * 启用后
     */
    public function enable()
    {
        Menu::enable($this->slug);
    }
    
    /**
     * 禁用后
     */
    public function disable()
    {
        Menu::disable($this->slug);
    }
    
}
