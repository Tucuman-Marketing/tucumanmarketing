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
use Modules\Recruitment\Http\Services\Admin\StatusService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;

class StatusController extends AdminBaseController
{
    public function index()
    {
        return view('recruitment::admin.status.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new StatusService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = RecruitmentStatuses::where('uuid', $uuid)->first();
        return view('recruitment::admin.status.forms.show', ['data' => $item ]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentStatuses();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.status.index');
    }

    public function edit($uuid)
    {
        $item = RecruitmentStatuses::where('uuid', $uuid)->first();
        return view('recruitment::admin.status.forms.edit', ['data' => $item ]);
    }

    public function update(Request $request)
    {

        $item = RecruitmentStatuses::where('uuid', $request['uuid'])->first();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.recruitment.status.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentStatuses::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.status.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentStatuses::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }
        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.status.index');
    }

}
