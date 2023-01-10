<x-form.form :method="'put'" :route="route('admin.portals.update', $portal->id)">
    <x-form.input label='Nama Portal' edit="{{ $portal->nama_portal }}" name="nama_portal" placeholder="Nama Portal">
    </x-form.input>
    <x-form.input label='Link Portal' edit="{!! $portal->link_portal !!}" name="link_portal" placeholder="Link Portal">
    </x-form.input>
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Ubah Portal Aplikasi" />
</x-form.form>
