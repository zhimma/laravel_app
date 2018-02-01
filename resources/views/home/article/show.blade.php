@extends('home.layout.layout')

@section('content')
    <style>
        img{
            width: 800px;
        }
    </style>
<div id="fh5co-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-padded-right">
                <div class="row">
                    <div class="col-md-12">
                            <div class="fh5co-blog animate-box">
                                <div class="title title-pin text-center">
                                    <span class="posted-on">Nov. 15th 2016</span>
                                    <h3><a href="{{route('home.article',['id'=>$article['id']])}}">{{ $article['title'] }}</a></h3>
                                    <span class="category">Lifestyle</span>
                                </div>
                                <a href="{{url('/article/')}}"><img class="img-responsive"  src="{{ asset('home/images/blog-1.jpg') }}" alt=""></a>
                                <div class="col-md-12">
                                    {!! $article['content'] !!}
                                </div>
                            </div>
                    </div>

                </div>
            </div>
            @include('home.layout.sidebar')
        </div>
    </div>
</div>
@endsection