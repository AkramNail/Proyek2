
<style>
    .footer-bg {
        background: url("{{ asset('storage/Image/Layout/banner-polindra.png') }}") center/cover no-repeat;
        color: white;
        position: relative;
    }

    .footer-overlay {
        background: rgba(0, 0, 0, 0.4);
        padding: 40px 0;
    }

    .footer-bottom {
        background-color: #0D4C92;
        color: white;
        padding: 10px 0;
        text-align: center;
        font-size: 14px;
    }
</style>

<!-- FOOTER SECTION -->
<div class="footer-bg">
    <div class="footer-overlay">
        <div class="container-fluid p-3 ps-5 pe-5">
            <div class="row">

                <!-- Logo + Deskripsi -->
                <div class="col-md-6 d-flex">

                    <div>
                        <img src="{{ asset('storage/Image/Layout/LogoNav.png') }}" 
                         style="width:250px; height:auto; margin-right:20px;">
                        <p style="font-size:16px; margin-top:10px; width:450px;">
                            Pembelajaran di politeknik yang fokus pada praktik di dunia kerja. 
                            Mahasiswa belajar langsung di industri, sehingga lebih siap bekerja setelah lulus.
                        </p>
                    </div>
                </div>

                <!-- Peta Lokasi -->
                <div class="col-md-6 text-end">
                    <h5 class="mb-3" style="font-weight: bold;">PETA LOKASI</h5>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15859.561462733636!2d108.282904!3d-6.408122!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb87d1fcaf97d%3A0x4fc15b3c8407ada4!2sIndramayu%20State%20Polytechnic!5e0!3m2!1sen!2sus!4v1763802522848!5m2!1sen!2sus" 
                        width="300" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>


                </div>

            </div>
        </div>
    </div>
</div>

<!-- COPYRIGHT -->
<div class="footer-bottom">
    Copyright © {{ date('Y') }} E-UKM Polindra
</div>
