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
use Modules\Recruitment\Http\Services\Admin\SkillsService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;

class SkillsController extends AdminBaseController
{
    public function index()
    {
        return view('recruitment::admin.skills.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new SkillsService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = RecruitmentSkills::where('uuid', $uuid)->first();
        return view('recruitment::admin.skills.forms.show', ['data' => $item]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentSkills();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.skills.index');
    }

    public function edit($uuid)
    {
        $item = RecruitmentSkills::where('uuid', $uuid)->first();
        return view('recruitment::admin.skills.forms.edit', ['data' => $item ]);
    }

    public function update(Request $request)
    {
        $item = RecruitmentSkills::where('uuid', $request['uuid'])->first();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.recruitment.skills.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentSkills::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.skills.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentSkills::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }
        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.skills.index');
    }

}
