<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\EstadoCuenta;
use App\Models\User;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index()
    {
        $cuentas = Cuenta::with(['user', 'statusCuenta'])->get();
        return view('cuentas.index', compact('cuentas'));
    }

    public function create()
    {
        $users = User::where('role', 'cliente')->get();
        $estados = EstadoCuenta::all();
        $numeroCuenta = $this->generarNumeroCuenta();
        return view('cuentas.create', compact('users', 'estados', 'numeroCuenta'));
    }

    private function generarNumeroCuenta()
    {
        // Ejemplo: 4 dígitos banco + 10 dígitos aleatorios
        $banco = '1234'; // Cambia esto por el código de tu banco si quieres
        $aleatorio = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        return $banco . $aleatorio;
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:cuentas',
            'tipo' => 'required|in:AHORRO,CORRIENTE,PLAZO',
            'saldo' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'estado_id' => 'required|exists:estado_cuentas,id',
        ]);

        // Validación adicional: solo una cuenta de cada tipo por usuario
        $user = User::with('cuentas')->find($request->user_id);
        if ($user && $user->cuentas()->where('tipo', $request->tipo)->exists()) {
            return redirect()->route('cuentas.index')->withErrors([
                'tipo' => 'El usuario ya tiene una cuenta de tipo ' . ucfirst(strtolower($request->tipo)) . '.'
            ]);
        }

        Cuenta::create($request->except('_token'));

        return redirect()->route('cuentas.index')->with('success', 'Cuenta creada.');
    }

    public function edit(Cuenta $cuenta)
    {
        $users = User::where('role', 'cliente')->get();
        $estados = EstadoCuenta::all();
        return view('cuentas.edit', compact('cuenta', 'users', 'estados'));
    }

    public function update(Request $request, Cuenta $cuenta)
    {
        $request->validate([
            'numero' => 'required|unique:cuentas,numero,' . $cuenta->id,
            'tipo' => 'required|in:AHORRO,CORRIENTE,PLAZO',
            'saldo' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'estado_id' => 'required|exists:estado_cuentas,id',
        ]);

        $cuenta->update($request->only(['numero', 'tipo', 'saldo', 'user_id', 'estado_id']));

        return redirect()->route('cuentas.index')->with('success', 'Cuenta actualizada.');
    }

    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect()->route('cuentas.index')->with('success', 'Cuenta eliminada.');
    }
}