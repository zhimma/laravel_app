<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2018/1/22 上午9:25
 */

namespace App\Http\ViewComposers;
use App\Repositories\Eloquent\NavigateRepository;
use Illuminate\View\View;

/**
 *
 *
 * @package App\Http\ViewComposers
 */
class NavigateComposer
{
    protected  $navigate;

    public function __construct(NavigateRepository $navigate)
    {
        $this->navigate = $navigate;
    }
    /**
     *
     * @param View $view
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月28日15:44:25
     */
    public function compose(View $view){
        $view->with('navigate',$this->navigate->getNavigateForHome());
    }

}