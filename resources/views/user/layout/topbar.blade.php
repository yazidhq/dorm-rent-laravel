<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a href="{{ $admin->email }}">{{ $admin->email }}</a>
            <i class="bi bi-phone-fill phone-icon"></i> {{ $admin->number }}
        </div>
        <div class="social-links d-none d-md-block">
            <a href="{{ $page->twitter }}" class="twitter" target="__blank"><i class="bi bi-twitter"></i></a>
            <a href="{{ $page->facebook }}" class="facebook" target="__blank"><i class="bi bi-facebook"></i></a>
            <a href="{{ $page->instagram }}" class="instagram" target="__blank"><i class="bi bi-instagram"></i></a>
            <a href="https://api.whatsapp.com/send?phone={{ $admin->number }}" target="__blank"><i class="bi bi-whatsapp"></i></a>
        </div>
    </div>
</section>