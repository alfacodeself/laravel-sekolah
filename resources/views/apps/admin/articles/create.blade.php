@extends('layouts.admin')

@section('title', 'Buat Berita Baru')
@section('page', 'Buat Berita Baru')
@section('content')
    <div class="container-fluid">
        <x-alert />
        <x-card.card :title="'Berita Baru'">
            <x-form.form :method="'post'" :route="route('admin.news.store')" fileContent="true">
                <div class="row">
                    <div class="col-xl-4">
                        <x-form.input type="file" label='Thumbnail Berita' name="thumbnail" placeholder="Thumbnail Berita">
                        </x-form.input>
                        <x-form.input label='Judul Berita' name="judul" placeholder="Judul Berita">
                        </x-form.input>
                        <x-form.input label='Penulis Berita' name="penulis" placeholder="Penulis Berita">
                        </x-form.input>
                    </div>
                    <div class="col-xl-8">
                        <x-form.text-area label="Isi Berita" name="isi" placeholder="Isi Berita">
                        </x-form.text-area>
                        <x-form.submit classes="btn-dark rounded-3" name="Buat Berita Baru" />
                    </div>
                </div>
            </x-form.form>
        </x-card.card>
    </div>
@endsection
@push('cssadmin')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 130px;
        }
    </style>
@endpush
@push('jsadmin')
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#isi'), {
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
@endpush
