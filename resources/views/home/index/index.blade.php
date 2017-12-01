@extends('home/layout/public')
@section('title','首页')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <h3>Thumbnail label</h3>
                                <p>2017年12月1日23:45:52</p>
                            </div>
                            <img src="http://image.youzhan.org/2/ee/6f8bba4cb328d2db91bb14a5b6077.png!thumb" alt="...">
                            <div class="caption text-center">
                                <p>使用范围查询，只需要在我们的方法前面加上 scope 就行，这样就不用去定义静态方法。同时，传入 $query
                                    参数，即已存在的查询。我们只需要在此基础上添加自己想要的查询就可以了。现在，可以方便的使用了</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
