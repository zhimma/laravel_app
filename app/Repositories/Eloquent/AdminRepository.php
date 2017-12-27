<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/14 15:13
 */

namespace App\Repositories\Eloquent;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
class AdminRepository extends BaseRepository
{
    public function model()
    {
       return "App\Models\Admin";
    }
}