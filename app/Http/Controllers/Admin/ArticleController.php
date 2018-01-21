<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Repositories\Eloquent\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $article;
    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index');
    }

    public function ajaxGetList(Request $request)
    {
        $return = $this->article->ajaxGetList($request);

        return response()->json($return);
    }

    public function upload(Request $request)
    {
        $folder = 'uploads/article/'.date('Ymd');
        if(!Storage::disk('public')->exists($folder)){
            Storage::makeDirectory($folder);
        }
        $extension = $request->file('article')->getClientOriginalExtension();
        $allowExtension = ["png", "jpg", "gif"];
        if (!($extension && in_array($extension, $allowExtension))) {
            return response()->json(['status' => 0, 'msg' => '文件类型不允许']);
        }
        if ($request->hasFile('article') && $request->file('article')->isValid()) {
            $path = $request->file('article')->store($folder.'/article');

            return response()->json(['status' => 1, 'path' => asset('storage/' .$path)]);
        }
            return response()->json(['status' => 0, 'msg' => '上传错误']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * 保存
     * @param ArticleRequest $request
     *
     * @return array
     * @throws \App\Repositories\Exceptions\RepositoryException
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月21日19:16:33
     */
    public function store(ArticleRequest $request)
    {
        $res = $this->article->create($request->input());
        if ($res) {
            return ['status' => 1, 'msg' => '新增成功'];
        } else {
            return ['status' => 0, 'msg' => '新增失败'];
        }
    }


    public function show($id)
    {
        //
    }

    /**
     * 编辑
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月21日19:45:37
     */
    public function edit($id)
    {
        $data = $this->article->find($id);
        return view('admin.article.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $res = $this->article->update($request->input(), $id);
        if ($res) {
            return ['status' => 1, 'msg' => '修改成功'];
        } else {
            return ['status' => 0, 'msg' => '修改失败'];
        }
    }

    /**
     * 删除
     * @param $id
     *
     * @return array
     *
     * @author 马雄飞 <xiongfei.ma@pactera.com>
     * @date 2018年01月21日21:27:56
     */
    public function destroy($id)
    {
        $this->article->delete($id);
        return ['status' => 1, 'msg' => '文章删除成功'];
    }
}
