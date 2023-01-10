@extends('layouts.admin')

@section('title', 'Portal Aplikasi')
@section('page', 'Portal Aplikasi')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-4">
                <x-card.card :title="'Portal Baru'">
                    <x-form.form :method="'post'" :route="route('admin.portals.store')">
                        <x-form.input label='Nama Portal' name="nama_portal" placeholder="Nama Portal">
                        </x-form.input>
                        <x-form.input label='Link Portal' name="link_portal" placeholder="Link Portal">
                        </x-form.input>
                        <x-form.submit classes="btn-dark rounded-3 d-block" name="Buat Portal Aplikasi Baru" />
                    </x-form.form>
                </x-card.card>
            </div>
            <div class="col-xl-8">
                <x-card.card :title="'Data Portal Aplikasi'">
                    <x-table.table :headers="['#', 'Portal', 'Link', 'Aksi']" classes="table table-bordered table-bordered dt-responsive nowrap"
                        attr="id=portal-datatable">
                        @forelse ($portals as $portal)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $portal->nama_portal }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ $portal->link_portal }}" target="_blank">
                                        {{ $portal->link_portal }}
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    <button class="btn btn-warning btn-sm rounded-3 waves-effect waves-light btn-edit"
                                        data-id="{{ $portal->id }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                        action="{{ route('admin.portals.destroy', $portal->id) }}" method="delete">
                                        <i class="mdi mdi-trash-can"></i>
                                    </x-table.button.form>
                                </x-table.td>
                            </tr>
                        @empty
                            <tr>
                                <x-table.td attr="colspan=4" classes="text-center">Tidak ada data portal!</x-table.td>
                            </tr>
                        @endforelse
                    </x-table.table>
                </x-card.card>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Portal</h4>
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
        $("#portal-datatable").DataTable();
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                let id = $(this).attr('data-id');
                let url = "{{ route('admin.portals.edit', ':id') }}"
                url = url.replace(':id', id)
                $.ajax({
                    url,
                    success: function(res) {
                        $('#modal-body').html(res)
                        $('#edit-modal').modal('show');
                    },
                    error: function(err) {
                        alert(err);
                    }
                })
            })
        })
    </script>
@endpush
