<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" action="{{ isset($tarjeta) ? route('tarjetas.update', $tarjeta) : route('tarjetas.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @if(isset($tarjeta)) @method('PUT') @endif
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ isset($tarjeta) ? 'Editar Tarjeta' : 'Crear Tarjeta' }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Número</label>
                                        <input class="form-control w-100" name="numero" placeholder="Número generado automáticamente" value="{{ old('numero', $tarjeta->numero ?? $numeroTarjeta ?? '') }}" readonly />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">CVV</label>
                                        <input class="form-control w-100" name="cvv" placeholder="CVV generado automáticamente" value="{{ old('cvv', $tarjeta->cvv ?? $cvv ?? '') }}" readonly />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Límite</label>
                                        <input class="form-control w-100" type="number" step="0.01" min="0" name="limite" placeholder="Ingrese el límite" value="{{ old('limite', $tarjeta->limite ?? '') }}" required />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Cuenta</label>
                                        <select name="cuenta_id" class="form-control w-100" required>
                                            <option value="">Seleccione una cuenta</option>
                                            @foreach($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id }}" {{ (old('cuenta_id', $tarjeta->cuenta_id ?? '') == $cuenta->id) ? 'selected' : '' }}>
                                                    {{ $cuenta->numero }} - {{ $cuenta->user->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Estado</label>
                                        <select name="estado_id" class="form-control w-100" required>
                                            <option value="">Seleccione un estado</option>
                                            @foreach($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ (old('estado_id', $tarjeta->estado_id ?? '') == $estado->id) ? 'selected' : '' }}>
                                                    {{ $estado->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <a href="{{ route('tarjetas.index') }}" id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">Regresar</a>
                            <button type="submit" id="procesarBtn" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">{{ isset($tarjeta) ? 'Guardar cambios' : 'Enviar' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: @json($errors->first())
                    });
                });
            </script>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('kt_ecommerce_edit_order_form');
                form.addEventListener('submit', function (event) {
                    const fields = [
                        {name: 'limite', message: 'Por favor, ingrese el límite.'},
                        {name: 'cuenta_id', message: 'Por favor, seleccione una cuenta.'},
                        {name: 'estado_id', message: 'Por favor, seleccione el estado de la tarjeta.'}
                    ];
                    let hasError = false;
                    for (const field of fields) {
                        const input = form.querySelector(`[name="${field.name}"]`);
                        if (!input || !input.value.trim()) {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: field.message
                            });
                            input?.focus();
                            hasError = true;
                            break;
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-layouts.app>