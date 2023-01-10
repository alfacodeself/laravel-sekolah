<x-form.form :method="'put'" :route="route('admin.agenda.update', $event->id)" fileContent="true" attr="id=form-input class=modal-route">
    @if ($event->thumbnail != null)
        <center>
            <img src="{{ url($event->thumbnail) }}" alt="logo" height="70">
        </center>
    @endif
    <x-form.input type="file" label='Thumbnail Agenda' name="thumbnail" placeholder="Thumbnail Agenda">
    </x-form.input>
    <x-form.input label='Agenda' name="catatan" edit="{{ $event->catatan }}" classes="modal-catatan" placeholder="Agenda">
    </x-form.input>
    <x-form.input label='Lokasi' name="lokasi" edit="{{ $event->lokasi }}" classes="modal-lokasi"
        placeholder="Lokasi Agenda">
    </x-form.input>
    <x-form.input type="date" label='Tanggal' edit="{{ $event->tanggal }}" classes="modal-tanggal" name="tanggal"
        placeholder="Tanggal Agenda">
    </x-form.input>
    <x-form.input type="time" label='Waktu' name="waktu" edit="{{ $event->waktu }}" classes="modal-waktu"
        placeholder="Waktu Agenda">
    </x-form.input>
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Ubah Agenda Baru" />
</x-form.form>
