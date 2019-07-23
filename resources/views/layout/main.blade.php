@include('layout.head')
<div class="app app--{{ $route }} {{ $route }}">

    @if(View::hasSection('navigation'))
        <nav class="nav">
            @yield('navigation')
        </nav>
    @endif
    <div class="app-content app-content--{{ $route }} {{ $route }}-content">
        @yield('content')
    </div>
</div>
@include('layout.footer')
