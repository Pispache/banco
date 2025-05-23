
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">

        
    <!--begin::Aside Menu-->
    <div class="hover-scroll-y my-2 my-lg-5 scroll-ms" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            <div class="menu-item {{ Request::is('/') ? 'here' : '' }} py-2">
                <a class="menu-link menu-center" href="/dashboard">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-home-2 fs-2x"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            
            <!-- Clientes -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('users*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-user fs-2x"></i>
                    </span>
                    <span class="menu-title">Usuarios</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('users.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Cuentas -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('cuentas*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-wallet fs-2x"></i>
                    </span>
                    <span class="menu-title">Cuentas</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('cuentas.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('cuentas.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Tarjetas -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('tarjetas*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-credit-cart fs-2x"></i>
                    </span>
                    <span class="menu-title">Tarjetas</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('tarjetas.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('tarjetas.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Transacciones -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('transacciones*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-wallet fs-2x"></i>
                    </span>
                    <span class="menu-title">Transacciones</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('transacciones.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('transacciones.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Préstamos -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('prestamos*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-bank fs-2x"></i>
                    </span>
                    <span class="menu-title">Préstamos</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('prestamos.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('prestamos.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Pagos -->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item {{ Request::is('pagos*') ? 'here' : '' }} py-2">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-dollar fs-2x"></i>
                    </span>
                    <span class="menu-title">Pagos</span>
                </span>
                <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('pagos.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ver</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{ route('pagos.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Crear</span>
                        </a>
                    </div>
                </div>
            </div>

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>