<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cobrador;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\ClienteCobrador;
use Illuminate\Support\Facades\Storage;

class CobradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cobradores = DB::table('users')
                       ->join('cobradores', 'users.id', '=', 'cobradores.userID')
                       ->select('users.*', 'cobradores.sueldo', 'cobradores.telefono', 'cobradores.email_empresa')
                       ->where('users.rolId','=',3)
                       ->get();

        return view('components.colaboradores.cobradores',compact('cobradores'));
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
        $empleado -> imagen = $request -> input('imagen');
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
        $empleado -> rolId = 3;
        $empleado->save();
        $userId = User::select('id')->orderBy('id', 'desc')->first();
        $cobrador = new Cobrador();
        $cobrador -> sueldo = $request -> input('sueldo');
        $cobrador -> telefono = $request ->input('telefono');
        $cobrador -> email_empresa = $request -> input('email_empresa');
        $cobrador -> userID = $userId->id;

        if($cobrador -> save()){
            return redirect('/cobradores')->with('msg', 'añadido correctamente');
        }
        return redirect('/cobradores')->with('msg', 'ocurrio un error');

    }

    /**
     * Display the specified resource.
     */
    public function showclients($id)
    {
        $cobrador  = ClienteCobrador::select('clientes.*','cobradores.*','clientes.id AS clienteID')->join('clientes','clientes.id','=','cliente_cobrador.clienteID')
                                    ->join('cobradores','cobradores.userID','=','cliente_cobrador.cobradorID')
                                    ->join('users','users.id','=','cobradores.userID')
                                    ->where('users.id','=',$id)
                                    ->get();

        if(!$cobrador)
        {
            return response()->json([
                'message' => 'the cobrador does not exist',
                'status'=>500
            ]);
        }

        return response()->json([
            'message' => 'clientes',
            'data'=>$cobrador,
            'status'=>200
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
        $request -> validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'nombreUsuario' => 'required',
            'fechaCumple' => 'required',
            'email' => 'required|email',
        ]);

        $empleado = User::findOrFail($id);
        $empleado ->nombres = $request -> input('nombres');
        $empleado ->apellidos = $request -> input('apellidos');
        $empleado ->nombreUsuario = $request -> input('nombreUsuario');
        $empleado ->fechaCumple = $request -> input('fechaCumple');
        $empleado ->email = $request -> input('email');
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
        $empleado ->rolId = 3;
        $empleado ->save();
        $cobrador = Cobrador::where('userID','=',$id)->first();
        $cobrador = Cobrador::findOrFail($cobrador->id);
        $cobrador -> sueldo = $request -> input('sueldo');
        $cobrador -> telefono = $request ->input('telefono');
        $cobrador -> email_empresa = $request -> input('email_empresa');
        $cobrador -> userID = $id;
        if($cobrador -> save()){
            return redirect('/cobradores')->with('msg', 'actualizado correctamente');
        }
        return redirect('/cobradores')->with('msg', 'ocurrio un error');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cobradorId = Cobrador::where('userID','=',$id)->first();
        $cobrador = Cobrador :: destroy($cobradorId->id);
        return redirect('/cobradores')->with('msg', 'eliminado correctamente');
    }
}
