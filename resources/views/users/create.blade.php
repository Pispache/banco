<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar aquí estilos personalizados para usuarios si es necesario --}}
    </x-slot>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="user_create_form" class="form d-flex flex-column flex-lg-row" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Crear Usuario</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5 gap-md-7">
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Nombre completo</label>
                                        <input class="form-control w-100" type="text" name="name" value="{{ old('name') }}" required />
                                        @if($errors->has('name'))
                                            <span class="text-danger small">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">DPI</label>
                                        <input class="form-control w-100" type="text" name="dpi" maxlength="13" minlength="13" pattern="\d{13}" value="{{ old('dpi') }}" required />
                                        @if($errors->has('dpi'))
                                            <span class="text-danger small">{{ $errors->first('dpi') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Fecha de nacimiento</label>
                                        <input class="form-control w-100" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required />
                                        @if($errors->has('fecha_nacimiento'))
                                            <span class="text-danger small">{{ $errors->first('fecha_nacimiento') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Dirección</label>
                                        <input class="form-control w-100" type="text" name="direccion" value="{{ old('direccion') }}" required />
                                        @if($errors->has('direccion'))
                                            <span class="text-danger small">{{ $errors->first('direccion') }}</span>
                                        @endif
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Teléfono</label>
                                        <input class="form-control w-100" type="text" name="telefono" maxlength="8" minlength="8" pattern="\d{8}" value="{{ old('telefono') }}" required />
                                        @if($errors->has('telefono'))
                                            <span class="text-danger small">{{ $errors->first('telefono') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Correo</label>
                                        <input class="form-control w-100" type="email" name="email" value="{{ old('email') }}" required />
                                        @if($errors->has('email'))
                                            <span class="text-danger small">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Contraseña</label>
                                        <input class="form-control w-100" type="password" name="password" required />
                                        @if($errors->has('password'))
                                            <span class="text-danger small">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="fv-row flex-row-fluid">
                                        <label class="required form-label">Confirmar Contraseña</label>
                                        <input class="form-control w-100" type="password" name="password_confirmation" required />
                                        @if($errors->has('password_confirmation'))
                                            <span class="text-danger small">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('user_create_form');
                form.addEventListener('submit', function (event) {
                    const fields = [
                        {name: 'name', message: 'Por favor, ingrese el nombre completo.'},
                        {name: 'dpi', message: 'Por favor, ingrese el DPI (13 dígitos).'},
                        {name: 'fecha_nacimiento', message: 'Por favor, ingrese la fecha de nacimiento.'},
                        {name: 'direccion', message: 'Por favor, ingrese la dirección.'},
                        {name: 'telefono', message: 'Por favor, ingrese el teléfono (8 números).'},
                        {name: 'email', message: 'Por favor, ingrese el correo.'},
                        {name: 'password', message: 'Por favor, ingrese la contraseña.'},
                        {name: 'password_confirmation', message: 'Por favor, confirme la contraseña.'}
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
                        // Validación específica para DPI y Teléfono
                        if (field.name === 'dpi' && !/^\d{13}$/.test(input.value.trim())) {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El DPI debe tener exactamente 13 dígitos numéricos.'
                            });
                            input.focus();
                            hasError = true;
                            break;
                        }
                        if (field.name === 'telefono' && !/^\d{8}$/.test(input.value.trim())) {
                            event.preventDefault();
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El teléfono debe tener exactamente 8 números.'
                            });
                            input.focus();
                            hasError = true;
                            break;
                        }
                    }
                    // Validación de coincidencia de contraseñas
                    const pass = form.querySelector('[name="password"]');
                    const passConf = form.querySelector('[name="password_confirmation"]');
                    if (pass && passConf && pass.value !== passConf.value) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Las contraseñas no coinciden.'
                        });
                        passConf.focus();
                        hasError = true;
                    }
                });
            });
        </script>
    </x-slot>
</x-layouts.app>