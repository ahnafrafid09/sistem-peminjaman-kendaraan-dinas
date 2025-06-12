<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMKD - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    @include('partials.sidebar')

    <div class="d-flex flex-column flex-lg-row" style="min-height: 100vh;">
        <div class="flex-grow-1" id="mainContent">
            {{-- Navbar --}}
            @include('partials.navbar')

            {{-- Main content --}}
            <main class="p-4">
                <h2>@yield('title')</h2>
                <div class="mt-5">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @stack('scripts')
    <script>
        document.getElementById('resetButton').addEventListener('click', function() {
            document.getElementById('form').reset();
        });
    </script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        const mainContent = document.getElementById('mainContent');

        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('d-none');
            });
        }
    </script>
    @if (Auth::check() && Auth::user()->isKepalaUnit())
        <div id="notification-area" class="position-fixed top-0 end-0 p-3" style="z-index: 1055;"></div>

        <script type="module">
            window.Echo = new Echo({
                broadcaster: 'reverb',
                key: '{{ env('VITE_REVERB_APP_KEY') }}',
                host: window.location.hostname,
            });

            Echo.private(`notifikasi.{{ auth()->id() }}`)
                .listen('.peminjaman.baru', (e) => {
                    const area = document.getElementById('notification-area');
                    const alert = document.createElement('div');
                    alert.className = 'alert alert-info alert-dismissible fade show shadow mb-2';
                    alert.setAttribute('role', 'alert');
                    alert.innerHTML = `
                    <strong>📩 Notifikasi:</strong> ${e.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                    area.appendChild(alert);

                    setTimeout(() => {
                        const alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                        alertInstance.close();
                    }, 5000);
                });
        </script>
    @endif
    {{-- <script>
        function updateNavbarToggleVisibility() {
            const sidebar = document.getElementById('sidebar');
            const navbarToggle = document.getElementById('navbarToggle');

            const isSidebarVisible = window.getComputedStyle(sidebar).display !== 'none';

            if (window.innerWidth < 992 && !isSidebarVisible) {
                navbarToggle.style.display = 'block';
            } else {
                navbarToggle.style.display = 'none';
            }
        }

        window.addEventListener('resize', updateNavbarToggleVisibility);
        window.addEventListener('DOMContentLoaded', updateNavbarToggleVisibility);
    </script> --}}
</body>

</html>
