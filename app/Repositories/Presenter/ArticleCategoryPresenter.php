<?php

namespace App\Repositories\Presenter;

use App\Models\ArticleCategory;

/**
 * 文章分类
 *
 * @package App\Repositories\Presenter
 */
class ArticleCategoryPresenter
{

    /**
     * 获取文章分类列表
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月26日22:24:19
     */
    public function getarticleCategoryList()
    {
        $category = ArticleCategory::orderBy('created_at', 'desc')->get()->toArray();
        $category = list_to_tree_key($category, 'id', 'parent_id');
        $mainStr = '<ol class="dd-list">';
        foreach ($category as $key => $value) {
            $mainStr .= '<li class="dd-item dd-nodrag" data-id="' . $value['id'] . '">';
            $mainStr .= '<div class="dd-handle">' . $value['name'] . $this->getActionButtons($value)  . '</div>';
            $mainStr .= '<ol class="dd-list">';
            if (!empty($value['_child'])) {
                $mainStr .= $this->getSecond($value['_child']);
            }
            $mainStr .= '</ol></li>';
        }
        $mainStr .= '</ol>';

        return $mainStr;
    }

    /**
     * 二级菜单
     *
     * @param $menu
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月26日22:34:57
     */
    public function getSecond($menu)
    {
        $secondMenusStr = '';
        foreach ($menu as $key => $value) {
            $secondMenusStr .= '<li class="dd-item dd-nodrag" data-id="' . $value['id'] . '">';
            $secondMenusStr .= '<div class="dd-handle">' . $value['name'] . $this->getActionButtons($value, false) . '</div>';
            $secondMenusStr .= '</li>';
        }

        return $secondMenusStr;
    }

    /**
     * 菜单按钮
     *
     * @param      $menu
     * @param bool $bool
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月28日15:54:30
     */
    public function getActionButtons($menu, $bool = true)
    {
        $buttons = '<div class="pull-right action-buttons">';
        $buttons .= BA([
                           'title'    => '<i class="fa fa-pencil"></i>',
                           'route'    => 'articleCategory.edit',
                           'class'    => 'btn btn-primary btn-xs',
                           'slug'     => 'admin.articleCategory.edit',
                           'params'   => ['id' => $menu['id']],
                           'mark'     => 'js_mark_class',
                           'size'     => ['70%', '80%'],
                           'jump'     => 0,
                           'callback' => 'edit_articleCategory'
                       ]);
        if ($menu['parent_id'] == 0) {
            if (empty($menu['_child'])) {
                $buttons .= BA([
                                   'title'    => '<i class="fa fa-trash"></i>',
                                   'route'    => 'articleCategory.destroy',
                                   'slug'     => 'admin.articleCategory.destroy',
                                   'params'   => ['id' => $menu['id']],
                                   'class'    => 'btn btn-danger btn-xs',
                                   'mark'     => 'js_mark_class',
                                   'size'     => ['70%', '80%'],
                                   'jump'     => 0,
                                   'callback' => 'edit_articleCategory']);
            }
        } else {
            $buttons .= BA([
                               'title'    => '<i class="fa fa-trash"></i>',
                               'route'    => 'articleCategory.destroy',
                               'class'    => 'btn btn-danger btn-xs',
                               'slug'     => 'admin.articleCategory.destroy',
                               'params'   => ['id' => $menu['id']],
                               'mark'     => 'js_mark_class',
                               'size'     => ['70%', '80%'],
                               'jump'     => 0,
                               'callback' => 'edit_articleCategory']);
        }
        $buttons .= '</div>';
        return $buttons;


        /*$buttons = '<div class="pull-right action-buttons">';
        if (auth()->user()->can('admin.articleCategory.create') && $bool) {
            $buttons .= '<a href="javascript:;"  data-href="' . url("admin/menu") . '" data-pid="' . $menu['id'] . '" class="btn-xs createMenu" data-toggle="tooltip" data-original-title="添加"  data-placement="top"> <i class="fa fa-plus"></i></a>';
        }
        if (auth()->user()->can('admin.articleCategory.edit')) {
            $buttons .= '<a href="javascript:;" data-href="' . url("admin/menu/{$menu['id']}/edit") . '" class="btn-xs editMenu" data-toggle="tooltip" data-original-title="修改"  data-placement="top"><i class="fa fa-pencil"></i></a>';
        }
        if (auth()->user()->can('admin.articleCategory.destroy')) {
            if ($menu['parent_id'] == 0) {
                if (empty($menu['_child'])) {
                    $buttons .= '<a href="javascript:;" class="btn-xs destroyMenu" data-id="' . $menu['id'] . '" data-original-title="删除" data-toggle="tooltip" data-placement="top"> <i class="fa fa-trash"></i>
                        <form action="' . url("admin/menu", [$menu['id']]) . '" method="POST" class="j_delete_menu_item' . '" style="display:none">
                        <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">
                        </form>
                        </a>';
                }
            } else {
                $buttons .= '<a href="javascript:;" class="btn-xs destroyMenu" data-id="' . $menu['id'] . '" data-original-title="删除" data-toggle="tooltip" data-placement="top"> <i class="fa fa-trash"></i>
                        <form action="' . url("admin/menu", [$menu['id']]) . '" method="POST" class="j_delete_menu_item' . '" style="display:none">
                        <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="' . csrf_token() . '">
                        </form>
                        </a>';
            }

        }
        $buttons .= '</div>';*/

    }
}