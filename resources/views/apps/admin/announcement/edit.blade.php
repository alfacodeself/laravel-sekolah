<x-form.form :method="'put'" :route="route('admin.announcement.update', $announcement->id)" fileContent="true" attr="id=form-input">
    <x-form.input label='Pengumuman' edit="{{ $announcement->catatan }}" name="catatan" placeholder="Pengumuman">
    </x-form.input>
    <x-form.text-area label='Deskripsi Pengumuman' edit="{{ $announcement->deskripsi }}" name="deskripsi"
        placeholder="Deskripsi Pengumuman">
    </x-form.text-area>
    <x-form.input type="date" label='Tanggal Awal' edit="{{ $announcement->tanggal_awal }}" name="tanggal_awal"
        placeholder="Tanggal Awal">
    </x-form.input>
    <x-form.input type="date" label='Tanggal Akhir' edit="{{ $announcement->tanggal_akhir }}" name="tanggal_akhir"
        placeholder="Tanggal Akhir">
    </x-form.input>
    <x-form.input type="file" label='Dokumen Pengumuman' name="dokumen_pengumuman" placeholder="Dokumen Pengumuman">
    </x-form.input>
    @if ($announcement->dokumen_pengumuman != null)
        <small class="text-info"><a href="{{ url($announcement->dokumen_pengumuman) }}" target="__blank">Lihat dokumen
                saat ini</a></small>
    @endif
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Ubah Pengumuman Sekolah" />
</x-form.form>
