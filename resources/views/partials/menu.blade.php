<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <img src="{{ asset('images/Laravel.png') }}" style="width:13%;margin-left:40px;"
                    alt="">&nbsp;
                <span class="text-xl pl-2">{{ config('app.name', 'Laravel') }}</span>
        </div>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="dashboard">
                <i class="cil-home"></i>&nbsp; Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-title">MENU</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('users.index')}}">
                <i class="cil-people"></i>&nbsp; Users
            </a>
        </li>
    </ul>
</div>
