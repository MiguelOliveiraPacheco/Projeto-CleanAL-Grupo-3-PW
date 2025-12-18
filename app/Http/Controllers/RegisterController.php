// app/Http/Controllers/RegisterController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilizador;

class RegisterController extends Controller
{
// Página de registo
public function registo()
{
return view('registo');
}

// Processar registo
public function store(Request $request)
{
$request->validate([
'nome' => 'required',
'email' => 'required|email|unique:utilizadores',
'password' => 'required|min:6',
'telefone' => 'required',
]);

// Criar utilizador
$utilizador = Utilizador::create([
'nome' => $request->nome,
'email' => $request->email,
'password' => Hash::make($request->password),
'telefone' => $request->telefone,
'morada' => $request->morada ?? '',
]);

// Login automático (opcional)
session(['user_id' => $utilizador->id]);
session(['user_nome' => $utilizador->nome]);

return redirect('/')->with('sucesso', 'Conta criada com sucesso!');
}
}
