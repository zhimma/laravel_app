<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/28 下午3:39
 */
namespace App\Http\ViewComposers;
use App\Repositories\Eloquent\MenuRepository;
use Illuminate\View\View;

/**
 *
 *
 * @package App\ViewComposers
 */
class MenuComposer
{
    protected $menu;

    /**
     * MenuComposer constructor.
     *
     * @param MenuRepository $menu
     */
    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     *
     * @param View $view
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月28日15:44:25
     */
    public function compose(View $view){
        $view->with('menuList',$this->menu->refreshAndGetAllMenus());
    }
}