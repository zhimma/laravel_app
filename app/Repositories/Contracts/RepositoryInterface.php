<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/14 12:22
 */

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * 获取所有
     * @param array $columns
     *
     * @return mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月14日12:23:42
     */
    public function all($columns = array('*'));
}