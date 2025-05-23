// Archivo obsoleto, controlador ClienteController eliminado. Usar User en su lugar.

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\StatusCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {

        $clientes = Cliente::with(['statusCliente'])->get();
        return view('clientes.index', compact('clientes'));
    }
    

    public function create()
    {
        $statusClientes = StatusCliente::all();
        return view('clientes.create', compact('statusClientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'dpi' => 'required|digits:13|unique:clientes',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:clientes',
            'status_cliente_id' => 'required'
        ]);

        Cliente::create($request->all());

        // Ruta 'clientes.index' eliminada. Puedes redirigir a otra ruta existente, por ejemplo:
// return redirect()->route('users.index')->with('success', 'Cliente creado correctamente.');
return back()->with('success', 'Cliente creado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        $statusClientes = StatusCliente::all();
        return view('clientes.edit', compact('cliente', 'statusClientes'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre_completo' => 'required',
            'dpi' => 'required|digits:13|unique:clientes,dpi,' . $cliente->id,
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id
        ]);

        $cliente->update($request->all());

        // Ruta 'clientes.index' eliminada. Puedes redirigir a otra ruta existente, por ejemplo:
// return redirect()->route('users.index')->with('success', 'Cliente actualizado.');
return back()->with('success', 'Cliente actualizado.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        // Ruta 'clientes.index' eliminada. Puedes redirigir a otra ruta existente, por ejemplo:
// return redirect()->route('users.index')->with('success', 'Cliente eliminado.');
return back()->with('success', 'Cliente eliminado.');
    }
}