@extends('layouts.app')
@section('content')
    <div class="main">
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title mt-5">
                    <h2>Galeri</h2>
                </div>
                <div class="row portfolio-container">
                    @foreach ($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ url($gallery->gambar) }}" alt="" style="width: 100%; height: 200px;">
                            <div class="portfolio-info">
                                <h4>{{ $gallery->catatan }}</h4>
                                <p>{{ \Carbon\Carbon::parse($gallery->tanggal_pengambilan)->translatedFormat('d F Y') }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ url($gallery->gambar) }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="{{ $gallery->deskripsi }}"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
