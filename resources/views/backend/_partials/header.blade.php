<header class="main-header">
    <a href="/backend" class="logo">
        <span class="logo-mini"><b>M</b></span>
        <span class="logo-lg"><b>Phụ tùng </b> {{ trans('repositories.locale') }}</span>
    </a>


    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a target="_blank" href="/">{{ trans('repositories.home') }}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('repositories.locale') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('backend.locale', 'vi') }}">Tiếng việt</a></li>
                        <li><a href="{{ route('backend.locale', 'en') }}">English</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        @if ($countNotifyGlobal = count($me->receiverNotificationsNotRead))<span class="label label-warning">{{$countNotifyGlobal}}</span>@endif
                    </a>
                    @if ($countNotifyGlobal)
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$countNotifyGlobal}} notifications</li>
                        <li>
                            <ul class="menu">
                                @foreach ($me->receiverNotificationsNotReadLimit as $notifyGlobal)
                                <li>
                                    <a class="update-notify" href="{{$notifyGlobal->url}}" data-id="{{$notifyGlobal->id}}" title="{{$notifyGlobal->text}}">
                                        <i class="fa {{$notifyGlobal->icon}} text-aqua"></i> {{$notifyGlobal->text}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                    @endif
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{str_limit($me->name,10)}}</a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{!!($me->image) ? route('image',$me->image_thumbnail) : asset('assets/img/backend/avatar.png')!!}" class="img-circle">
                            <p>{{$me->email}}<small>{{$me->name}}</small></p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('backend.profile')}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                              <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
