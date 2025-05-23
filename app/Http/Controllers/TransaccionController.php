<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Cuenta;
use App\Models\TipoTransaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::with('cuentaOrigen', 'cuentaDestino')->get();
        return view('transacciones.index', compact('transacciones'));
    }

    public function create()
    {
        $cuentas = Cuenta::all();
        $tiposTransaccion = TipoTransaccion::all();
        return view('transacciones.create', compact('cuentas', 'tiposTransaccion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_transaccion_id' => 'required|exists:tipos_transaccion,id',
            'monto' => 'required|numeric|min:0.01',
            'cuenta_origen_id' => 'required|exists:cuentas,id',
            'cuenta_destino_id' => 'nullable|exists:cuentas,id'
        ]);

        $tipo = TipoTransaccion::find($request->tipo_transaccion_id)->nombre;
        $cuentaOrigen = Cuenta::find($request->cuenta_origen_id);
        $cuentaDestino = $request->cuenta_destino_id ? Cuenta::find($request->cuenta_destino_id) : null;
        $monto = $request->monto;

        // Lógica para actualizar saldos
        if ($tipo === 'Retiro') {
            if ($cuentaOrigen->saldo < $monto) {
                return back()->withErrors(['monto' => 'Saldo insuficiente en la cuenta origen.'])->withInput();
            }
            $cuentaOrigen->saldo -= $monto;
            $cuentaOrigen->save();
        } elseif ($tipo === 'Deposito') {
            $cuentaOrigen->saldo += $monto;
            $cuentaOrigen->save();
        } elseif ($tipo === 'Transferencia') {
            if ($cuentaOrigen->saldo < $monto) {
                return back()->withErrors(['monto' => 'Saldo insuficiente en la cuenta origen.'])->withInput();
            }
            $cuentaOrigen->saldo -= $monto;
            $cuentaOrigen->save();
            if ($cuentaDestino) {
                $cuentaDestino->saldo += $monto;
                $cuentaDestino->save();
            }
        }

        Transaccion::create($request->all());

        return redirect()->route('transacciones.index')->with('success', 'Transacción registrada.');
    }

    public function edit(Transaccion $transaccion)
    {
        // Edición de transacciones no permitida para ningún tipo
        abort(403, 'No está permitido editar transacciones.');
    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'tipo_transaccion_id' => 'required|exists:tipos_transaccion,id',
            'monto' => 'required|numeric|min:0.01',
            'cuenta_origen_id' => 'required|exists:cuentas,id',
            'cuenta_destino_id' => 'nullable|exists:cuentas,id'
        ]);

        $transaccion->update($request->all());

        return redirect()->route('transacciones.index')->with('success', 'Transacción actualizada.');
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();
        return redirect()->route('transacciones.index')->with('success', 'Transacción eliminada.');
    }
}