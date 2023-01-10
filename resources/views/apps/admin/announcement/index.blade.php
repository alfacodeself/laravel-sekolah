@extends('layouts.admin')

@section('title', 'Pengumuman')
@section('page', 'Pengumuman')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-4">
                <x-card.card :title="'Pengumuman Baru'">
                    <x-form.form :method="'post'" :route="route('admin.announcement.store')" fileContent="true" attr="id=form-input">
                        <x-form.input label='Pengumuman' name="catatan" placeholder="Pengumuman">
                        </x-form.input>
                        <x-form.text-area label='Deskripsi Pengumuman' name="deskripsi" placeholder="Deskripsi Pengumuman"></x-form.text-area>
                        <x-form.input type="date" label='Tanggal Awal' name="tanggal_awal" placeholder="Tanggal Awal">
                        </x-form.input>
                        <x-form.input type="date" label='Tanggal Akhir' name="tanggal_akhir" placeholder="Tanggal Akhir">
                        </x-form.input>
                        <x-form.input type="file" label='Dokumen Pengumuman' name="dokumen_pengumuman" placeholder="Dokumen Pengumuman">
                        </x-form.input>
                        <x-form.submit classes="btn-dark rounded-3 d-block" name="Buat Pengumuman Baru" />
                    </x-form.form>
                </x-card.card>
            </div>
            <div class="col-xl-8">
                <x-card.card :title="'Data Pengumuman'">
                    <x-table.table :headers="['#', 'Pengumuman', 'Deskripsi', 'Tanggal', 'Dokumen Pengumuman', 'Aksi']" classes="table table-bordered table-bordered dt-responsive nowrap"
                        attr="id=announcement-datatable">
                        @forelse ($announcements as $announcement)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>{{ $announcement->catatan }}</x-table.td>
                                <x-table.td>{{ $announcement->deskripsi }}</x-table.td>
                                <x-table.td>{{ $announcement->tanggal_awal }} - {{ $announcement->tanggal_akhir }}</x-table.td>
                                <x-table.td>
                                    @if ($announcement->dokumen_pengumuman != null)
                                        <a href="{{ url($announcement->dokumen_pengumuman) }}" target="__blank">
                                            Lihat Dokumen
                                        </a>
                                    @else
                                        <center>-</center>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    <button class="btn btn-warning btn-sm rounded-3 waves-effect waves-light btn-edit"
                                        data-id="{{ $announcement->id }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                        action="{{ route('admin.announcement.destroy', $announcement->id) }}" method="delete">
                                        <i class="mdi mdi-trash-can"></i>
                                    </x-table.button.form>
                                </x-table.td>
                            </tr>
                        @empty
                            <tr>
                                <x-table.td attr="colspan=6" classes="text-center">Tidak ada data agenda!</x-table.td>
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
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Pengumuman</h4>
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
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@push('jsadmin')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $("#announcement-datatable").DataTable();
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                let id = $(this).attr('data-id');
                let url = "{{ route('admin.announcement.edit', ':id') }}"
                url = url.replace(':id', id)
                $.ajax({
                    url,
                    success: function(res) {
                        $('#modal-body').html(res)
                        $('#edit-modal').modal('show');
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
            })
        })
    </script>
@endpush
