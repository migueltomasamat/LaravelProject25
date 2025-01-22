<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Requests\UpdateInmuebleRequest;
use App\Models\Inmueble;
use Dotenv\Validator;
use Faker\Calculator\Inn;
use Illuminate\Validation\Rules\In;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inmueble::all();
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
    public function store(StoreInmuebleRequest $request)
    {


        $inmueble=new Inmueble();
        return $inmueble->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        return Inmueble::query()->with('ciudad')->findOrFail($inmueble->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inmueble $inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInmuebleRequest $request, Inmueble $inmueble)
    {
        //
        $validator = new \Illuminate\Validation\Validator();

        $validator->validate([

        ]);

        return $inmueble->update($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inmueble $inmueble)
    {
        return $inmueble->delete();
    }
}
