@extends('layouts.app')
@section('content')
    <div class="main">
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ $news->thumbnail }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a>{{$news->judul}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{ $news->penulis }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="2020-01-01">{{ $news->created_at->translatedFormat('d F Y') }}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-bo"></i> <a>Dibaca {{ $news->dibaca }} Kali</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">{!! $news->isi !!}</div>

                        </article>

                    </div>
                    <div class="col-lg-4">

                        <div class="sidebar">
                            <h3 class="sidebar-title">Berita Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($latestNews as $l)
                                <div class="post-item clearfix">
                                    <img src="{{ $l->thumbnail }}" alt="">
                                    <h4><a href="{{ $l->slug }}">{{ $l->judul }}</a></h4>
                                    <time datetime="2020-01-01">{{ $l->created_at->translatedFormat('d F Y') }}</time>
                                </div>
                                @endforeach
                            </div>
                            <h3 class="sidebar-title">Berita Terpopuler</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($popularNews as $l)
                                <div class="post-item clearfix">
                                    <img src="{{ $l->thumbnail }}" alt="">
                                    <h4><a href="{{ $l->slug }}">{{ $l->judul }}</a></h4>
                                    <time datetime="2020-01-01">{{ $l->created_at->translatedFormat('d F Y') }}</time>
                                </div>
                                @endforeach
                            </div>

                        </div><!-- End sidebar -->

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
