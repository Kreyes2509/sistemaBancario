<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CobradorController;
use Illuminate\Support\Facades\DB;
use App\Models\Cobrador;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    private $CobradorController;

    public function __construct(){

        $this -> CobradorController = app(CobradorController::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = DB::table('users')
                       ->join('roles', 'users.rolId', '=', 'roles.id')
                       ->select('users.*','roles.rol')
                       ->where('users.rolId','=',1)->orwhere('users.rolId','=',2)
                       ->get();
        return view('components.Empleados.empleados',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([

            'nombres' => 'required',
            'apellidos' => 'required',
            'nombreUsuario' => 'required',
            'fechaCumple' => 'required',
            'email' => 'required|email',
        ]);

        $empleado = new User();
        $empleado -> nombres = $request -> input('nombres');
        $empleado -> apellidos = $request -> input('apellidos');
        $empleado -> nombreUsuario = $request -> input('nombreUsuario');
        $empleado -> fechaCumple = $request -> input('fechaCumple');
        $empleado -> email = $request -> input('email');
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $disk = Storage::disk("do");
            $finalPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            $storage = $disk->put("/fotosPerfil/img/" . $filename, file_get_contents($realPath), 'public');

            $url = $disk->url('fotosPerfil/img/' . $filename);
            $empleado->imagen = $url;

        }
        $empleado -> password = bcrypt('12345678');
        $empleado -> rolId = $request -> input('rolId');
        if($empleado -> save())
        {
            return redirect('/empleados')->with('msg', 'añadido correctamente');
        }

        return redirect('/empleados')->with('msg', 'ocurrio un error');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empleado = User :: find($id);

        if(!$empleado)
        {
            return response()->json([
                'message' => 'the employee does not exist',
                'status'=>500
            ]);
        }

        return response()->json([
            'message' => 'employee info',
            'data'=> $empleado,
            'status'=> 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request ->validate([

            'nombres' => 'required',
            'apellidos' => 'required',
            'nombreUsuario' => 'required',
            'fechaCumple' => 'required',
            'email' => 'required|email',
        ]);

        $empleado = User::findOrFail($id);
        $empleado -> nombres = $request -> input('nombres');
        $empleado -> apellidos = $request -> input('apellidos');
        $empleado -> nombreUsuario = $request -> input('nombreUsuario');
        $empleado -> fechaCumple = $request -> input('fechaCumple');
        $empleado -> email = $request -> input('email');
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            //dd($file);
            $disk = Storage::disk("do");
            $finalPath = 'img/';
            $filename = time() . '-' .$file->getClientOriginalName();
            $realPath = $file->getRealPath();
            $storage = Storage::disk("do")->put("/fotosPerfil/img/".$filename, file_get_contents($realPath),'public');

            $url = Storage::disk('do')->url('/fotosPerfil/img/'.$filename);
            //$uploadFile = $request->file('image')->move($finalPath, $filename);
            //$new_product->Img = $finalPath.$filename;
            $empleado->imagen = $url;
        }
        $empleado ->rolId = $request -> input('rolId');
        if($empleado -> save()){
            return redirect('/empleados')->with('msg', 'actualizado correctamente');
        }

        return redirect('/empleados')->with('msg', 'ocurrio un error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = User :: destroy($id);
        $cobrador = Cobrador::where('userID','=',$id)->first();
        if(!$cobrador){
            return redirect('/empleados')->with('msg', 'eliminado correctamente');
        }
        $this -> CobradorController -> destroy($cobrador->id);
        return redirect('/empleados')->with('msg', 'eliminado correctamente');
    }
}
