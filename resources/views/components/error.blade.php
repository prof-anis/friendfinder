@props(['field'])

@if ($errors->has($field))
    <p style="color: red; margin-top: 2px; margin-bottom: 2px; font-size: 11px">
    {{ $errors->first($field) }}</p>
@endif
