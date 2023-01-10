@props(['type' => 'text', 'label', 'name', 'placeholder', 'edit' => null, 'classes' => ''])

{{-- @dd($type, $label, $name, $placeholder) --}}

<div class="mb-2">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control {{ $classes }}" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ $edit == null ? old($name) : old($name, $edit) }}">
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
