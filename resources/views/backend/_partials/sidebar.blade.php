<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!!($me->image) ? route('image',$me->image_thumbnail) : asset('assets/img/backend/avatar.png')!!}" class="img-circle">
            </div>
            <div class="pull-left info">
                <p>{{str_limit($me->name,15)}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li @if (Request::is('backend')) class="active" @endif>
                <a href="/backend">
                    <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
                </a>
            </li>
            @can('product-read')
            <li class="treeview @if (Request::is('backend/product*') || Request::is('backend/category/type/product*') || Request::is('backend/category/type/accessary*') || Request::is('backend/property*')) active @endif">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @can('category-read')
                    <li @if (Request::is('backend/category/type/product*')) class="active" @endif><a href="{{route('backend.category.type','product')}}"><i class="fa fa-circle-o"></i> Danh mục thiết bị</a></li>
                    @endcan
                    @can('product-read')
                    <li @if (Request::is('backend/product/type/product*')) class="active" @endif><a href="{{route('backend.product.type', 'product')}}"><i class="fa fa-circle-o"></i> Thiết bị</a></li>
                    @endcan
                    @can('category-read')
                    <li @if (Request::is('backend/category/type/accessary*')) class="active" @endif><a href="{{route('backend.category.type','accessary')}}"><i class="fa fa-circle-o"></i> Danh mục phụ tùng</a></li>
                    @endcan
                    @can('product-read')
                    <li @if (Request::is('backend/product/type/accessary*')) class="active" @endif><a href="{{route('backend.product.type', 'accessary')}}"><i class="fa fa-circle-o"></i> Phụ tùng </a></li>
                    @endcan
                    @can('property-read')
                    <li @if (Request::is('backend/property*')) class="active" @endif><a href="{{route('backend.property.index')}}"><i class="fa fa-circle-o"></i> Thuộc tính</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('page-read')
            <li @if (Request::is('backend/page*')) class="active" @endif>
                <a href="{{route('backend.page.index')}}">
                    <i class="fa fa-file-text-o"></i> <span>Trang</span>
                </a>
            </li>
            @endcan
            @can('post-read')
            <li class="treeview @if (Request::is('backend/post*') || Request::is('backend/category/type/post*')) active @endif">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Bài viết</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @can('category-read')
                    <li @if (Request::is('backend/category/type/post*')) class="active" @endif><a href="{{route('backend.category.type','post')}}"><i class="fa fa-circle-o"></i> Danh mục bài viết</a></li>
                    @endcan
                    @can('post-read')
                    <li @if (Request::is('backend/post*')) class="active" @endif><a href="{{route('backend.post.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="header">Hệ thống</li>
            @can('user-read')
            <li class="treeview @if (Request::is('backend/user*') || Request::is('backend/role*')) active @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Người dùng</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if (Request::is('backend/user*')) class="active" @endif><a href="{{route('backend.user.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    @can('role-read')
                    <li @if (Request::is('backend/role*')) class="active" @endif><a href="{{route('backend.role.index')}}"><i class="fa fa-circle-o"></i> Phân quyền</a></li>
                    @endcan
                </ul>
            </li>
             @endcan
            @can('menu-read')
            <li @if (Request::is('backend/menu*')) class="active" @endif>
                <a href="{{route('backend.menu.index')}}">
                    <i class="fa fa-th-large"></i> <span>Menu</span>
                </a>
            </li>
            @endcan
            @can('config-read')
            <li class="treeview @if (Request::is('backend/config*') || Request::is('backend/slide*') || Request::is('backend/contact*')) active @endif">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Cài đặt</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @can('config-read')
                    <li @if (Request::is('backend/config*')) class="active" @endif><a href="{{route('backend.config.index')}}"><i class="fa fa-circle-o"></i> Cấu hình</a></li>
                    @endcan
                    @can('slide-read')
                    <li @if (Request::is('backend/slide*')) class="active" @endif><a href="{{route('backend.slide.index')}}"><i class="fa fa-circle-o"></i> Slide</a></li>
                    @endcan
                    <li @if (Request::is('backend/contact*')) class="active" @endif><a href="{{route('backend.contact.index')}}"><i class="fa fa-circle-o"></i> Liên hệ</a></li>
                </ul>
            </li>
            @endcan
        </ul>
        
    </section>
</aside>
