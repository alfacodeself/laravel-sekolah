@extends('layouts.admin')

@section('title', 'Sekolah')
@section('page', 'Sekolah')
@section('content')
    <div class="container-fluid">
        <x-alert />
        <x-form.form :method="'post'" :route="route('admin.account.store')" fileContent="true">
            <div class="row">
                <div class="col-xl-6">
                    <x-card.card :title="'Profil'">
                        <x-form.input type="file" label='Foto Profil' name="foto" placeholder="Foto Profil">
                        </x-form.input>
                        <x-form.input label='Nama' name="nama" edit="{{ auth()->user()->nama }}" placeholder="Nama">
                        </x-form.input>
                    </x-card.card>
                </div>
                <div class="col-xl-6">
                    <x-card.card :title="'Akun'">
                        <x-form.input label='Username' edit="{{ auth()->user()->username }}" name="username"
                            placeholder="Username">
                        </x-form.input>
                        <x-form.input type="password" label='Password Lama' name="old_password" placeholder="Password Lama">
                        </x-form.input>
                        <x-form.input type="password" label='Password Baru' name="new_password" placeholder="Password Baru">
                        </x-form.input>
                        <x-form.input type="password" label='Konfirmasi Password' name="new_password_confirmation"
                            placeholder="Konfirmasi Password">
                        </x-form.input>
                        <x-form.submit classes="btn-dark rounded-3" name="Simpan Profil" />
                    </x-card.card>
                </div>
            </div>
        </x-form.form>
    </div>
@endsection
