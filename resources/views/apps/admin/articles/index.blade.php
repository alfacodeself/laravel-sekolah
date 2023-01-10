@extends('layouts.admin')

@section('title', 'Berita')
@section('page', 'Berita')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-12">
                <x-card.card :title="'Data Berita'">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-outline-dark rounded-3 mb-2">
                        <i class="mdi mdi-plus-box-multiple"></i>
                        Buat Berita Baru
                    </a>
                    <x-table.table :headers="['#', 'Thumb', 'Judul', 'Penulis', 'Dibaca', 'Aksi']" classes="table table-bordered table-bordered dt-responsive nowrap"
                        attr="id=news-datatable">
                        @forelse ($news as $n)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ url($n->thumbnail) }}" target="__blank">
                                        <img src="{{ url($n->thumbnail) }}" height="70" width="100" alt="cover">
                                    </a>
                                </x-table.td>
                                <x-table.td>{{ $n->judul }}</x-table.td>
                                <x-table.td>{{ $n->penulis }}</x-table.td>
                                <x-table.td>{{ $n->dibaca }} kali</x-table.td>
                                <x-table.td>
                                    <x-table.button.href classes="btn-warning btn-sm rounded-3"
                                        href="{{ route('admin.news.edit', $n->slug) }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </x-table.button.href>
                                    <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                        action="{{ route('admin.news.destroy', $n->slug) }}" method="delete">
                                        <i class="mdi mdi-trash-can"></i>
                                    </x-table.button.form>
                                </x-table.td>
                            </tr>
                        @empty
                            <tr>
                                <x-table.td attr="colspan=6" classes="text-center">Tidak ada data berita!</x-table.td>
                            </tr>
                        @endforelse
                    </x-table.table>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
@push('cssadmin')
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@push('jsadmin')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $("#news-datatable").DataTable()
    </script>
@endpush
