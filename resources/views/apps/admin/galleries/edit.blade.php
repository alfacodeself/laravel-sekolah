<x-form.form :method="'put'" :route="route('admin.gallery.update', $gallery->id)" fileContent="true">
    @if ($gallery->gambar != null)
        <center>
            <img src="{{ url($gallery->gambar) }}" alt="logo" height="70">
        </center>
    @endif
    <x-form.input type="file" label='Gambar' name="gambar" placeholder="Gambar">
    </x-form.input>
    <x-form.input label='Catatan' name="catatan" edit="{{ $gallery->catatan }}" placeholder="Catatan Galeri">
    </x-form.input>
    <x-form.text-area label='Deskripsi' edit="{{ $gallery->deskripsi }}" name="deskripsi" placeholder="Deskripsi Galeri">
    </x-form.text-area>
    <x-form.input type="date" label='Tanggal' edit="{{ $gallery->tanggal_pengambilan }}" name="tanggal_pengambilan" placeholder="Tanggal Pengambilan Galeri">
    </x-form.input>
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Ubah Galeri" />
</x-form.form>