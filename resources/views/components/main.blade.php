<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Site</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        {{-- Navigation bar --}}
        <nav class="navbar is-primary has-text-white">
            <div class="container">
                <div class="navbar-brand">
                    <a href="/" class="navbar-item">
                        <strong>My Site</strong>
                    </a>
                </div>
                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start">
                        <a href="{{ route('categories.index') }}"
                           class="navbar-item {{ request()->route()->getName() === 'categories.index' ? "is-active" : "" }}">
                            Categories
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        {{ $slot }}
    </body>
</html>
