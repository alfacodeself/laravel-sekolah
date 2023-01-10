{{-- @dd($route, $method, $methodForm) --}}
@props(['fileContent' => false, 'attr' => ''])

<form action="{{ $route }}" method="{{ $methodForm }}" enctype="{{ $fileContent ? 'multipart/form-data' : '' }}" {{ $attr }}>
    @csrf
    @method($method)
    {{ $slot }}
</form>
