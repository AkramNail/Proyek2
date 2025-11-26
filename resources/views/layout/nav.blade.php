<style>
    /* Background putih dan full width */
    .custom-navbar {
        background-color: #ffffff !important;
        padding: 10px 20px;
        border-bottom: 2px solid #e3e3e3;
    }

    /* Warna teks normal */
    .custom-navbar .nav-link {
        color: #000 !important;
        font-weight: 600;
        margin-left: 25px;
        font-size: 17px;
    }

    /* Hover */
    .custom-navbar .nav-link:hover {
        color: #0D4C92 !important;
    }

    /* ACTIVE MENU sesuai gambar */
    .custom-navbar .nav-link.active {
        background-color: #6c8fbf;
        color: white !important;
        border-radius: 8px;
        padding: 6px 15px;
    }

    /* Navbar collapse ke kanan */
    .navbar-nav {
        margin-left: auto;
    }
</style>


<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">

        <!-- Logo -->
        <a href="/home" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('storage/Image/Layout/LogoNav.png') }}" 
                 style="height:60px; object-fit:contain;">
        </a>

        <!-- Mobile button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'home') ? 'active' : '' }}" href="/home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'daftar ukm') ? 'active' : '' }}" href="/daftarUKM">Daftar UKM</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'daftar berita') ? 'active' : '' }}" href="/daftarBerita">Berita</a>
                </li>

                @if (Auth::check() && Auth::user()->role === 'pengurus')
                    <li class="nav-item">
                        <a class="nav-link" href="/pengurus/daftarAnggota">Pengurus</a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/pengurus/daftarAnggota">Admin</a>
                    </li>
                @endif

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ ($slug === 'profil') ? 'active' : '' }}" href="/profil">
                            {{ Auth::user()->nama }}
                        </a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ ($slug === 'login') ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                @endguest

            </ul>
        </div>

    </div>
</nav>
