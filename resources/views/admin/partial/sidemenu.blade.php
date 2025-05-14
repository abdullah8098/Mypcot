<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#"><img src="{{ asset('images/oji-logo.png') }}" alt="Logo" srcset=""
                            style="width:100px;height:100px;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                    <li
                        class="sidebar-item {{ request()->is(['join', 'admin/dashboard']) ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                            <span>
                             Dashboard
                            </span>
                        </a>
                    </li>



                <li class="sidebar-item logout-li">
                    <a class='sidebar-link' href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
