<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tasks for Today') | Tasks for Today</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('today') }}">Tasks for Today</a>
            <nav aria-label="Main navigation">
                <a class="{{ request()->routeIs('today') ? 'active' : '' }}" href="{{ route('today') }}" @if(request()->routeIs('today')) aria-current="page" @endif>Today</a>
                <a class="{{ request()->routeIs('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}" @if(request()->routeIs('tasks.index')) aria-current="page" @endif>All tasks</a>
                <a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}" @if(request()->routeIs('profile')) aria-current="page" @endif>Profile</a>
                <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
            </nav>
        </div>
    </header>
    <main class="container main-content">
        @yield('content')
    </main>
    <footer class="site-footer">
        <div class="container">Tasks for Today · A small task tracker built with Laravel.</div>
    </footer>
</body>
</html>
