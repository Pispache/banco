<div class="d-flex justify-content-center">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary w-50 py-3 fs-5 rounded-3 border-0', 'style' => 'background:#009EF7;']) }}>
        {{ $slot }}
    </button>
</div>
