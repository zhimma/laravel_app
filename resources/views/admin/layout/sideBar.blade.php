<div class="menu_section">
    <h3>菜单</h3>
    <ul class="nav side-menu">
        @inject('menuPresenter','App\Repositories\Presenter\MenuPresenter')
        {!! $menuPresenter->sideBarMenuList($menuList) !!}
    </ul>
</div>