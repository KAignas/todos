<span class="nav-btn nav-btn--hamburger">
    @svg('img/hamburger.svg')
</span>

<div class="nav-menu">
    <span class="nav-menu-close">@svg('img/close.svg')</span>

    <div class="flex direction-col items-center nav-user">
        <div class="avatar avatar--60">
            @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
            @endif
        </div>
        <div class="w-full text-white ml-5">
            <span class="text-2xl nav-user-name">{{ auth()->user()->name }}</span><br>
            <span class="text-sm mt-2 nav-user-email opacity-75">{{ auth()->user()->email }}</span>
        </div>
    </div>

    <ul class="nav-menu-links mt-12">
        <li class="nav-menu-links__link"><a href="{{ route('home') }}">Home</a></li>
        <li class="nav-menu-links__link"><a href="{{ route('event.create') }}">Add Event</a></li>
        <li class="nav-menu-links__link"><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>

<h3 class="nav-title">
    @yield('title', config('app.name'))
</h3>
<a href="{{ route('event.create') }}" class="nav-btn nav-btn--add">
    @svg('img/add.svg')
</a>
