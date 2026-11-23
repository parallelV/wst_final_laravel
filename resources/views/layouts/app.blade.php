<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'GameHub POS' }} - GameHub</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="theme-gta6">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-logo-wrap">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="GameHub logo" onerror="this.style.visibility='hidden'">
            </span>
            <span class="brand-tagline">Thirst for gaming</span>
        </a>

        <button class="sidebar-toggle" id="sidebarToggle" type="button" aria-label="Collapse sidebar" title="Collapse sidebar">
            <span aria-hidden="true">&#9776;</span>
        </button>

        <div class="nav-label">Workspace</div>
        <nav>
            <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <img class="nav-icon" src="{{ asset('images/icons/overview.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Dashboard</span>
            </a>
            <hr>
            <a href="{{ route('sales.create') }}">
                <img class="nav-icon" src="{{ asset('images/icons/checkout.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Record sale</span>
            </a>
            <hr>
            <a class="{{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                <img class="nav-icon" src="{{ asset('images/icons/catalog.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Products</span>
            </a>
            <hr>
            <a class="{{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <img class="nav-icon" src="{{ asset('images/icons/customers.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Customers</span>
            </a>
            <hr>
            <a class="{{ request()->routeIs('staff.*') ? 'active' : '' }}" href="{{ route('staff.index') }}">
                <img class="nav-icon" src="{{ asset('images/icons/staff.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Staff</span>
            </a>
            <hr>
            <a class="{{ request()->routeIs('sales.index') ? 'active' : '' }}" href="{{ route('sales.index') }}">
                <img class="nav-icon" src="{{ asset('images/icons/history.png') }}" alt="" onerror="this.removeAttribute('src')"><span>Sales history</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="user-mini">
                <img
                    class="avatar"
                    src="{{ auth()->user()->avatar ? (str_starts_with(auth()->user()->avatar, 'images/avatars/') ? asset(auth()->user()->avatar) : asset('storage/' . auth()->user()->avatar)) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' }}"
                    alt="{{ auth()->user()->full_name }} avatar"
                >
                <div>
                    <strong>{{ auth()->user()->full_name }}</strong>
                    <small>{{ '@' . auth()->user()->username }}</small>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout"><span aria-hidden="true">&#8617;</span><span>Sign out</span></button>
            </form>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
            <div>
                <span class="eyebrow">{{ now()->format('l, d F Y') }}</span>
                <h1>{{ $heading ?? 'Good day, ' . auth()->user()->full_name }}</h1>
            </div>
            @yield('topbar')
        </div>

        @if (session('success'))
            <div class="flash success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="flash error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="flash error">
                <strong>Please fix the following:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
<script>
    (() => {
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('sidebarToggle');
        const collapsed = localStorage.getItem('gamehub-sidebar-collapsed') === 'true';

        if (collapsed) sidebar.classList.add('collapsed');

        toggle.addEventListener('click', () => {
            const isCollapsed = sidebar.classList.toggle('collapsed');
            localStorage.setItem('gamehub-sidebar-collapsed', isCollapsed);
            toggle.setAttribute('aria-label', isCollapsed ? 'Expand sidebar' : 'Collapse sidebar');
            toggle.setAttribute('title', isCollapsed ? 'Expand sidebar' : 'Collapse sidebar');
        });

    })();
</script>
</html>
