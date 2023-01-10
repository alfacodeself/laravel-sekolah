@extends('layouts.app')
@section('content')
    <div class="main">
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Sejarah</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <article class="entry">
                            {!! $sejarah !!}
                        </article>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
