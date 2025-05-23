<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ isset($cuenta) ? route('cuentas.update', $cuenta) : route('cuentas.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @if(isset($cuenta)) @method('PUT') @endif
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ isset($cuenta) ? 'Editar Cuenta' : 'Nueva Cuenta' }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Número de Cuenta</label>
                                        <input class="form-control w-100" name="numero" placeholder="Número generado automáticamente" value="{{ old('numero', $cuenta->numero ?? $numeroCuenta ?? '') }}" readonly />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Tipo</label>
                                        <select name="tipo" class="form-control w-100">
                                            @foreach(['AHORRO', 'CORRIENTE', 'PLAZO'] as $tipo)
                                                <option value="{{ $tipo }}" {{ (old('tipo', $cuenta->tipo ?? '') == $tipo) ? 'selected' : '' }}>{{ $tipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Saldo</label>
                                        <input class="form-control w-100" type="number" step="0.01" name="saldo" value="{{ old('saldo', $cuenta->saldo ?? 0) }}" />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Cliente</label>
                                        <select name="user_id" class="form-control w-100">
                                            <option value="">--Seleccione un cliente--</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ (old('user_id', $cuenta->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Estado</label>
                                        <select name="estado_id" class="form-control w-100" required>
                                            <option value="">--Seleccione un estado--</option>
                                            @foreach($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ (old('estado_id', $cuenta->estado_id ?? '') == $estado->id) ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3">
                            <button class="btn btn-success">Guardar</button>
                            <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>