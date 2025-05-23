<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        {{-- ALERTAS DE MENSAJES --}}
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-check-circle fa-lg me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-exclamation-triangle fa-lg me-2"></i>
                <div>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ isset($pago) ? route('pagos.update', $pago) : route('pagos.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @if(isset($pago)) @method('PUT') @endif
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ isset($pago) ? 'Editar Pago' : 'Nuevo Pago' }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Monto</label>
                                        <input class="form-control w-100" type="number" step="0.01" name="monto" value="{{ old('monto', request('monto', $pago->monto ?? '')) }}" readonly />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Fecha de Pago</label>
                                        <input class="form-control w-100" type="date" name="fecha_pago" value="{{ old('fecha_pago', $pago->fecha_pago ?? date('Y-m-d')) }}" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Préstamo</label>
                                        <select name="prestamo_id" class="form-control w-100" {{ request('prestamo_id') ? 'disabled' : '' }}>
    @foreach($prestamos as $prestamo)
        <option value="{{ $prestamo->id }}" {{ (old('prestamo_id', request('prestamo_id', $pago->prestamo_id ?? '')) == $prestamo->id) ? 'selected' : '' }}>
            {{ $prestamo->cuenta && $prestamo->cuenta->user ? $prestamo->cuenta->user->name : 'Sin titular' }} - {{ $prestamo->cuenta->numero }} (ID {{ $prestamo->id }})
        </option>
    @endforeach
</select>
@if(request('prestamo_id'))
    <input type="hidden" name="prestamo_id" value="{{ request('prestamo_id') }}">
@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
    $prestamoSeleccionado = null;
    if(request('prestamo_id')) {
        $prestamoSeleccionado = $prestamos->firstWhere('id', request('prestamo_id'));
    } elseif(old('prestamo_id')) {
        $prestamoSeleccionado = $prestamos->firstWhere('id', old('prestamo_id'));
    }
    $pagado = $prestamoSeleccionado && $prestamoSeleccionado->pagos->sum('monto') >= ($prestamoSeleccionado->monto + ($prestamoSeleccionado->monto * $prestamoSeleccionado->interes / 100));
@endphp
@if($pagado)
    <div class="alert alert-warning">Este préstamo ya está completamente pagado. No se pueden registrar más pagos.</div>
@endif
<div class="card-footer d-flex justify-content-end gap-3">
    <button class="btn btn-success" {{ $pagado ? 'disabled' : '' }}>Guardar</button>
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>