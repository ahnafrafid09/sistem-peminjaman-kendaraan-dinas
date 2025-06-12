<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-4">
    <div class="container-fluid">
        <button class="navbar-toggler" id="navbarToggle" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapseContent" aria-controls="navbarCollapseContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapseContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-none">
                @include('partials.navbar-links')
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->profile_photo_url ?? 'https://avatar.iran.liara.run/public/37' }}"
                            alt="Profile" class="rounded-circle" width="32" height="32"
                            style="object-fit: cover;">
                        <span>{{ auth()->user()->username }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            @php
                                $role = Auth()->user()->role;
                            @endphp
                            @if ($role === 'super_admin')
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
                            @elseif ($role === 'kepala_unit')
                                <a class="dropdown-item" href="{{ route('kepala-unit.profile') }}">Profile</a>
                            @elseif ($role === 'pegawai')
                                <a class="dropdown-item" href="{{ route('pegawai.profile') }}">Profile</a>
                            @endif
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>
