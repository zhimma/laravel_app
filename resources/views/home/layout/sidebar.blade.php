<aside id="sidebar">
    <div class="col-md-3">
        <div class="side animate-box">
            <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                <h2><span>about me</span></h2>
            </div>
            <div class="fh5co-staff">
                <img src="{{ asset("home/images/user-2.jpg") }}" alt="Free HTML5 Templates by FreeHTML5.co">
                <h3>马雄飞</h3>
                <strong class="role">PHP development engineer </strong>
                {{--<p>Quos quia provident conse culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita.</p>--}}
                <ul class="fh5co-social-icons">
                    <li><a href="https://github.com/zhimma"><i class="icon-github"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="side animate-box">
            <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                <h2><span>Latest Posts</span></h2>
            </div>
            <div class="blog-entry">
                <a href="#">
                    <img src="{{ asset('home/images/blog-1.jpg') }}" class="img-responsive" alt="">
                    <div class="desc">
                        <span class="date">Dec. 25, 2016</span>
                        <h3>Most Beautiful Site in 2016</h3>
                    </div>
                </a>
            </div>
            <div class="blog-entry">
                <a href="#">
                    <img src="{{ asset('home/images/blog-2.jpg') }}" class="img-responsive" alt="">
                    <div class="desc">
                        <span class="date">Dec. 25, 2016</span>
                        <h3>Most Beautiful Site in 2016</h3>
                    </div>
                </a>
            </div>
            <div class="blog-entry">
                <a href="#">
                    <img src="{{ asset('home/images/blog-1.jpg') }}" class="img-responsive" alt="">
                    <div class="desc">
                        <span class="date">Dec. 25, 2016</span>
                        <h3>Most Beautiful Site in 2016</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="side animate-box">
            <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                <h2><span>Category</span></h2>
            </div>
            <ul class="category">
                @foreach($categories as $category)
                    <li><a href="{{ route('home.category',['id'=>$category['id']]) }}"><i class="icon-check"></i>{{ $category['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
        {{--<div class="side animate-box">
            <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                <h2><span>Intagram</span></h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="insta" style="background-image: url(images/insta-1.jpg);">

                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</aside>