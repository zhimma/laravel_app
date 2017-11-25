@extends("admin/layouts/public")

@section('title','这是页面的title')

@section('sidebar')
    <p>追加侧边栏内容</p>
@endsection

@section('content')
    <p>主内容</p>
    hello {{ $name }}

    @component('admin/layouts/error')
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent
@endsection


