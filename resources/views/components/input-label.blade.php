@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-semibold fs-5 mb-2', 'style' => 'color:#181C32;']) }}>
    {{ $value ?? $slot }}
</label>
