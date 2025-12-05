

  <style>
    /* styling sidebar */
    .sidebar {
      min-height: 100vh;
      background-color: #202020;
    }
    .sidebar .nav-link {
      color: #fff;
      padding: 10px 16px;
    }
    .sidebar .nav-link.active {
      background-color: #343a40;
      border-radius: 6px;
      color: #fff !important;
    }

    /* PENTING: jangan override .collapse display di CSS global */
    /* Jangan pakai .collapse { display:block !important } atau sejenisnya */

    /* opsional: agar konten tidak tertutup ketika sidebar collapse di mobile */
    @media (max-width: 767.98px) {
      main.content-area { padding-top: 1rem; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR MOBILE: tombol collapse muncul hanya di < md -->
  <nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse"
              data-bs-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand ms-2" href="#">E-UKM</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <!-- SIDEBAR:
           - "collapse" => Bootstrap will hide on small screens
           - "d-md-block" => force visible from md and up
           IMPORTANT: jangan tambahkan d-none karena akan override .show -->
      <nav id="sidebarMenu" class="col-md-2 col-lg-2 collapse d-md-block sidebar p-0">
        <div class="bg-primary p-3 text-center fw-bold fs-4">E-UKM</div>

        <ul class="nav flex-column mt-2">
          <li class="nav-item">
            <a class="nav-link {{ ($slug === 'Daftar akun') ? 'active' : '' }}" href="/admin/daftarAkun">Daftar akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($slug === 'Daftar berita') ? 'active' : '' }}" href="/admin/daftarBerita">Daftar berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($slug === 'Daftar UKM') ? 'active' : '' }}" href="/admin/daftarUKM">Daftar UKM</a>
          </li>
        </ul>
      </nav>

      <!-- MAIN CONTENT -->
      <main class="col-md-10 col-lg-10 content-area p-4">
          @yield('content')
      </main>

    </div>
  </div>
