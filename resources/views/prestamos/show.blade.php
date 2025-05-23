<x-layouts.app>
    <x-slot name="styles">
        {{-- Puedes agregar estilos aquí si es necesario --}}
    </x-slot>
    
    @php
        $totalPagado = $prestamo->pagos->sum('monto');
        $totalDeber = $prestamo->monto + ($prestamo->monto * $prestamo->interes / 100);
        $pagado = $totalPagado >= $totalDeber;
    @endphp
<div class="container py-4">
    
        <div class="row mb-4">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Detalle del Préstamo</h3>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Monto:</strong></div>
                            <div class="col-6">Q{{ number_format($prestamo->monto, 2) }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Interés:</strong></div>
                            <div class="col-6">{{ $prestamo->interes }}%</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Plazo:</strong></div>
                            <div class="col-6">{{ $prestamo->plazo }} meses</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Cuenta:</strong></div>
                            <div class="col-6">{{ $prestamo->cuenta->numero }} - {{ $prestamo->cuenta->user->name ?? 'Sin titular' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Estado:</strong></div>
                            <div class="col-6">
                                <span class="badge bg-{{ $prestamo->estadoPrestamo->nombre == 'Pagado' ? 'success' : ($prestamo->estadoPrestamo->nombre == 'Pendiente' ? 'warning text-dark' : 'secondary') }}">
                                    {{ $prestamo->estadoPrestamo->nombre ?? '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Calendario de Pagos</h5>
                        @if(!$pagado)
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-8 text-center">
                                    <a href="{{ route('pagos.create', ['prestamo_id' => $prestamo->id, 'monto' => round(($prestamo->monto + ($prestamo->monto * $prestamo->interes / 100)) / $prestamo->plazo, 2)]) }}"
                                    class="btn btn-lg btn-success shadow-lg px-5 py-3 d-inline-flex align-items-center gap-2"
                                    style="font-size: 1.2rem;">
                                        <i class="fas fa-money-bill-wave fa-lg"></i>
                                        <span>Pagar siguiente cuota</span>
                                        <span class="badge bg-light text-success ms-2" style="font-size:1rem;">Q{{ number_format(round(($prestamo->monto + ($prestamo->monto * $prestamo->interes / 100)) / $prestamo->plazo, 2), 2) }}</span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        <table class="table table-striped align-middle text-center">
                            <thead>
                                <tr>
                                    <th>Cuota #</th>
                                    <th>Fecha esperada</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Fecha de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cuota = round(($prestamo->monto + ($prestamo->monto * $prestamo->interes / 100)) / $prestamo->plazo, 2);
                                    $fechaInicio = $prestamo->created_at ?? now();
                                    $pagos = $prestamo->pagos->sortBy('fecha_pago');
                                @endphp
                                @for($i = 1; $i <= $prestamo->plazo; $i++)
                                    @php
                                        $fechaEsperada = \Carbon\Carbon::parse($fechaInicio)->addMonths($i-1)->format('Y-m-d');
                                        $pago = $pagos->get($i-1);
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $fechaEsperada }}</td>
                                        <td>Q{{ number_format($cuota, 2) }}</td>
                                        <td>
                                            @if($pago)
                                                <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Pagado</span>
                                            @else
                                                <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Pendiente</span>
                                            @endif
                                        </td>
                                        <td>{{ $pago ? $pago->fecha_pago : '-' }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="row mt-4">
                            <div class="col-md-8 mx-auto d-flex justify-content-between">
                                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Total pagado</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Q{{ number_format($prestamo->pagos->sum('monto'), 2) }}</h5>
                                    </div>
                                </div>
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Saldo pendiente</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Q{{ number_format(max(0, $prestamo->monto + ($prestamo->monto * $prestamo->interes / 100) - $prestamo->pagos->sum('monto')), 2) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto text-end">
                <a href="{{ route('prestamos.index') }}" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left me-2"></i>Volver</a>
            </div>
        </div>
    </div>
</x-layouts.app>
