@extends('layouts.app')
@section('content')
    <div class="main">
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Visi dan Misi</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <article class="entry">
                            <h2 class="entry-title text-center">
                                Visi
                            </h2>
                            {!! $visi !!}
                        </article>
                    </div>
                    <div class="col-md-6">
                        <article class="entry">
                            <h2 class="entry-title text-center">
                                Misi
                            </h2>
                            {!! $misi !!}
                        </article>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection