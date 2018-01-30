<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleCategoryRequest;
use App\Repositories\Eloquent\ArticleCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleCategoryController extends Controller
{
    protected $articleCategory;

    public function __construct(ArticleCategoryRepository $articleCategory)
    {
        $this->articleCategory = $articleCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articleCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(ArticleCategoryRequest $request)
    {
        $res = $this->articleCategory->create($request->input());
        if ($res) {
            return ['status' => 1, 'msg' => '新增成功'];
        } else {
            return ['status' => 0, 'msg' => '新增失败'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 编辑
     * @param $id
     *
     * @return array
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月29日19:57:22
     */
    public function edit($id)
    {
        $category = $this->articleCategory->find($id);
        $category->url = route('articleCategory.update',['id' => $id]);
        if (!empty($category)) {
            return response()->json(['status' => 1, 'data' =>$category]);
        } else {
            return response()->json(['status' => 0 ,'msg' => '获取数据失败']);
        }
    }


    public function update(ArticleCategoryRequest $request, $id)
    {
        $res = $this->articleCategory->update($request->input(), $id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    /**
     * 删除分类
     * @param $id
     *
     * @return array
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月30日18:25:12
     */
    public function destroy($id)
    {
        $res = $this->articleCategory->delete($id);
        if ($res) {
            return ['status' => 1, 'msg' => '删除成功'];
        } else {
            return ['status' => 0, 'msg' => '删除失败'];
        }
    }
}
