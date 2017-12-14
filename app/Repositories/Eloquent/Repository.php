<?php
/**
 * @author 马雄飞 <xiongfei.ma@pactera.com>
 * @date   2017/12/14 14:21
 */

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @package App\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface
{
    private $app;
    private $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * 定义一个抽象方法model(),强制继承类中实现该方法
     * 用来获取当前操作类对应的模型
     * @return mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月14日14:25:41
     */
    public abstract function model();

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        dd($this->app);
        if(!$model instanceof Model)
        {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
}