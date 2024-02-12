<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-6">
                    <div class="footer-info">
                        <h3>Day</h3>
                        <p>
                            {{ $admin->alamat == '' ? '-' : $admin->alamat }}<br><br>
                            <strong>Phone:</strong> {{ $admin->number }}<br>
                            <strong>Email:</strong> {{ $admin->email }}<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://api.whatsapp.com/send?phone={{ $admin->number }}" class="instagram"><i
                                    class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a class="nav-link scrollto"
                                href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#hero' : '#hero' }}"><i class="bx bx-chevron-right"></i> Home</a>
                        </li>
                        <li><a class="nav-link scrollto"
                                href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#about' : '#about' }}"><i class="bx bx-chevron-right"></i> About</a>
                        </li>
                        <li><a class="nav-link scrollto"
                                href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#kamarcheck' : '#kamarcheck' }}"><i class="bx bx-chevron-right"></i> Kamar</a>
                        </li>
                        <li><a class="nav-link scrollto"
                                href="{{ Str::startsWith(request()->route()->getName(), 'profile') ? route('home').'#contact' : '#contact' }}"><i class="bx bx-chevron-right"></i> Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Day</span></strong>. All Rights Reserved. Regards,
            <strong>RuanginTech</strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->