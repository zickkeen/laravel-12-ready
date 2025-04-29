<!-- Topbar -->
<div class="topbar">
    <div><i class="fas fa-network-wired me-2"></i>{{ config('app.name', 'InfraSys') }}</div>
    @auth
        <a href="/user/profile">
            <div class="user-info d-flex align-items-center">
                <div class="avatar">
                    <img src="{{ Auth::user()->avatar_url ?? asset('/storage/avatars/default.png') }}"
                        class="rounded-circle mb-2" width="32" height="32" alt="Avatar">
                </div>
                <div class="username">Hai, {{ Auth::user()->name }}</div>
            </div>
        </a>
    @endauth
</div>
