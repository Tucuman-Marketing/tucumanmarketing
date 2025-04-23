<?php

namespace Modules\Translations\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Translations\Entities\MultilanguageEntitie;
use Modules\Translations\Entities\MultilanguageLanguage as Language;


class LanguageController extends Controller
{

    public function index()
    {
        //mandamos los lenguajes MultilanguageLanguage
        $languages = Language::all();

        return view('translations::admin.language.index', compact('languages'));
    }




    public function editStatus($id, Request $request)
    {
        $language = Language::findOrFail($id);
        $language->is_active = $request->input('is_active');
        $language->save();

        return response()->json(['message' => 'Estado actualizado con éxito']);
    }




}
