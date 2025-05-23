@props(['disabled' => false])

@props(['disabled' => false, 'icon' => null])
<div class="input-group mb-4">
    @if($icon)
        <span class="input-group-text bg-white border-0 pe-2"><i class="{{ $icon }} text-primary fs-4"></i></span>
    @endif
    <input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control border-2', 'style' => 'border-color:#009EF7; border-radius:50px; padding: 0.75rem 1.5rem; font-size:1.15rem; box-shadow:0 1px 2px rgba(0,0,0,0.03); transition:box-shadow 0.2s;']) }} >
</div>
