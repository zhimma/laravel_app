<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/25 下午9:29
 */

function list_to_tree_key($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    // 创建Tree
    $tree = [];
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = [];
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[$data['id']] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][$data['id']] = &$list[$key];
                }
            }
        }
    }

    return $tree;
}

function BA(array $array = [])
{
    $slug = $array['slug'];
    $route = $array['route'];
    $user = Auth::user();
    if (!$user->can($slug)) {
        return '';
    }
    $jsonData = htmlentities(json_encode($array), ENT_QUOTES, 'UTF-8');
    if ($array['jump']) {
        return "<a href='" . route($route,$array['params']) . "' js_mark_class='" . $array['mark'] . "' class='" . $array['class'] . "' data-json='" . $jsonData . "'>{$array['title']}</a>";
    } else{
        return "<a href='" . route($route,$array['params']) . "' js_mark_class='" . $array['mark'] . "' class='" . $array['class'] . "' data-json='" . $jsonData . "'>{$array['title']}</a>";
    }

}