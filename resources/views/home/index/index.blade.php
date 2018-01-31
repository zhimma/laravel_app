@extends('home.layout.layout')

@section('content')
<style type="text/css">
    .pagination > li > a, .pagination > li > span {
        position: relative;
        float: left;
        padding: 10px 20px;
        line-height: 1.42857;
        text-decoration: none;
        color: #999999;
        background-color: #fff;
        border: 1px solid #ddd;
        margin-left: -1px;
    }
    .pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus, .pagination > .active > span, .pagination > .active > span:hover, .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        background-color: #777777;
        border-color: #DDDDDD;
        cursor: default;
    }
</style>
<div id="fh5co-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-padded-right">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($articles as $article)
                            <div class="fh5co-blog animate-box">
                                <div class="title title-pin text-center">
                                    <span class="posted-on">Nov. 15th 2016</span>
                                    <h3><a href="{{route('home.article',['id'=>$article['id']])}}">{{ $article['title'] }}</a></h3>
                                    <span class="category">Lifestyle</span>
                                </div>
                                <a href="{{url('/article/')}}"><img class="img-responsive"  src="{{ asset('home/images/blog-1.jpg') }}" alt=""></a>
                                <div class="blog-text text-center">
                                    <ul class="fh5co-social-icons">
                                        <p>{!! strip_tags(htmlspecialchars_decode(str_limit($article['content'],200,"..."))) !!}</p>
                                        {{--<li>Share:</li>
                                        <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                                        <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                        <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-md-12">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
            @include('home.layout.sidebar')
        </div>
    </div>
</div>
@endsection