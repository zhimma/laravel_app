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
    public function getArticleCategoryList()
    {
        $category = ArticleCategory::orderBy('created_at', 'desc')->get()->toArray();
        $category = list_to_tree_key($category, 'id', 'parent_id');
        $mainStr = '<ol class="dd-list">';
        foreach ($category as $key => $value) {
            $mainStr .= '<li class="dd-item dd-nodrag" data-id="' . $value['id'] . '">';
            $mainStr .= '<div class="dd-handle">' . $value['name'] . $this->getActionButtons($value) . '</div>';
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
    public function getActionButtons($menu)
    {
        $buttons = '<div class="pull-right action-buttons">';
        if ($menu['parent_id'] == 0) {
            $buttons .= BA([
                                'title'  => '<i class="fa fa-plus"></i>',
                                'route'  => 'articleCategory.create',
                                'class'  => 'btn btn-default btn-xs j_create_class',
                                'slug'   => 'admin.articleCategory.create',
                                'params' => '',
                                'data' => ['parent_id'=>$menu['id']],
                                'mark'   => 'js_mark_class',
                                'size'   => ['70%', '80%'],
                                'jump'   => 0,
                                'type'   => 'button'
                            ]);
            $buttons .= BA([
                               'title'  => '<i class="fa fa-pencil"></i>',
                               'route'  => 'articleCategory.edit',
                               'class'  => 'btn btn-primary btn-xs j_edit_class',
                               'slug'   => 'admin.articleCategory.edit',
                               'params' => ['id' => $menu['id']],
                               'mark'   => 'js_mark_class',
                               'size'   => ['70%', '80%'],
                               'jump'   => 0,
                               'type'   => 'button'
                           ]);
            if (empty($menu['_child'])) {
                $buttons .= BA([
                                   'title'  => '<i class="fa fa-trash"></i>',
                                   'route'  => 'articleCategory.destroy',
                                   'slug'   => 'admin.articleCategory.destroy',
                                   'params' => ['id' => $menu['id']],
                                   'class'  => 'btn btn-danger btn-xs j_destroy_class',
                                   'mark'   => 'js_mark_class',
                                   'size'   => ['70%', '80%'],
                                   'jump'   => 0,
                                   'type'   => 'button',
                               ]);
            }
        } else {
            $buttons .= BA([
                               'title'  => '<i class="fa fa-pencil"></i>',
                               'route'  => 'articleCategory.edit',
                               'class'  => 'btn btn-primary btn-xs j_edit_class',
                               'slug'   => 'admin.articleCategory.edit',
                               'params' => ['id' => $menu['id']],
                               'mark'   => 'js_mark_class',
                               'size'   => ['70%', '80%'],
                               'jump'   => 0,
                               'type'   => 'button'
                           ]);
            $buttons .= BA([
                               'title'  => '<i class="fa fa-trash"></i>',
                               'route'  => 'articleCategory.destroy',
                               'class'  => 'btn btn-danger btn-xs j_destroy_class',
                               'slug'   => 'admin.articleCategory.destroy',
                               'params' => ['id' => $menu['id']],
                               'mark'   => 'js_mark_class',
                               'size'   => ['70%', '80%'],
                               'jump'   => 0,
                               'type'   => 'button',
                           ]);
        }
        $buttons .= '</div>';

        return $buttons;
    }

    /**
     * 获取顶级分类
     *
     * @return string
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2018年01月29日19:38:56
     */
    public function getParentCategory()
    {
        $categories = ArticleCategory::where('parent_id', 0)->orderBy('id', 'desc')->get()->toArray();
        $option = '<option value="0">一级菜单</option>';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $option .= "<option value=" . $category['id'] . ">" . $category['name'] . "</option>";
            }
        }

        return $option;
    }
}