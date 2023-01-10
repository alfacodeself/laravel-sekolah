@extends('layouts.admin')

@section('title', 'Galeri')
@section('page', 'Galeri')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <x-alert />
        <div class="row">
            <div class="col-xl-12">
                <x-card.card :title="'Galeri Sekolah'">
                    <button class="btn btn-outline-dark rounded-3 mb-2 btn-add">
                        <i class="mdi mdi-plus-box-multiple"></i>
                        Buat Galeri Baru
                    </button>
                    <div class="row">
                        @forelse ($galleries as $gallery)
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <img class="card-img-top img-fluid" src="{{ url($gallery->gambar) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $gallery->catatan }}</h4>
                                        <p class="card-text">{{ $gallery->deskripsi }}</p>
                                        <p class="card-text">
                                            <small class="text-muted">{{ $gallery->tanggal_pengambilan }}</small>
                                        </p>
                                        <button class="btn btn-warning btn-sm rounded-3 waves-effect waves-light btn-edit"
                                            data-id="{{ $gallery->id }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <x-table.button.form classes="btn-danger btn-sm rounded-3"
                                            action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="delete">
                                            <i class="mdi mdi-trash-can"></i>
                                        </x-table.button.form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <h4 class="text-center">Tidak ada data galeri!</h4>
                            </div>
                        @endforelse
                    </div>
                </x-card.card>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Tambah Galeri</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Galeri</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('jsadmin')
    <script>
        $(document).ready(function() {
            $('.btn-add').on('click', function() {
                let url = "{{ route('admin.gallery.create') }}"
                $.ajax({
                    url,
                    success: function(res) {
                        $('.modal-body').html(res)
                        $('#add-modal').modal('show');
                    },
                    error: function(err) {
                        alert(err);
                    }
                })
            });
            $('.btn-edit').on('click', function() {
                let id = $(this).attr('data-id');
                let url = "{{ route('admin.gallery.edit', ':id') }}"
                url = url.replace(':id', id)
                $.ajax({
                    url,
                    success: function(res) {
                        $('.modal-body').html(res)
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
