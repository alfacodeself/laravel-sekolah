<x-form.form :method="'post'" :route="route('admin.banner.store')" fileContent="true">
    <x-form.input type="file" label='Gambar' name="gambar" placeholder="Gambar">
    </x-form.input>
    <x-form.submit classes="btn-dark rounded-3 d-block" name="Tambahkan Banner" />
</x-form.form>