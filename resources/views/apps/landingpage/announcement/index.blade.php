@extends('layouts.app')
@section('content')
    <div class="modal" id="eventModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="card modal-body">
            Lorem ipsum dolor sit amet.
            </div>
        </div>
    </div>

    <section id="services" class="services mt-5">
        <div class="container">
            <div class="section-title">
                <h2>Pengumuman</h2>
            </div>
            <div class="section">
                <div class="blog-post blog-single-post">
                    <div class="single-post-title">
                        <h4>Pengumuman Aktif</h4>
                    </div>
                    <div class="single-post-content">
                        <table class="events-list">
                            @foreach ($announcementActive as $announcement)
                                <tr>
                                    <td>
                                        <div class="event-date">
                                            <div class="event-day">
                                                {{ \Carbon\Carbon::parse($announcement->tanggal_mulai)->translatedFormat('d') }}</div>
                                            <div class="event-month text-uppercase">
                                                {{ \Carbon\Carbon::parse($announcement->tanggal_mulai)->translatedFormat('M') }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $announcement->catatan }}</strong>
                                    </td>
                                    <td>
                                        @if ($announcement->dokumen_pengumuman != null)
                                            <a href="{{ url($announcement->dokumen_pengumuman) }}" class="btn btn-link text-success btn-sm event-more">Lihat Dokumen Pengumuman</a>
                                        @else
                                            Tidak ada dokumen
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" onclick="show({{ $announcement->id }})" class="btn btn-link btn-sm event-more">Detail Pengumuman</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services">
        <div class="container">
            <div class="section">
                <div class="blog-post blog-single-post">
                    <div class="single-post-title">
                        <h4>Agenda Tidak Aktif</h4>
                    </div>
                    <div class="single-post-content">
                        <table class="events-list">
                            @foreach ($announcementNonactive as $announcement)
                                <tr>
                                    <td>
                                        <div class="event-date">
                                            <div class="event-day">
                                                {{ \Carbon\Carbon::parse($announcement->tanggal_mulai)->translatedFormat('d') }}</div>
                                            <div class="event-month text-uppercase">
                                                {{ \Carbon\Carbon::parse($announcement->tanggal_mulai)->translatedFormat('M') }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $announcement->catatan }}</strong>
                                    </td>
                                    <td>
                                        @if ($announcement->dokumen_pengumuman != null)
                                            <a href="{{ url($announcement->dokumen_pengumuman) }}" class="btn btn-link text-success btn-sm event-more">Lihat Dokumen Pengumuman</a>
                                        @else
                                            Tidak ada dokumen
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" onclick="show({{ $announcement->id }})" class="btn btn-link btn-sm event-more">Detail Pengumuman</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $announcementNonactive->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <style>
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
            let url = "{{ route('announcement.show', ':id') }}"
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
