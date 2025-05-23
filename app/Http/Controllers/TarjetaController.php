<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use App\Models\Cuenta;
use App\Models\EstadoTarjeta;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    public function index()
    {
        $tarjetas = Tarjeta::with(['cuenta', 'estadoTarjetas'])->get();
        return view('tarjetas.index', compact('tarjetas'));
    }

    public function create()
    {
        $cuentas = Cuenta::with('user')->get();
        $estados = EstadoTarjeta::all();
        $numeroTarjeta = $this->generarNumeroTarjeta();
        $cvv = $this->generarCVV();
        return view('tarjetas.create', compact('cuentas', 'numeroTarjeta', 'cvv', 'estados'));
    }

    private function generarCVV()
    {
        return str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
    }

    private function generarNumeroTarjeta()
    {
        // Ejemplo: 16 dígitos aleatorios
        return str_pad(mt_rand(0, 9999999999999999), 16, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:tarjetas',
            'estado_id' => 'required|exists:estado_tarjetas,id',
            'cvv' => 'required|digits:3',
            'limite' => 'required|numeric|min:0',
            'cuenta_id' => 'required|exists:cuentas,id'
        ]);

        Tarjeta::create($request->except('_token'));

        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta creada.');
    }

    public function edit(Tarjeta $tarjeta)
    {
        $cuentas = Cuenta::all();
        $estados = EstadoTarjeta::all();
        return view('tarjetas.edit', compact('tarjeta', 'cuentas', 'estados'));
    }

    public function update(Request $request, Tarjeta $tarjeta)
    {
        $request->validate([
            'numero' => 'required|unique:tarjetas,numero,' . $tarjeta->id,
            'cvv' => 'required|digits:3',
            'limite' => 'required|numeric|min:0',
            'cuenta_id' => 'required|exists:cuentas,id',
            'estado_id' => 'required|exists:estado_tarjetas,id',
        ]);

        $tarjeta->update($request->all());

        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta actualizada.');
    }

    public function destroy(Tarjeta $tarjeta)
    {
        $tarjeta->delete();
        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta eliminada.');
    }
}