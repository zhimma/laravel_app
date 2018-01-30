<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2018/1/30 下午9:22
 */

namespace App\Http\ViewComposers;
use App\Repositories\Eloquent\ArticleCategoryRepository;
use Illuminate\View\View;

/**
 *
 *
 * @package App\Http\ViewComposers
 */
class CategoryComposer
{
    protected $category;

    public function __construct(ArticleCategoryRepository $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories',$this->category->getCategory());
    }
}