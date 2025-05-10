@php
    $user = Auth::user();
    $menus = Auth::guest() ? [
        'Auth' => [
            ['name' => 'Login', 'route' => url('/login'), 'icon' => 'fas fa-sign-in-alt'],
            ['name' => 'Register', 'route' => url('/register'), 'icon' => 'fas fa-user-plus'],
        ],
    ] : [
        'Dashboard' => [
            ['name' => 'Home', 'route' => route('dashboard'), 'icon' => 'fas fa-chart-line'],
        ],
        'Manajemen' => $user && in_array($user->role->value, ['admin', 'supervisor']) ? [
            ['name' => 'User Management', 'route' => url('/users'), 'icon' => 'fas fa-users'],
        ] : [],
        'User' => [
            ['name' => 'Profil', 'route' => url('/user/profile'), 'icon' => 'fas fa-user'],
            ['name' => 'User Cpanel', 'route' => url('/usercpanel'), 'icon' => 'fas fa-server'],
            ['name' => 'Logout', 'route' => url('/logout'), 'icon' => 'fas fa-sign-out-alt'],
        ],
    ];
@endphp

<div class="bg-dark text-white h-100 p-3">
    <div class="text-center mb-4">
        <h5 class="text-white">{{ config('app.name', 'InfraSys') }}</h5>
    </div>

    @foreach ($menus as $section => $items)
        @if (!empty($items))
            <div class="nav-header text-uppercase small mt-3 mb-1">{{ $section }}</div>
            @foreach ($items as $item)
                <a href="{{ $item['route'] }}" class="d-block text-white text-decoration-none px-2 py-2 {{ request()->url() == $item['route'] ? 'bg-secondary rounded' : '' }}">
                    <i class="{{ $item['icon'] ?? 'fas fa-circle' }} me-2"></i>{{ $item['name'] }}
                </a>
            @endforeach
        @endif
    @endforeach
</div>
