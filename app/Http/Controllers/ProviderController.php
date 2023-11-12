<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers
 */
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::orderBy('id', 'desc')->paginate(25);

        return response()->json(['providers' => $providers], 200);
    }

    public function store(Request $request)
    {
        try {
            // Validar los datos de la solicitud
            $request->validate(Provider::$rules);

            // Crear un nuevo proveedor con los datos de la solicitud
            $provider = Provider::create($request->all());

            // Devolver una respuesta indicando que la creación fue exitosa
            return response()->json(['message' => 'Provider Created Successfully', 'provider' => $provider], 201);
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            return response()->json(['message' => 'Error Creating Provider', 'error' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        try {
            $provider = Provider::findOrFail($id);
            return response()->json(['provider' => $provider], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Provider Not Found'], 404);
        }
    }

    public function update(Request $request, Provider $provider)
    {
        try {
            // Validar los datos de la solicitud
            $request->validate(Provider::$rules);

            // Actualizar el proveedor con los datos de la solicitud
            $provider->update($request->all());

            // Devolver una respuesta indicando que la actualización fue exitosa
            return response()->json(['message' => 'Provider Updated Successfully', 'provider' => $provider], 200);
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            return response()->json(['message' => 'Error Updating Provider', 'error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
{
    try {
        // Buscar el proveedor por ID y eliminarlo
        $provider = Provider::findOrFail($id);
        $provider->delete();

        // Devolver una respuesta indicando que la eliminación fue exitosa
        return response()->json(['message' => 'Provider Deleted Successfully'], 200);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Capturar excepción si el proveedor no se encuentra y devolver un mensaje de error
        return response()->json(['message' => 'Provider Not Founded'], 404);
    } catch (\Exception $e) {
        // Capturar cualquier otra excepción y devolver un mensaje de error
        return response()->json(['message' => 'Error Deleting Provider', 'error' => $e->getMessage()], 500);
    }
}

}
