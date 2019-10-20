
<a href="#!" class="menu-toggle">
    <i class="fas fa-bars"></i>
</a>
<a href="#!" class="searchbox-toggle">
    <i class="fas fa-search"></i>
</a>

<div class="tools">
    <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="tools-item">
        <i class="fab fa-github"></i>
    </a>
    <a href="#!" class="tools-item">
        <i class="fas fa-bell"></i>
        <i class="tools-item-count">4</i>
    </a>
    <div class="dropdown tools-item">
        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="#!">Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>

        </div>

    </div>
</div>
