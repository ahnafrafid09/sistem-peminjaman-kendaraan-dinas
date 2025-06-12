@php
    $user = auth()->user();
    $userRole = $user->role ?? null;

    $prefix = match ($userRole) {
        'super_admin' => 'admin',
        'kepala_unit' => 'kepala-unit',
        'pegawai' => 'pegawai',
        default => '',
    };
    $links = [
        [
            'label' => 'Dashboard',
            'name' => 'dashboard.*',
            'role' => ['super_admin', 'kepala_unit', 'pegawai'],
            'icon' => 'fas fa-tachometer-alt',
        ],
        [
            'label' => 'Tambah User',
            'name' => 'create-user',
            'role' => ['super_admin'],
            'icon' => 'fas fa-user-plus',
        ],
        [
            'label' => 'Kelola Jurusan',
            'name' => 'jurusan.*',
            'role' => ['super_admin'],
            'icon' => 'fas fa-graduation-cap',
        ],
        [
            'label' => 'Kelola Prodi',
            'name' => 'prodi.*',
            'role' => ['super_admin'],
            'icon' => 'fas fa-graduation-cap',
        ],
        [
            'label' => 'Kelola Lokasi',
            'name' => 'lokasi.*',
            'role' => ['super_admin'],
            'icon' => 'fas fa-location-dot',
        ],
        [
            'label' => 'Kelola Kendaraan',
            'name' => 'kendaraan.*',
            'role' => ['super_admin'],
            'icon' => 'fas fa-car',
        ],
        [
            'label' => 'Peminjaman',
            'name' => 'peminjaman.*',
            'role' => ['kepala_unit', 'pegawai'],
            'icon' => 'fas fa-clipboard-list',
        ],
        [
            'label' => 'Pengembalian',
            'name' => 'pengembalian.*',
            'role' => ['kepala_unit', 'pegawai'],
            'icon' => 'fas fa-exchange-alt',
        ],
        [
            'label' => 'Aktivitas',
            'name' => 'aktivitas.*',
            'role' => ['kepala_unit', 'pegawai'],
            'icon' => 'fas fa-chart-line',
        ],
    ];
@endphp


@foreach ($links as $link)
    @if (in_array($userRole, $link['role']))
        @php
            $routeName = $prefix . '.' . $link['name'];
            $isActive = request()->routeIs($routeName);
        @endphp
        <li class="nav-item mt-2">
            <a href="{{ route(str_replace('.*', '.index', $routeName)) }}"
                class="nav-link p-2 text-black text-uppercase {{ $isActive ? 'bg-secondary text-white' : '' }}">
                <i class="{{ $link['icon'] }} me-2"></i>{{ $link['label'] }}
            </a>
        </li>
    @endif
@endforeach
