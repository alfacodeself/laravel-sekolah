@extends('layouts.admin')

@section('title', 'Sekolah')
@section('page', 'Sekolah')
@section('content')
    <div class="container-fluid">
        <x-alert />
        @isset($school)
            <x-form.form :method="'post'" :route="route('admin.school.store')" fileContent="true">
                <div class="row">
                    <div class="col-xl-4">
                        <x-card.card :title="'Profil Sekolah'">
                            <center>
                                <img src="{{ url($school->logo) }}" alt="logo" class="avatar-lg rounded-circle">
                            </center>
                            <x-form.input type="file" label='Logo Sekolah' name="logo" placeholder="Logo Sekolah">
                            </x-form.input>
                            <x-form.input label='Nama Sekolah' name="nama" edit="{{ $school->nama }}"
                                placeholder="Nama Sekolah">
                            </x-form.input>
                        </x-card.card>
                        <x-card.card :title="'Kontak Sekolah'">
                            <x-form.input type="email" label='Email Sekolah' edit="{{ $school->email }}" name="email"
                                placeholder="Email Sekolah">
                            </x-form.input>
                            <x-form.input type="number" label='Nomor Telpon Sekolah' edit="{{ $school->nomor_telpon }}"
                                name="nomor_telpon" placeholder="Nomor Telpon Sekolah"></x-form.input>
                            <x-form.input label='Facebook Sekolah' name="facebook" edit="{{ $school->facebook }}"
                                placeholder="Facebook Sekolah">
                            </x-form.input>
                            <x-form.input label='Instagram Sekolah' name="instagram" edit="{{ $school->instagram }}"
                                placeholder="Instagram Sekolah">
                            </x-form.input>
                            <x-form.input label='Whatsapp Sekolah' name="whatsapp" edit="{{ $school->whatsapp }}"
                                placeholder="Whatsapp Sekolah">
                            </x-form.input>
                        </x-card.card>
                    </div>
                    <div class="col-xl-8">
                        <x-card.card :title="'Tentang Sekolah'">
                            <x-form.text-area label="Sejarah Sekolah" name="sejarah" edit="{{ $school->sejarah }}"
                                placeholder="Sejarah Sekolah">
                            </x-form.text-area>
                            <x-form.text-area label="Visi Sekolah" name="visi" edit="{{ $school->visi }}"
                                placeholder="Visi Sekolah">
                            </x-form.text-area>
                            <x-form.text-area label="Misi Sekolah" name="misi" edit="{{ $school->misi }}"
                                placeholder="Misi Sekolah">
                            </x-form.text-area>
                            <x-form.submit classes="btn-dark rounded-3" name="Simpan Profil Sekolah" />
                        </x-card.card>
                    </div>
                </div>
            </x-form.form>
        @else
            <x-form.form :method="'post'" :route="route('admin.school.store')" fileContent="true">
                <div class="row">
                    <div class="col-xl-4">
                        <x-card.card :title="'Profil Sekolah'">
                            <x-form.input type="file" label='Logo Sekolah' name="logo" placeholder="Logo Sekolah">
                            </x-form.input>
                            <x-form.input label='Nama Sekolah' name="nama" placeholder="Nama Sekolah">
                            </x-form.input>
                        </x-card.card>
                        <x-card.card :title="'Kontak Sekolah'">
                            <x-form.input type="email" label='Email Sekolah' name="email" placeholder="Email Sekolah">
                            </x-form.input>
                            <x-form.input type="number" label='Nomor Telpon Sekolah' name="nomor_telpon"
                                placeholder="Nomor Telpon Sekolah"></x-form.input>
                            <x-form.input label='Facebook Sekolah' name="facebook" placeholder="Facebook Sekolah">
                            </x-form.input>
                            <x-form.input label='Instagram Sekolah' name="instagram" placeholder="Instagram Sekolah">
                            </x-form.input>
                            <x-form.input label='Whatsapp Sekolah' name="whatsapp" placeholder="Whatsapp Sekolah">
                            </x-form.input>
                        </x-card.card>
                    </div>
                    <div class="col-xl-8">
                        <x-card.card :title="'Tentang Sekolah'">
                            <x-form.text-area label="Sejarah Sekolah" name="sejarah" placeholder="Sejarah Sekolah">
                            </x-form.text-area>
                            <x-form.text-area label="Visi Sekolah" name="visi" placeholder="Visi Sekolah">
                            </x-form.text-area>
                            <x-form.text-area label="Misi Sekolah" name="misi" placeholder="Misi Sekolah">
                            </x-form.text-area>
                            <x-form.submit classes="btn-dark" name="Simpan Profil Sekolah" />
                        </x-card.card>
                    </div>
                </div>
            </x-form.form>
        @endisset
    </div>
@endsection
@push('cssadmin')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 130px;
        }
    </style>
@endpush
@push('jsadmin')
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>

    @isset($school)
        <script>
            ClassicEditor.create(document.querySelector('#sejarah'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .then(editor => {
                    editor.setData('{!! $school->sejarah !!}')
                })
                .catch(error => {
                    alert(error);
                });
            ClassicEditor.create(document.querySelector('#visi'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .then(editor => {
                    editor.setData('{!! $school->visi !!}')
                })
                .catch(error => {
                    alert(error);
                });
            ClassicEditor.create(document.querySelector('#misi'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .then(editor => {
                    editor.setData('{!! $school->misi !!}')
                })
                .catch(error => {
                    alert(error);
                });
        </script>
    @else
        <script>
            ClassicEditor.create(document.querySelector('#sejarah'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .catch(error => {
                    alert(error);
                });
            ClassicEditor.create(document.querySelector('#visi'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .catch(error => {
                    alert(error);
                });
            ClassicEditor.create(document.querySelector('#misi'), {
                    toolbar: {
                        items: [
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                })
                .catch(error => {
                    alert(error);
                });
        </script>
    @endisset
@endpush
