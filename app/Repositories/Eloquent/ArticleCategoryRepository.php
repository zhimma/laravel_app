<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2018/1/19 下午10:31
 */

namespace App\Repositories\Eloquent;

use App\Models\ArticleCategory;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class ArticleCategoryRepository extends BaseRepository
{
    public function model()
    {
        return ArticleCategory::class;
    }
}