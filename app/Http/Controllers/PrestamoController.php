<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Cuenta;
use App\Models\EstadoPrestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['cuenta.user', 'estadoPrestamo'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $cuentas = Cuenta::with('user')->get();
        $estadosPrestamo = EstadoPrestamo::all();
        return view('prestamos.create', compact('cuentas', 'estadosPrestamo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'interes' => 'required|numeric|min:0',
            'plazo' => 'required|integer|min:1',
            'cuenta_id' => 'required|exists:cuentas,id',
            'estado_prestamo_id' => 'required|exists:estados_prestamo,id',
        ]);

        Prestamo::create($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado.');
    }

    public function edit(Prestamo $prestamo)
    {
        $cuentas = Cuenta::with('user')->get();
        $estadosPrestamo = EstadoPrestamo::all();
        return view('prestamos.edit', compact('prestamo', 'cuentas', 'estadosPrestamo'));
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load(['cuenta.user', 'pagos', 'estadoPrestamo']);
        return view('prestamos.show', compact('prestamo'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $validated = $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'interes' => 'required|numeric|min:0',
            'plazo' => 'required|integer|min:1',
            'cuenta_id' => 'required|exists:cuentas,id',
            'estado_prestamo_id' => 'required|exists:estados_prestamo,id',
        ]);

        $prestamo->update($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado.');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado.');
    }
}