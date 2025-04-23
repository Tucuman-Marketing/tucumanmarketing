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
use Modules\Recruitment\Entities\RecruitmentCandidatesStatuses;
use Modules\Recruitment\Entities\RecruitmentJobCandidates;
use Modules\Recruitment\Entities\RecruitmentSkills;
use Modules\Recruitment\Entities\RecruitmentApplications;
use Modules\Recruitment\Entities\RecruitmentTags;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Recruitment\Http\Services\Admin\JobsService;
use Modules\Recruitment\Http\Services\Admin\CandidatesService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;
use Modules\Recruitment\Entities\RecruitmentCandidates;

class JobsController extends AdminBaseController
{
    public function index()
    {
        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        return view('recruitment::admin.jobs.index',compact('statuses', 'categories', 'tags', 'skills'));
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new JobsService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $job = RecruitmentJobs::where('uuid', $uuid)->first();

        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        $selectedSkills = $job->skills->pluck('id')->toArray();
        $selectedTags = $job->tags->pluck('id')->toArray();
        $selectedCategory = $job->category_id;
        $selectedStatus = $job->status_id;

        return view('recruitment::admin.jobs.forms.show', ['data' => $job ,
            'statuses' => $statuses,
            'categories' => $categories,
            'tags' => $tags,
            'skills' => $skills,
            'selectedSkills' => $selectedSkills,
            'selectedTags' => $selectedTags,
            'selectedCategory' => $selectedCategory,
            'selectedStatus' => $selectedStatus
        ]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentJobs();
        $item->title = $request['title'];
        $item->description = $request['description'];
        $item->category_id = $request['category'];
        $item->status_id = $request['status'];
        $item->work_mode = $request['work_mode'];
        $item->work_type = $request['work_type'];
        $item->country = $request['country'];
        $item->save();

        // Actualizamos los tags
        $item->tags()->sync($request->tags);

        // Actualizamos los skills
        $item->skills()->sync($request->skills);

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.jobs.index');
    }

    public function edit($uuid)
    {
        $job = RecruitmentJobs::where('uuid', $uuid)->first();

        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        $selectedSkills = $job->skills->pluck('id')->toArray();
        $selectedTags = $job->tags->pluck('id')->toArray();
        $selectedCategory = $job->category_id;
        $selectedStatus = $job->status_id;

        return view('recruitment::admin.jobs.forms.edit', ['data' => $job ,
            'statuses' => $statuses,
            'categories' => $categories,
            'tags' => $tags,
            'skills' => $skills,
            'selectedSkills' => $selectedSkills,
            'selectedTags' => $selectedTags,
            'selectedCategory' => $selectedCategory,
            'selectedStatus' => $selectedStatus
        ]);
    }

    public function update(Request $request)
    {
        $item = RecruitmentJobs::where('uuid', $request['uuid'])->first();
        $item->title = $request['title'];
        $item->description = $request['description'];
        $item->category_id = $request['category'];
        $item->status_id = $request['status'];
        $item->work_mode = $request['work_mode'];
        $item->work_type = $request['work_type'];
        $item->country = $request['country'];
        $item->update();

        // Actualizamos los tags
        $item->tags()->sync($request->tags);

        // Actualizamos los skills
        $item->skills()->sync($request->skills);

        sweetalert()->addSuccess('Registro actualizado.');
        return redirect()->route('admin.recruitment.jobs.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentJobs::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.jobs.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentJobs::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.jobs.index');
    }

    //candidates relacionados
    public function candidates($uuid)
    {
        $job = RecruitmentJobs::with(['candidates'])
            ->where('uuid', $uuid)
            ->first();

        $selectedSkills = $job->skills->pluck('id')->toArray();
        $selectedTags = $job->tags->pluck('id')->toArray();
        $selectedCategory = $job->category_id;
        $selectedStatus = $job->status_id;

        $statuses = RecruitmentCandidatesStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        return view('recruitment::admin.jobs.relationship.candidates.index', [
            'data' => $job,
            'statuses' => $statuses,
            'categories' => $categories,
            'tags' => $tags,
            'skills' => $skills,
            'selectedSkills' => $selectedSkills,
            'selectedTags' => $selectedTags,
            'selectedCategory' => $selectedCategory,
            'selectedStatus' => $selectedStatus
        ]);
    }

    public function candidatesByJob(Request $request, $jobId)
    {
        $searchService = new CandidatesService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters, $jobId);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function ChangeStatus(Request $request) {
        // Obtener el candidato por ID
        $candidate = RecruitmentJobCandidates::where('candidate_id', $request->id)->first();
        // Actualizar el status del candidato
        $candidate->candidate_status_id = $request->status_id;
        // Guardar los cambios
        $candidate->save();
        sweetalert()->addSuccess('Estatus modificado exitosamente.');
        // Redirigir o devolver una respuesta según tu necesidad
        return redirect()->back();
    }
    

}
