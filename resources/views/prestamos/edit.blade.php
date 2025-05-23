<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ route('prestamos.update', $prestamo->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Editar Préstamo</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Monto</label>
                                        <input class="form-control" type="number" step="0.01" name="monto_disabled" value="{{ old('monto', $prestamo->monto ?? '') }}" disabled />
                                        <input type="hidden" name="monto" value="{{ old('monto', $prestamo->monto ?? '') }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Interés (%)</label>
                                        <input class="form-control" type="number" step="0.01" name="interes_disabled" value="{{ old('interes', $prestamo->interes ?? '') }}" disabled />
                                        <input type="hidden" name="interes" value="{{ old('interes', $prestamo->interes ?? '') }}" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Plazo (meses)</label>
                                        <input class="form-control" type="number" name="plazo_disabled" value="{{ old('plazo', $prestamo->plazo ?? '') }}" disabled />
                                        <input type="hidden" name="plazo" value="{{ old('plazo', $prestamo->plazo ?? '') }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Cuenta</label>
                                        <select name="cuenta_id_disabled" class="form-control w-100" disabled>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($cuentas as $cuenta)
                                                <option value="{{ $cuenta->id }}" {{ old('cuenta_id', $prestamo->cuenta_id ?? '') == $cuenta->id ? 'selected' : '' }}>
                                                    {{ $cuenta->numero }} - {{ $cuenta->user ? $cuenta->user->name : 'Sin titular' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="cuenta_id" value="{{ old('cuenta_id', $prestamo->cuenta_id ?? '') }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Estado del Préstamo</label>
                                        <select name="estado_prestamo_id" class="form-control w-100">
                                            @foreach($estadosPrestamo as $estado)
                                                <option value="{{ $estado->id }}" {{ old('estado_prestamo_id', $prestamo->estado_prestamo_id ?? '') == $estado->id ? 'selected' : '' }}>
                                                    {{ $estado->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3">
                            <button class="btn btn-success">Guardar</button>
                            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>