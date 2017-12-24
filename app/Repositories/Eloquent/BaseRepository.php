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
abstract class BaseRepository implements RepositoryInterface
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
     *
     * @return mixed
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date   2017年12月14日14:25:41
     */
    public abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {

        $results = $this->model->all($columns);

        return $this->parserResult($results);
    }

    /**
     * 保存数据
     * @param array $attributes
     *
     * @return mixed
     * @throws RepositoryException
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月24日23:47:14
     */
    public function create(array $attributes)
    {
        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * 重置model
     * @throws RepositoryException
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2017年12月24日23:46:30
     */
    public function resetModel()
    {
        $this->makeModel();
    }

    /**
     * Wrapper result data
     *
     * @param mixed $result
     *
     * @return mixed
     */
    public function parserResult($result)
    {
        return $result;
    }

}