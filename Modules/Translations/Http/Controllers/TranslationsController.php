<?php

namespace Modules\Translations\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Translations\Entities\MultilanguageEntitie;

class TranslationsController extends Controller
{

    public function index()
    {
        $multilanguageEntitie = MultilanguageEntitie::all();
        return view('translations::admin.translate.index', compact('multilanguageEntitie'));
    }


    public function create()
    {
        return view('translations::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('translations::show');
    }


    public function edit($id)
{
    $multilanguageEntitie = MultilanguageEntitie::findOrFail($id);

    // Obtiene el modelo asociado a la entidad multilenguaje
    $modelClass = $multilanguageEntitie->model_type;
    if (!class_exists($modelClass)) {
        // Opcional: Manejo de error si la clase del modelo no existe
        abort(404, "Modelo no encontrado");
    }

    $modelInstance = $modelClass::find($multilanguageEntitie->model_id);

    if (!$modelInstance) {
        // Opcional: Manejo de error si la instancia del modelo no existe
        abort(404, "Instancia del modelo no encontrada");
    }

    // Verifica si el modelo usa el trait TraitTranslate y actualiza las traducciones
    if (in_array('Modules\Translations\Traits\TraitTranslate', class_uses($modelInstance))) {
        $modelInstance->updateLanguageTranslations();
    }

    //actulizamos multilanguageEntitie
    $multilanguageEntitie->refresh();

    return view('translations::admin.translate.edit', compact('multilanguageEntitie'));
}



    public function update(Request $request, $id)
    {
        $multilanguageEntitie = MultilanguageEntitie::findOrFail($id);

        // Asegúrate de validar los datos entrantes según sea necesario
        $validatedData = $request->validate([
            // Reglas de validación para las traducciones
            // Por ejemplo: 'translations.*.*' => 'required|string'
        ]);

        // Actualizar las traducciones
        $multilanguageEntitie->translations = json_encode($request->get('translations'));
        $multilanguageEntitie->save();

        // Redireccionar después de actualizar con un mensaje de éxito
        return redirect()->route('translations.index')->with('success', 'Traducción actualizada con éxito');
    }


    public function destroy($id)
    {
        $multilanguageEntitie = MultilanguageEntitie::findOrFail($id);

        // Eliminar la entidad
        $multilanguageEntitie->delete();

        // Redireccionar después de eliminar con un mensaje de éxito
        return redirect()->route('translations.index')->with('success', 'Traducción eliminada con éxito');
    }

}
