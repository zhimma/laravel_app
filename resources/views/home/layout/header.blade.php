<nav class="fh5co-nav" role="navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text-left menu-1">
                            <ul>
                                @foreach($navigate as  $data)
                                    <li @if(url()->current() == $data['url']) class="active" @endif><a href="{{ $data['url'] }}">{{ $data['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        {{--<div class="col-sm-5">
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                                <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin-with-circle"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center menu-2">
                <div id="fh5co-logo">
                    <h1>
                        <a href="{{ route('home.index') }}">
                            芝麻开门<span>.</span>
                            <small></small>
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</nav>
