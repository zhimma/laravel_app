<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->avatar }}" alt="">{{ auth()->user()->name }}
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li class="j_user_info">
                        {!! BA([
                            'title'=>'个人资料',
                            'class'=>'',
                            'route' => 'userInfo.edit',
                            'slug' => 'admin.userInfo.edit',
                            'params'=>['id'=>auth()->id()],
                            'mark'=>'js_mark_class',
                            'size' => ['50%','60%'],
                            'jump' => false,
                            'callback'=>'edit_user_info'
                            ]) !!}
                    </li>
                    <li>
                        <a href="javascript:;" class="j_logout">
                        <form action="{{ url('admin/logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                       <i class="fa fa-sign-out pull-right"></i> 退出
                        </a>
                    </li>
                </ul>
            </li>

            {{--<li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                          <span>{{ auth()->user()->name }}</span>
                          --}}{{--<span class="time">3 mins ago</span>--}}{{--
                        </span>
                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <div class="text-center">
                            <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>--}}
        </ul>
    </nav>
</div>

<script>
    seajs.use(['module_js/layout/top'],function (top) {
        top.init()
    })
</script>
