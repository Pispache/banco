<x-layouts.app>
    <x-slot name="header">
        <h2 class="fw-bold fs-2 text-gray-700 mb-4">
            <i class="ki-outline ki-user fs-2x me-2"></i> Perfil de Usuario
        </h2>
    </x-slot>

    <div class="container py-8">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Card: Información de perfil -->
                <div class="card mb-5 border-0 shadow-sm rounded-3 bg-white">
                    <div class="card-header border-0 d-flex justify-content-center align-items-center p-4" style="background:transparent; color:#181C32;">
                        <div class="rounded-circle bg-light p-2 me-2 d-flex align-items-center justify-content-center" style="width:44px; height:44px;">
                            <i class="ki-outline ki-user fs-2" style="color:#181C32;"></i>
                        </div>
                        <span class="fs-5 fw-semibold" style="color:#181C32;">Información de Perfil</span>
                    </div>
                    <div class="card-body p-4">
                        @include('profile.partials.update-profile-information-form')
                        <div class="d-flex justify-content-end">
                            <!-- Botones de acción -->
                        </div>
                    </div>
                </div>
                <!-- Card: Cambiar contraseña -->
                <div class="card mb-5 border-0 shadow-sm rounded-3 bg-white">
                    <div class="card-header border-0 d-flex justify-content-center align-items-center p-4" style="background:transparent; color:#181C32;">
                        <div class="rounded-circle bg-light p-2 me-2 d-flex align-items-center justify-content-center" style="width:44px; height:44px;">
                            <i class="ki-outline ki-lock fs-2" style="color:#181C32;"></i>
                        </div>
                        <span class="fs-5 fw-semibold" style="color:#181C32;">Actualizar Contraseña</span>
                    </div>
                    <div class="card-body p-4">
                        @include('profile.partials.update-password-form')
                        <div class="d-flex justify-content-end">
                            <!-- Botones de acción -->
                        </div>
                    </div>
                </div>
                <!-- Card: Eliminar cuenta -->
                
            </div>
        </div>
    </div>
</x-layouts.app>
