<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <form class="form d-flex flex-column flex-lg-row" action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Editar Usuario</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Nombre</label>
                                        <input class="form-control w-100" type="text" name="name" value="{{ old('name', $user->name) }}" required />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Email</label>
                                        <input class="form-control w-100" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">DPI</label>
                                        <input class="form-control w-100" type="text" name="dpi" value="{{ old('dpi', $user->dpi) }}" required />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Fecha de nacimiento</label>
                                        <input class="form-control w-100" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}" required />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Dirección</label>
                                        <input class="form-control w-100" type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}" required />
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Teléfono</label>
                                        <input class="form-control w-100" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3">
                            <button class="btn btn-success">Guardar</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="scripts">
        {{-- Aquí puedes agregar scripts personalizados si lo requieres --}}
    </x-slot>
</x-layouts.app>
