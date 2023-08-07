<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function dashboardView()
    {
        $empleados = DB::table('users')
                       ->join('roles', 'users.rolId', '=', 'roles.id')
                       ->select('users.*','roles.rol')
                       ->where('users.rolId','=',1)->orwhere('users.rolId','=',2)->get();

                       $cobradores = DB::table('users')
                       ->join('cobradores', 'users.id', '=', 'cobradores.userID')
                       ->select('users.*', 'cobradores.sueldo', 'cobradores.telefono', 'cobradores.email_empresa')
                       ->where('users.rolId','=',3)
                       ->get();

        $clientes = Cliente::all();


        return view('components.dashboard',compact('empleados','clientes','cobradores'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where("email", "=",$request->email)->first();

        if(!$user)
        {
            return redirect('/login')->with('msg', 'Username does not exist');
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->status_password == 0)
            {
                return redirect('/dashboard')->with('msg','Cambia tu contraseña en el apartado de perfil');
            }
            return redirect('/dashboard')->with('msg','Bienvenido!');
        }

        return redirect('/login')->with('msg','credenciales no validas');

    }


    public function singOut() {
        Session::flush();
        Auth::logout();

        return redirect('/login')->with('msg','singOut');
    }

    public function perfilView()
    {
        $user = User::where('users.id','=',Auth::user()->id)->get();

        return view('auth.perfil',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $perfil = User::find($id);
        $contraseña = bcrypt($request->input('password'));
        $perfil->password = $contraseña;
        $perfil->status_password = 1;
        $perfil->save();

        return redirect('/perfil')->with('msg','actualizado correctamente');
    }
}
