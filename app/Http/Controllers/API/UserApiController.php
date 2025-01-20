<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name= $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            return response()->json([
                'message'=>'El usuario se ha guardado correctamente',
                'data'=>$user
                ],Response::HTTP_CREATED);
        }else{
            return response()->json([
                'message'=>'El usuario no se ha creado',
                'data'=>null
            ],Response::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ($user){
            return response()->json([
                'message'=>'Los datos del usuario'.$user->id,
                'data'=>$user
            ],Response::HTTP_FOUND);
        }else{
            return response()->json([
                'message'=>'No se ha encontrado al usuario '.$user->id,
                'data'=>null
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $modificado=$user->update([
            'name'=>$request->name??$user->name,
            'email'=>$request->email??$user->email,
            'address'=>$request->address??$user->address,
            'password'=>$request->password??$user->password,
        ]);

        if ($modificado){
            return response()->json([
                'message'=>'Los datos del usuario'.$user->id.'han sido modificados',
                'data'=>$user
            ],Response::HTTP_NO_CONTENT);
        }else{
            return response()->json([
                'message'=>'No se ha modificado el usuario '.$user->id,
                'data'=>null
            ],Response::HTTP_NOT_FOUND);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       if ($user->delete()){
           return response()->json([
               'message'=>'El usuario'. $user->id. " se ha eliminado correctamente",
               'data'=>null
           ],Response::HTTP_OK);
       }else{
           return response()->json([
               'message'=>'El usuario'. $user->id. " no se ha eliminado",
               'data'=>$user
           ],Response::HTTP_NOT_FOUND);
       }
    }

    public function ofertas (User $user){
        return $user->ofertas;
    }
}
