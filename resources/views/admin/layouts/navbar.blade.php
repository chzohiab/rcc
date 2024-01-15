<div class="topbar">
    <div class="topbar-left">
        <h2>RCC</h2>
    </div>
    <div class="topbar-right">
        <ul class="topbar-menu">
            @guest('admin')
                <!-- Show login link when user is not logged in -->
                <a href="{{ route('admin.login') }}">Login</a>
            @else
                <!-- Show user information and logout when user is logged in -->
                <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::guard('admin')->user()->name }}
                </div>
                <ul class="dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <a :href="route('admin.logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            @endguest
        </ul>
    </div>
</div>
