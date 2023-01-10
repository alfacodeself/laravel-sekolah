@props(['classes' => '', 'attr' => ''])
{{-- @dd($classes) --}}
<td class="{{ $classes }}" {{ $attr }}>{{ $slot }}</td>
