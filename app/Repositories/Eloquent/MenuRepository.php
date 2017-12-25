<?php

namespace App\Repositories\Eloquent;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Container\Container as App;

class  MenuRepository extends BaseRepository
{

    public function model()
    {
        return Menu::class;
    }

    /**
     * 菜单排序和缓存
     *
     * @return mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月25日21:53:38
     */
    public function sortMenuAndCache()
    {
        $allMenus = Menu::orderBy('sort','asc')->get()->toArray();
        if(!empty($allMenus)){
            $allMenus = list_to_tree_key($allMenus,'id','parent_id');
            foreach ($allMenus as $key => &$value){
                if($value['_child']){
                    $sort = array_column($value['_child'],'sort');
                    array_multisort($sort,SORT_ASC,$value['_child']);
                }
            }
        }
        Cache::forever('menus',$allMenus);
        return $allMenus;

    }

    /**
     * 获取刷新菜单缓存
     * @param bool $clear
     *
     * @return mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月25日22:37:53
     */
    public function refreshAndGetAllMenus($clear = false)
    {
        if($clear){
            Cache::forget('menus');
            return $this->sortMenuAndCache();
        }else{
            if(Cache::has('menus')){
                return Cache::get('menus');
            }else{
                return $this->sortMenuAndCache();
            }
        }
    }

}