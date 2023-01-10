@extends('layouts.admin')

@section('title', 'Banner Aplikasi')
@section('page', 'Banner Aplikasi')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-12">
                <x-card.card :title="'Data Banner'">
                    <button class="btn btn-outline-dark rounded-3 mb-2" onclick="create()">
                        <i class="mdi mdi-plus-box-multiple"></i>
                        Buat Banner Baru
                    </button>
                    <x-table.table :headers="['#', 'Banner', 'Aksi']" classes="table table-bordered table-bordered dt-responsive nowrap"
                        attr="id=banner-datatable">
                        @forelse ($banners as $banner)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ url($banner->gambar) }}" target="_blank">
                                        <img src="{{ url($banner->gambar) }}" height="70" width="100" alt="cover">
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                        action="{{ route('admin.banner.destroy', $banner->id) }}" method="delete">
                                        <i class="mdi mdi-trash-can"></i>
                                    </x-table.button.form>
                                </x-table.td>
                            </tr>
                        @empty
                            <tr>
                                <x-table.td attr="colspan=3" classes="text-center">Tidak ada data banner!</x-table.td>
                            </tr>
                        @endforelse
                    </x-table.table>
                </x-card.card>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Buat Banner</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@push('cssadmin')
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@push('jsadmin')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $("#banner-datatable").DataTable();
        function create() {
            let url = "{{ route('admin.banner.create') }}";
            $.ajax({
                url,
                success: function(res) {
                    $('#modal-body').html(res)
                    $('#add-modal').modal('show');
                },
                error: function(err) {
                    alert(err);
                }
            })
        }
    </script>
@endpush
