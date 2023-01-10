@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <div class="main">
        {{-- Carrousel --}}
        <x-landingpage.carrousel></x-landingpage.carrousel>

        {{-- Agenda --}}
        <section id="services" class="services mt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Tentang Sekolah</h2>
                </div>
                <div class="card p-4" style="border: 3px solid rgb(230, 104, 0)">
                    {{-- <h4 class="card-title" style="font-weight: 800">{{ $school->nama }}</h4> --}}
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <img src="{{ $school->logo }}" alt="logo" style="width: 100%;">
                        </div>
                        <div class="col-md-3 px-3">
                            <h4 class="card-title" style="font-weight: 800">{{ $school->nama }}</h4>
                            <div class="card-block px-6">
                                <p class="card-text">
                                    <a href="{{ route('profile.history') }}"><i class="bi bi-clock-history"></i> Sejarah
                                        Sekolah</a>
                                </p>
                                <p class="card-text">
                                    <a href="{{ route('profile.purpose') }}"><i class="bi bi-file-earmark-post"></i> Visi dan
                                        Misi Sekolah</a>
                                </p>
                                <p class="card-text">
                                    <i class="bi bi-telephone"></i> {{ $school->nomor_telpon }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 px-3">
                            <h4 class="card-title" style="font-weight: 800">Sosial Media</h4>
                            <div class="card-block px-6">
                                @if ($school->facebook != null)
                                    <p class="card-text">
                                        <i class="bi bi-facebook"></i> {{ $school->facebook }}
                                    </p>
                                @endif
                                @if ($school->email != null)
                                    <p class="card-text">
                                        <i class="bi bi-google"></i> {{ $school->email }}
                                    </p>
                                @endif
                                @if ($school->instagram != null)
                                    <p class="card-text">
                                        <i class="bi bi-instagram"></i> {{ $school->instagram }}
                                    </p>
                                @endif
                                @if ($school->whatsapp != null)
                                    <p class="card-text">
                                        <i class="bi bi-whatsapp"></i> {{ $school->whatsapp }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Agenda --}}
        <section id="services" class="services mt-5">
            <div class="container">
                <div class="section-title">
                    <h2>Agenda</h2>
                </div>
                <div class="section">
                    <div class="blog-post blog-single-post">
                        <div class="single-post-content">
                            <table class="events-list">
                                @foreach ($events as $event)
                                    <tr>
                                        <td>
                                            <div class="event-date">
                                                <div class="event-day">
                                                    {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d') }}
                                                </div>
                                                <div class="event-month text-uppercase">
                                                    {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('M') }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $event->catatan }}
                                        </td>
                                        <td class="event-venue hidden-xs"><i class="bx bx-map-pin"></i>
                                            {{ $event->lokasi }}
                                        </td>
                                        <td class="event-price hidden-xs"><i class="bx bx-time"></i> {{ $event->waktu }}
                                        </td>
                                        <td>
                                            @if ($event->thumbnail != null)
                                                <a href="#" onclick="show({{ $event->id }})"
                                                    class="btn btn-link btn-sm event-more">Lihat Thumbnail</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- News --}}
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Berita</h2>
                </div>
                <div class="row">

                    @isset($newsPopular)
                        <div class="col-lg-7 col-12 entries">

                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ $newsPopular->thumbnail }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="{{ route('news.show', $newsPopular->slug) }}">{{ $newsPopular->judul }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <a>{{ $newsPopular->penulis }}</a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a>
                                                <time datetime="2020-01-01">
                                                    {{ $newsPopular->created_at->translatedFormat('d F Y') }}
                                                </time>
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-book-half"></i>
                                            <a>Dibaca {{ $newsPopular->dibaca }} kali</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <div class="read-more">
                                        <a href="{{ route('news.show', $newsPopular->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endisset

                    <div class="col-lg-5 col-12">

                        <div class="sidebar">
                            <h3 class="sidebar-title">Berita Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($news as $n)
                                    <div class="post-item clearfix">
                                        <img src="{{ url($n->thumbnail) }}" alt="">
                                        <h4><a href="{{ route('news.show', $n->slug) }}">{{ $n->judul }}</a></h4>
                                        <time datetime="2020-01-01">{{ $n->created_at->translatedFormat('d F Y') }}</time>
                                    </div>
                                @endforeach
                            </div>

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section>
        {{-- Gallery --}}
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Galeri</h2>
                </div>
                <div class="row portfolio-container">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ url($gallery->gambar) }}" alt="" style="width: 100%; height: 200px;">
                                <div class="portfolio-info">
                                    <h4>{{ $gallery->catatan }}</h4>
                                    <p>{{ \Carbon\Carbon::parse($gallery->tanggal_pengambilan)->translatedFormat('d F Y') }}
                                    </p>
                                    <div class="portfolio-links">
                                        <a href="{{ url($gallery->gambar) }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="{{ $gallery->deskripsi }}"><i
                                                class="bx bx-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <div class="modal" id="eventModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card modal-body">
                Lorem ipsum dolor sit amet.
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        /* ============================================= */
        .card-block {
            font-size: 14px;
            font-weight: 400;

            font-family: sans-serif;
            position: relative;
            margin: 0;
            padding: 10px;
            border: none;
            /* border-top: 1px solid rgba(34, 36, 38, .1); */
            box-shadow: none;
        }
        .card-block .card-text i{
            margin-right: 10px;
            color: #b83603;
            font-size: 16px;
        }
        
        .card-block .card-text a{
            margin-right: 10px;
            color: #b4b5ce;
            font-size: 14px;
        }
        .card-block .card-text a:hover{
            margin-right: 10px;
            color: #1218bd;
            font-size: 14px;
        }

        .card {
            font-size: 1em;
            overflow: hidden;
            padding: 5;
            border: none;
            border-radius: .28571429rem;
            box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
            margin-top: 20px;
        }
        /* ============================================================== */

        table {
            box-sizing: border-box;
            border-bottom: 1px solid #e8e8e8;
            font-family: sans-serif;
        }

        table tbody tr:hover {
            background-color: #a7bee7;
            color: #000;
            text-shadow: 1px 2px rgba(255, 255, 255, 0.336);
            box-shadow: 0px 0px 10px #b83603;
            -webkit-box-shadow: 0px 0px 10px #b83603;
            -moz-box-shadow: 0px 0px 10px #b83603;
        }

        .events-list {
            width: 100%;
            font-size: 0.9em;
        }

        .events-list tr td {
            padding: 5px 20px 5px 0;
        }

        .events-list tr td:last-child {
            padding: 5px 0;
            text-align: right;
        }

        .events-list tr:hover .event-date {
            border-left: 5px solid #4f8db3;
        }

        .events-list .event-date {
            margin: 3px 0;
            padding: 2px 10px;
            border-left: 5px solid #CFCFCF;
            -webkit-transition: all .25s linear;
            -moz-transition: all .25s linear;
            -o-transition: all .25s linear;
            -ms-transition: all .25s linear;
            transition: all .25s linear;
        }

        .events-list .event-date .event-day {
            color: #004A5B;
            font-size: 1.2em;
            font-weight: 600;
            text-align: left;
        }

        .events-list .event-date .event-month {
            color: #777;
            font-size: 1em;
            font-weight: 600;
            text-align: left;
        }

        .events-list .event-date .event-venue,
        .events-list .event-date .event-price {
            white-space: nowrap;
        }

        /* ==================================================== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, .4);

        }

        .modal-content {
            background-color: #b83603;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            font-size: 14px;
            font-family: sans-serif;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: rgb(255, 255, 255);
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endpush
@push('js')
    <script>
        var modal = document.getElementById("eventModal");
        var span = document.getElementsByClassName("close")[0];

        function show(id) {
            let url = "{{ route('event.show', ':id') }}"
            url = url.replace(':id', id)
            // alert(url)
            $.ajax({
                url,
                success: function(res) {
                    $('.modal-body').html(res)
                    modal.style.display = "block";
                },
                error: function(err) {
                    alert(err);
                }
            })
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endpush
