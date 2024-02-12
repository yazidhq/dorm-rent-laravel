@extends('user.layout.template')

@section('content')

@include('user.layout.topbar')

@include('user.layout.navbar')

@include('user.layout.hero')

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                    <img src="{{ asset('storage/profile/' . $admin->avatar) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                    <h3>{{ $page->about }}</h3>
                    <p class="fst-italic" style="text-align:justify;">{{ $page->sub_about }}</p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="box">
                        <span>01</span>
                        <h4>{{ $page->layanan_1 }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
                    <div class="box">
                        <span>02</span>
                        <h4>{{ $page->layanan_2 }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <span>03</span>
                        <h4>{{ $page->layanan_3 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Kamar Section ======= -->
    <section id="kamarcheck" class="pricing">
        <div class="container">

            <div class="section-title">
                <span>Kamar Tersedia</span>
                <h2>{{ $page->kamar }}</h2>
                <p>{{ $page->sub_kamar }}</p>
            </div>

            <div class="row">

                <style>
                    .custom-image {
                        max-width: 100%;
                        height: auto;
                        max-height: 300px;
                        object-fit: cover;
                    }
                </style>
                @foreach ($kamar as $item)
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0 mb-3 data-kamar" data-aos="zoom-in" data-aos-delay="150">
                    <div class="box">
                        <h4><strong>{{ $item->nomor }}</strong></h4>
                        <div class="position-relative">
                            @if($item->gambar->isNotEmpty() && $gambar = $item->gambar->first())
                            <img class="custom-image rounded"
                                src="{{ asset('storage/gambarKamar/' . $gambar->gambar) }}" alt="Kamar Image">
                            @else
                            <img class="custom-image rounded" src="{{ asset('user-assets/img/noimage.jpg') }}"
                                alt="Kamar Image">
                            @endif
                        </div>
                        <ul class="mt-3">
                            <li>Lokasi kamar {{ $item->lokasi == 'lantai1' ? 'Lantai 1' : 'Lantai 2' }}</li>
                        </ul>
                        <strong>
                            <p>Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                        </strong>
                        <div class="btn-wrap">
                            <button class="btn btn-buy {{ $item->status == 'tersedia' ? '' : ' disabled' }}"
                                data-toggle="modal" data-target="#lihatKamar{{ $item->id }}">{!! $item->status ==
                                'tersedia' ? 'Pesan Kamar' : 'Tidak Tersedia' !!}</button>
                        </div>
                    </div>
                </div>
                {{-- modal pemesanan --}}
                <div class="modal fade" id="lihatKamar{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="lihatModalLabel"><strong>DETAIL KAMAR</strong>
                                </h5><strong>
                                    <h3>{{ $item->nomor }}</h3>
                                </strong>
                            </div>
                            <div class="modal-body">
                                <section class="py-1">
                                    <div class="container">
                                        <div class="row gx-5">
                                            <aside class="col-lg-6">
                                                @if($item->gambar->isNotEmpty())
                                                @foreach ($item->gambar as $index => $row)
                                                @if($index === 0)
                                                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                                                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank"
                                                        data-type="image"
                                                        href="{{ asset('storage/gambarKamar/' . $row->gambar) }}">
                                                        <img style="max-width: 100%; max-height: 100vh; margin: auto;"
                                                            class="rounded-4 fit"
                                                            src="{{ asset('storage/gambarKamar/' . $row->gambar) }}"
                                                            alt="Kamar Image">
                                                    </a>
                                                </div>
                                                @endif
                                                @endforeach
                                                <div class="d-flex flex-wrap justify-content-center mb-3">
                                                    @foreach ($item->gambar as $index => $row)
                                                        @if ($index < 5)
                                                            <a data-fslightbox="mygalley" class="border mx-1 rounded-2 mb-2"
                                                                target="_blank" data-type="image"
                                                                href="{{ asset('storage/gambarKamar/' . $row->gambar) }}">
                                                                <img width="60" height="60" class="rounded-2"
                                                                    src="{{ asset('storage/gambarKamar/' . $row->gambar) }}" />
                                                            </a>
                                                        @else
                                                            <br>
                                                            <a data-fslightbox="mygalley" class="border mx-1 rounded-2 mb-2"
                                                                target="_blank" data-type="image"
                                                                href="{{ asset('storage/gambarKamar/' . $row->gambar) }}">
                                                                <img width="60" height="60" class="rounded-2"
                                                                    src="{{ asset('storage/gambarKamar/' . $row->gambar) }}" />
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                
                                                @else
                                                <p>No image uploaded yet</p>
                                                @endif
                                            </aside>

                                            <main class="col-lg-6">
                                                <div class="ps-lg-3">
                                                    <h4 class="title text-dark">
                                                        Kamar {{ $item->nomor }}
                                                    </h4>

                                                    <div class="mb-3">
                                                        <span class="h5">Rp.{{ number_format($item->harga, 0, ',', '.')
                                                            }}</span>
                                                        <span class="text-muted">/Bulan</span>
                                                    </div>

                                                    <div class="row">
                                                        <dt class="col-3">Status</dt>
                                                        <dd class="col-9">{{ $item->status == 'tersedia' ? 'Kamar
                                                            Tersedia' : 'Kamar Sudah Terisi' }}</dd>

                                                        <dt class="col-3">Lokasi</dt>
                                                        <dd class="col-9">{{ $item->lokasi == 'lantai1' ? 'Lantai 1' :
                                                            'Lantai 2' }}</dd>

                                                        <dt class="col-3">Fasilitas</dt>
                                                        <dd class="col-9">{{ $item->fasilitas }}</dd>

                                                        <dt class="col-3">Keterangan</dt>
                                                        <dd class="col-9">{{ $item->keterangan }}</dd>
                                                    </div>

                                                    <hr />

                                                    <div class="row mb-4">
                                                        <form action="{{ route('penyewaan.store') }}" method="POST">
                                                            @csrf
                                                            <input hidden type="text" name="id_kamar"
                                                                value="{{ $item->id }}">
                                                            <input hidden type="text" name="id_user"
                                                                value="{{ auth()->check() ? auth()->user()->id  : '' }}">
                                                            <input hidden type="text" name="status"
                                                                value="Belum Dikonfirmasi">
                                                            <label for="" class="form-label">Tanggal Masuk</label>
                                                            <input type="date" class="form-control mb-3"
                                                                name="tanggal_masuk">
                                                            <label for="" class="form-label">Jangka Sewa</label>
                                                            <select id="" class="form-control" name="jangka_sewa">
                                                                <option hidden value="">Pilih opsi</option>
                                                                <option value="1">1 Bulan</option>
                                                                <option value="2">2 Bulan</option>
                                                                <option value="3">3 Bulan</option>
                                                                <option value="4">4 Bulan</option>
                                                                <option value="5">5 Bulan</option>
                                                                <option value="6">6 Bulan</option>
                                                                <option value="7">7 Bulan</option>
                                                                <option value="8">8 Bulan</option>
                                                                <option value="9">9 Bulan</option>
                                                                <option value="10">10 Bulan</option>
                                                                <option value="11">11 Bulan</option>
                                                                <option value="12">1 Tahun</option>
                                                                <option value="24">2 Tahun</option>
                                                                <option value="36">3 Tahun</option>
                                                            </select>
                                                            <br>
                                                            <div class="d-grid gap-2">
                                                                @if (auth()->check() && auth()->user()->role == 'user')
                                                                <button type="submit" class="btn btn-sm btn-dark">Pesan
                                                                    Sekarang</button>
                                                                @elseif(auth()->check() && auth()->user()->role ==
                                                                'admin')
                                                                <button class="btn btn-sm btn-dark" disabled>Silahkan
                                                                    Login Sebagai User Untuk
                                                                    Melakukan Pemesanan</button>
                                                                @else
                                                                <a href="{{ route('login') }}"
                                                                    class="btn btn-sm btn-dark">Login Untuk Pesan</a>
                                                                @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </main>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="d-grid gap-2 mb-3 mt-3">
                <button id="expandRooms" class="btn btn-danger">Tampilkan Seluruh Kamar</button>
                <a href="#kamarcheck" class="btn-get-started scrollto btn btn-danger" id="hideRooms"
                    style="display: none;">Sembunyikan Kamar</a>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const expandButton = document.getElementById('expandRooms');
                    const hideButton = document.getElementById('hideRooms');
                    const rooms = document.querySelectorAll('.data-kamar');

                    hideExcessRooms();

                    expandButton.addEventListener('click', function () {
                        showAllRooms();
                        expandButton.style.display = 'none';
                        hideButton.style.display = 'inline-block';
                    });

                    hideButton.addEventListener('click', function () {
                        hideExcessRooms();
                        hideButton.style.display = 'none';
                        expandButton.style.display = 'inline-block';
                    });

                    function showAllRooms() {
                        rooms.forEach(room => {
                            room.style.display = 'block';
                        });
                    }

                    function hideExcessRooms() {
                        rooms.forEach((room, index) => {
                            room.style.display = index >= 4 ? 'none' : 'block';
                        });
                    }
                });
            </script>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="text-center">
                <h3>Hubungi kami untuk pertanyaan lebih lanjut</h3>
                <a class="cta-btn" href="https://api.whatsapp.com/send?phone={{ $admin->number }}" target="_blank">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <span>{{ $page->kontak }}</span>
                <h2>{{ $page->kontak }}</h2>
                <p>{{ $page->sub_kontak }}</p>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>{{ $admin->alamat == '' ? '-' : $admin->alamat }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>{{ $admin->email }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>WhatsApp</h3>
                        <p>{{ $admin->number }}</p>
                    </div>
                </div>

            </div>

            {{-- <div class="row" data-aos="fade-up">

                <div class="col-lg-12">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

            </div> --}}

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection