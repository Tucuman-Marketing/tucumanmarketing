<?php

namespace Modules\Recruitment\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

//TRAIT
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;
//REQUESTS

//MODELS
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentCategories;
use Modules\Recruitment\Entities\RecruitmentStatuses;
use Modules\Recruitment\Entities\RecruitmentSkills;
use Modules\Recruitment\Entities\RecruitmentApplications;
use Modules\Recruitment\Entities\RecruitmentTags;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Recruitment\Http\Services\Admin\CategoriesService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;

class CategoriesController extends AdminBaseController
{
    public function index()
    {
        return view('recruitment::admin.categories.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new CategoriesService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = RecruitmentCategories::where('uuid', $uuid)->first();
        return view('recruitment::admin.categories.forms.show', ['data' => $item]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentCategories();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.categories.index');
    }

    public function edit($uuid)
    {
        $item = RecruitmentCategories::where('uuid', $uuid)->first();
        return view('recruitment::admin.categories.forms.edit', ['data' => $item ]);
    }

    public function update(Request $request)
    {
        $item = RecruitmentCategories::where('uuid', $request['uuid'])->first();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.recruitment.categories.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentCategories::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.categories.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentCategories::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }
        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.categories.index');
    }

}
