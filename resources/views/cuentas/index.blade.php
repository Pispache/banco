<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar aquí estilos personalizados para cuentas si es necesario --}}
    </x-slot>
    
    <div class="d-flex flex-column flex-column-fluid">
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
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Buscar cuenta" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <a type="button" class="btn btn-success" href="{{ route('cuentas.create') }}">
                                    <i class="fas fa-plus fs-4 me-2"></i>
                                    Crear cuenta
                                </a>
                            </div>
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Seleccionados</div>
                                <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Eliminar seleccionados</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-70px">Número</th>
                                    <th class="min-w-70px">Tipo</th>
                                    <th class="min-w-70px">Saldo</th>
                                    <th class="min-w-70px">Estado</th>
                                    <th class="min-w-70px">Cliente</th>
                                    <th class="min-w-70px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-center text-gray-600">
                                @foreach($cuentas as $cuenta)
                                    <tr>
                                        <td>{{ $cuenta->numero }}</td>
                                        <td>{{ $cuenta->tipo }}</td>
                                        <td>Q{{ number_format($cuenta->saldo, 2) }}</td>
                                        <td>{{ $cuenta->statusCuenta->nombre }}</td>
                                        <td>{{ $cuenta->user->name }}</td>
                                        <td>
                                            <a href="{{ route('cuentas.edit', $cuenta) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('cuentas.destroy', $cuenta) }}" method="POST" style="display:inline-block;">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta cuenta?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        {{-- Puedes agregar aquí scripts personalizados para cuentas si es necesario --}}
    </x-slot>
</x-layouts.app>