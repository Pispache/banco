<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ route('pagos.update', $pago->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Editar Pago</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Monto</label>
                                        <input class="form-control" type="number" step="0.01" name="monto" value="{{ old('monto', $pago->monto ?? '') }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Fecha de Pago</label>
                                        <input class="form-control" type="date" name="fecha_pago" value="{{ old('fecha_pago', $pago->fecha_pago ?? date('Y-m-d')) }}" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Préstamo</label>
                                        <select class="form-control" name="prestamo_id">
                                            @foreach($prestamos as $prestamo)
                                                <option value="{{ $prestamo->id }}" {{ old('prestamo_id', $pago->prestamo_id ?? '') == $prestamo->id ? 'selected' : '' }}>
                                                    ID {{ $prestamo->id }} - Cuenta {{ $prestamo->cuenta->numero }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3">
                            <button class="btn btn-success">Guardar</button>
                            <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>