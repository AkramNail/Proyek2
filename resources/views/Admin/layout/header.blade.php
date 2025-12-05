<style>
    /* Header */
    .header-ukm {
        width: 100%;
        background-color: #4aa3ff;
        padding: 8px 20px;
        display: flex;
        align-items: center;
    }

    .header-ukm img {
        height: 85px;
        margin-right: 15px;
    }

    .header-title {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .header-title .title-top {
        background-color: #1f56a1;
        color: white;
        padding: 3px 12px;
        font-size: 18px;
        border-radius: 6px;
        width: fit-content;
        font-weight: 600;
    }

    .header-title .title-bottom {
        color: #1c3e67;
        font-size: 28px;
        font-weight: 700;
        margin-left: 5px;
        margin-top: -3px;
    }
</style>

<div class="header-ukm">
    
    <a href="{{ url('/profil') }}">
        <img src="{{ asset('storage/Image/Layout/LogoNav.png') }}">
    </a>

    <!-- Tombol dipaksa ke kanan pakai ms-auto -->
    <a href="{{ url('/profil') }}" class="btn btn-light ms-auto">
        {{ auth()->user()->nama ?? 'Nama Pengurus' }}
    </a>
</div>
