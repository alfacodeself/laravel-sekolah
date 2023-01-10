@extends('layouts.admin')

@section('title', 'Agenda')
@section('page', 'Agenda')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-4">
                <x-card.card :title="'Agenda Baru'">
                    <x-form.form :method="'post'" :route="route('admin.agenda.store')" fileContent="true" attr="id=form-input">
                        <x-form.input type="file" label='Thumbnail Agenda' name="thumbnail" placeholder="Thumbnail Agenda">
                        </x-form.input>
                        <x-form.input label='Agenda' name="catatan" placeholder="Agenda">
                        </x-form.input>
                        <x-form.input label='Lokasi' name="lokasi" placeholder="Lokasi Agenda">
                        </x-form.input>
                        <x-form.input type="date" label='Tanggal' name="tanggal" placeholder="Tanggal Agenda">
                        </x-form.input>
                        <x-form.input type="time" label='Waktu' name="waktu" placeholder="Waktu Agenda">
                        </x-form.input>
                        <x-form.submit classes="btn-dark rounded-3 d-block" name="Buat Agenda Baru" />
                    </x-form.form>
                </x-card.card>
            </div>
            <div class="col-xl-8">
                <x-card.card :title="'Data Agenda'">
                    <x-table.table :headers="['#', 'Thumb', 'Agenda', 'Lokasi/Waktu', 'Aksi']" classes="table table-bordered table-bordered dt-responsive nowrap"
                        attr="id=event-datatable">
                        @forelse ($events as $event)
                            <tr>
                                <x-table.td>{{ $loop->iteration }}</x-table.td>
                                <x-table.td>
                                    @if ($event->thumbnail != null)
                                        <a href="{{ url($event->thumbnail) }}" target="__blank">
                                            <img src="{{ url($event->thumbnail) }}" height="70" width="100"
                                                alt="cover">
                                        </a>
                                    @else
                                        <center>-</center>
                                    @endif
                                </x-table.td>
                                <x-table.td>{{ $event->catatan }}</x-table.td>
                                <x-table.td>{{ $event->lokasi }}, {{ $event->tanggal }} ~ {{ $event->waktu }}</x-table.td>
                                <x-table.td>
                                    <button class="btn btn-warning btn-sm rounded-3 waves-effect waves-light btn-edit"
                                        data-id="{{ $event->id }}">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                        action="{{ route('admin.agenda.destroy', $event->id) }}" method="delete">
                                        <i class="mdi mdi-trash-can"></i>
                                    </x-table.button.form>
                                </x-table.td>
                            </tr>
                        @empty
                            <tr>
                                <x-table.td attr="colspan=5" classes="text-center">Tidak ada data agenda!</x-table.td>
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
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Agenda</h4>
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
        $("#event-datatable").DataTable();
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                let id = $(this).attr('data-id');
                let url = "{{ route('admin.agenda.edit', ':id') }}"
                url = url.replace(':id', id)
                $.ajax({
                    url,
                    success: function(res) {
                        $('#modal-body').html(res)
                        $('#edit-modal').modal('show');
                    },
                    error:function(err){
                        alert(err);
                    }
                })
            })
        })
    </script>
@endpush
