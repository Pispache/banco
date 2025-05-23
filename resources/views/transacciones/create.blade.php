<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ isset($transaccion) ? route('transacciones.update', $transaccion) : route('transacciones.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @if(isset($transaccion)) @method('PUT') @endif
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ isset($transaccion) ? 'Editar Transacción' : 'Nueva Transacción' }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Tipo</label>
                                        <select name="tipo_transaccion_id" class="form-control w-100">
                                            @foreach($tiposTransaccion as $tipo)
                                                <option value="{{ $tipo->id }}" {{ old('tipo_transaccion_id', $transaccion->tipo_transaccion_id ?? '') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Monto</label>
                                        <input class="form-control w-100" type="number" step="0.01" name="monto" value="{{ old('monto', $transaccion->monto ?? '') }}" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="form-label">Cuenta Origen</label>
                                        <select name="cuenta_origen_id" class="form-control w-100">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id }}" {{ old('cuenta_origen_id', $transaccion->cuenta_origen_id ?? '') == $cuenta->id ? 'selected' : '' }}>
                                                    {{ $cuenta->numero }} - {{ $cuenta->user ? $cuenta->user->name : 'Sin titular' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="form-label">Cuenta Destino</label>
                                        <select name="cuenta_destino_id" class="form-control w-100">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id }}" {{ old('cuenta_destino_id', $transaccion->cuenta_destino_id ?? '') == $cuenta->id ? 'selected' : '' }}>
                                                    {{ $cuenta->numero }} - {{ $cuenta->user ? $cuenta->user->name : 'Sin titular' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3">
                            <button class="btn btn-success">Guardar</button>
                            <a href="{{ route('transacciones.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoSelect = document.querySelector('select[name="tipo_transaccion_id"]');
            const cuentaDestinoDiv = document.querySelector('select[name="cuenta_destino_id"]').closest('.fv-row');

            function toggleCuentaDestino() {
                const selectedOption = tipoSelect.options[tipoSelect.selectedIndex].text.toLowerCase();
                if (selectedOption === 'transferencia') {
                    cuentaDestinoDiv.style.display = '';
                } else {
                    cuentaDestinoDiv.style.display = 'none';
                    document.querySelector('select[name="cuenta_destino_id"]').value = '';
                }
            }

            tipoSelect.addEventListener('change', toggleCuentaDestino);
            toggleCuentaDestino();
        });
        </script>
    </x-slot>
</x-layouts.app>