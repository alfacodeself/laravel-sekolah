@extends('layouts.app')
@section('content')
    <div class="main">
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Berita</h2>
                </div>
                <div class="row">
                    @foreach ($news as $newsPopular)
                        <div class="col-lg-4 entries">
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
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <div class="read-more">
                                        <a href="{{ route('news.show', $newsPopular->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
@endsection
