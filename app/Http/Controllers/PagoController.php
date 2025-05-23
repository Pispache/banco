<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use App\Models\EstadoPrestamo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('prestamo')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $prestamos = Prestamo::all();
        return view('pagos.create', compact('prestamos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'fecha_pago' => 'required|date',
            'prestamo_id' => 'required|exists:prestamos,id'
        ]);

        $prestamo = Prestamo::with('pagos')->find($request->prestamo_id);
        $totalPagado = $prestamo->pagos->sum('monto');
        $totalDeber = $prestamo->monto + ($prestamo->monto * $prestamo->interes / 100);
        if ($totalPagado >= $totalDeber) {
            return back()->withErrors(['prestamo_id' => 'Este préstamo ya está completamente pagado. No se pueden registrar más pagos.'])->withInput();
        }

        Pago::create($request->all());

        // Recalcular total pagado después de este pago
        $totalPagadoDespues = $prestamo->pagos->sum('monto') + $request->monto;
        if ($totalPagadoDespues >= $totalDeber) {
            // Buscar el id de estado "Cancelado"
            $estadoCancelado = EstadoPrestamo::where('nombre', 'Cancelado')->first();
            if ($estadoCancelado) {
                $prestamo->estado_prestamo_id = $estadoCancelado->id;
                $prestamo->save();
            }
        }

        return redirect()->route('pagos.index')->with('success', 'Pago registrado.');
    }

    public function edit(Pago $pago)
    {
        $prestamos = Prestamo::all();
        return view('pagos.edit', compact('pago', 'prestamos'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'fecha_pago' => 'required|date',
            'prestamo_id' => 'required|exists:prestamos,id'
        ]);

        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado.');
    }
}