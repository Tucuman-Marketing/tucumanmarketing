<?php

namespace Modules\Recruitment\Http\Controllers\Admin;

use Illuminate\Http\Request;
//MODELS
use Modules\Recruitment\Entities\RecruitmentCandidatesStatuses;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Recruitment\Http\Services\Admin\CandidatesStatusService;

class CandidatesStatusController extends AdminBaseController
{
    public function index()
    {
        return view('recruitment::admin.candidatesStatus.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new CandidatesStatusService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = RecruitmentCandidatesStatuses::where('uuid', $uuid)->first();
        return view('recruitment::admin.candidatesStatus.forms.show', ['data' => $item ]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentCandidatesStatuses();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.candidatesStatus.index');
    }

    public function edit($uuid)
    {
        $item = RecruitmentCandidatesStatuses::where('uuid', $uuid)->first();
        return view('recruitment::admin.candidatesStatus.forms.edit', ['data' => $item ]);
    }

    public function update(Request $request)
    {

        $item = RecruitmentCandidatesStatuses::where('uuid', $request['uuid'])->first();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.recruitment.candidatesStatus.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentCandidatesStatuses::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.candidatesStatus.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentCandidatesStatuses::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }
        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.candidatesStatus.index');
    }

}
