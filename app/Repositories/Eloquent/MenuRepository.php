<?php

namespace App\Repositories\Eloquent;
use App\Models\Menu;
use function Psy\debug;

class  MenuRepository extends BaseRepository
{
    public function model()
    {
        return Menu::class;
    }

    public function sortMenu($menus,$pid = 0)
    {
        $arr = [];
        if(empty($menus)){
            return '';
        }
        foreach ($menus as $key => &$value){
            if($value['parent_id'] == $pid){
                $arr[$key] = $value;
                $arr[$key]['child']  = self::sortMenu($menus,$value['id']);
            }
        }
        return $arr;
    }

}