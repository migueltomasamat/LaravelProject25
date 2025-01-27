<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Requests\UpdateInmuebleRequest;
use App\Models\Inmueble;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;

class InmuebleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'msg'=>'Datos de los inmuebles disponibles',
            'data'=>Inmueble::all(),
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInmuebleRequest $request)
    {

        $inmueble= new Inmueble();
        $inmueble->numcat = $request->numcat;
        $inmueble->direccion = $request->direccion;
        $inmueble->numero = $request->numero;
        $inmueble->bloque = $request->bloque;
        $inmueble->piso = $request->piso;
        $inmueble->puerta = $request->puerta;
        $inmueble->ciudad_id=$request->ciudad;
        $inmueble->propietario_id = $request->propietario;

        if (!$inmueble->save()){
            return response()->json([
                'msg'=>'Ha habido un fallo al guardar el inmueble',
                'data'=>$inmueble
            ],Response::HTTP_CONFLICT);
        }else{
            return response()->json([
                'msg'=>'El inmueble se ha guardado correctamente',
                'data'=>$inmueble
            ],Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        return response()->json([
            'msg'=>'Datos del inmueble',
            'data'=>Inmueble::with('propietario')->findOrFail($inmueble->id),
        ],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInmuebleRequest $request, Inmueble $inmueble)
    {
        $resultado =$inmueble->update($request->all($inmueble->fillable));

        if ($resultado){
            return response()->json([
                'msg'=>'El inmueble ha sido actualizado correctamente',
                'data'=>$inmueble
            ],Response::HTTP_ACCEPTED);
        }else{
            return response()->json([
                'msg'=>'El inmueble no se ha podido actualizar',
                'data'=>$inmueble
                ],Response::HTTP_NOT_MODIFIED);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inmueble $inmueble)
    {
        if ($inmueble->delete()){
            return response()->json([
                'msg'=>'El inmueble ha sido borrado correctamente',
                'data'=> $inmueble
            ],Response::HTTP_GONE);
        }else{
            return response()->json([
                'msg'=>'Ha habido un problema al borrar el inmueble',
                'data'=> $inmueble
            ],Response::HTTP_CONFLICT);
        }
    }

    public function destroyAll(){
        $user=Auth::user();
        if ($user->hasRole('Admin')){
            //Eliminar todos los inmuebles
            //DB::table('inmuebles')->delete();

            return response()->json([
                'message'=>'Se han borrado todos los inmuebles',
                'data'=>null
            ]);
        }else{
            return response()->json([
                'message'=>'El usuario no tiene permisos para borrar',
                'data'=>null
            ]);
        }


    }
}
