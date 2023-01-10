<x-form.form :method="'post'" :route="route('admin.gallery.store')" fileContent="true">
    <x-form.input type="file" label='Gambar' name="gambar" placeholder="Gambar">
    </x-form.input>
    <x-form.input label='Catatan' name="catatan" placeholder="Catatan Galeri">
    </x-form.input>
    <x-form.text-area label='Deskripsi' name="deskripsi" placeholder="Deskripsi Galeri">
    </x-form.text-area>
    <x-form.input type="date" label='Tanggal' name="tanggal_pengambilan" placeholder="Tanggal Pengambilan Galeri">
    </x-form.input>
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Tambahkan Galeri" />
</x-form.form>
