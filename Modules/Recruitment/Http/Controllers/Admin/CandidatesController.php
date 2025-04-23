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
use Modules\Recruitment\Entities\RecruitmentCategories;
use Modules\Recruitment\Entities\RecruitmentStatuses;
use Modules\Recruitment\Entities\RecruitmentSkills;
use Modules\Recruitment\Entities\RecruitmentTags;
use Modules\Recruitment\Entities\RecruitmentCandidates;
use Modules\Recruitment\Entities\RecruitmentCandidateEducation;
use Modules\Recruitment\Entities\RecruitmentCandidateLanguage;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Recruitment\Http\Services\Admin\CandidatesService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;

class CandidatesController extends AdminBaseController
{
    use FileUploadingTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }

    public function index()
    {
        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        return view('recruitment::admin.candidates.index',compact('statuses', 'categories', 'tags', 'skills'));
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new CandidatesService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $candidate = RecruitmentCandidates::where('uuid', $uuid)->first();

        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        $selectedSkills = $candidate->skills->pluck('id')->toArray();
        $selectedStatus = $candidate->status_id;

        return view('recruitment::admin.candidates.forms.show', ['data' => $candidate ,
            'statuses' => $statuses,
            'categories' => $categories,
            'tags' => $tags,
            'skills' => $skills,
            'selectedSkills' => $selectedSkills,
            'selectedStatus' => $selectedStatus
        ]);
    }

    public function store(Request $request)
    {
        $item = new RecruitmentCandidates();
        $item->name = $request['name'];
        $item->last_name = $request['last_name'];
        $item->email = $request['email'];
        $item->phone = $request['telephone'];
        $item->gender = $request['gender'];
        $item->linkedin = $request['linkedin'];
        $item->save();

        // Guardar el primer estudio
        if (!empty($request['title_1'])) {
            $candidateEducation1 = new RecruitmentCandidateEducation();
            $candidateEducation1->candidate_id = $item->id;
            $candidateEducation1->title = $request['title_1'];
            $candidateEducation1->education_level = $request['education_level_1'];
            $candidateEducation1->education_state = $request['education_state_1'];
            $candidateEducation1->save();
        }

        // Guardar el segundo estudio
        if (!empty($request['title_2'])) {
            $candidateEducation2 = new RecruitmentCandidateEducation();
            $candidateEducation2->candidate_id = $item->id;
            $candidateEducation2->title = $request['title_2'];
            $candidateEducation2->education_level = $request['education_level_2'];
            $candidateEducation2->education_state = $request['education_state_2'];
            $candidateEducation2->save();
        }

        // Guardar el tercer estudio
        if (!empty($request['title_3'])) {
            $candidateEducation3 = new RecruitmentCandidateEducation();
            $candidateEducation3->candidate_id = $item->id;
            $candidateEducation3->title = $request['title_3'];
            $candidateEducation3->education_level = $request['education_level_3'];
            $candidateEducation3->education_state = $request['education_state_3'];
            $candidateEducation3->save();
        }

        // Guardar el primer lenguaje asociado
        if (!empty($request['language_1'])) {
            $candidateLanguage1 = new RecruitmentCandidateLanguage();
            $candidateLanguage1->candidate_id = $item->id;
            $candidateLanguage1->language = $request['language_1'];
            $candidateLanguage1->language_level = $request['language_level_1'];
            $candidateLanguage1->save();
        }

        // Guardar el segundo lenguaje asociado (si existe)
        if (!empty($request['language_2'])) {
            $candidateLanguage2 = new RecruitmentCandidateLanguage();
            $candidateLanguage2->candidate_id = $item->id;
            $candidateLanguage2->language = $request['language_2'];
            $candidateLanguage2->language_level = $request['language_level_2'];
            $candidateLanguage2->save();
        }

        // Guardar el tercer lenguaje asociado (si existe)
        if (!empty($request['language_3'])) {
            $candidateLanguage3 = new RecruitmentCandidateLanguage();
            $candidateLanguage3->candidate_id = $item->id;
            $candidateLanguage3->language = $request['language_3'];
            $candidateLanguage3->language_level = $request['language_level_3'];
            $candidateLanguage3->save();
        }

        // Actualizamos los skills
        if ($request->has('skills')) {
            $item->skills()->sync($request->skills);
        }

        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $item, $this->ckeditorFields, $this->filepondFields);

        //de mi relacion con media , guardar la ruta de mi file en cv - file_single
        $lastMedia = $item->getMedia('file')->last();
        $item->cv = $lastMedia ? $lastMedia->url : null;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.recruitment.candidates.index');
    }

    public function edit($uuid)
    {
        $candidate = RecruitmentCandidates::where('uuid', $uuid)->first();

        $statuses = RecruitmentStatuses::all();
        $categories = RecruitmentCategories::all();
        $tags = RecruitmentTags::all();
        $skills = RecruitmentSkills::all();

        $selectedSkills = $candidate->skills->pluck('id')->toArray();
        $selectedStatus = $candidate->status_id;

        return view('recruitment::admin.candidates.forms.edit', ['data' => $candidate ,
            'statuses' => $statuses,
            'categories' => $categories,
            'tags' => $tags,
            'skills' => $skills,
            'selectedSkills' => $selectedSkills,
            'selectedStatus' => $selectedStatus
        ]);
    }

    public function update(Request $request)
    {
        $item = RecruitmentCandidates::where('uuid', $request['uuid'])->first();
        $item->name = $request['name'];
        $item->last_name = $request['last_name'];
        $item->email = $request['email'];
        $item->phone = $request['telephone'];
        $item->gender = $request['gender'];
        $item->linkedin = $request['linkedin'];
        $item->save();

        // Guardar el primer estudio
        if (!empty($request['title_1'])) {
            $candidateEducation1 = new RecruitmentCandidateEducation();
            $candidateEducation1->candidate_id = $item->id;
            $candidateEducation1->title = $request['title_1'];
            $candidateEducation1->education_level = $request['education_level_1'];
            $candidateEducation1->education_state = $request['education_state_1'];
            $candidateEducation1->save();
        }

        // Guardar el segundo estudio
        if (!empty($request['title_2'])) {
            $candidateEducation2 = new RecruitmentCandidateEducation();
            $candidateEducation2->candidate_id = $item->id;
            $candidateEducation2->title = $request['title_2'];
            $candidateEducation2->education_level = $request['education_level_2'];
            $candidateEducation2->education_state = $request['education_state_2'];
            $candidateEducation2->save();
        }

        // Guardar el tercer estudio
        if (!empty($request['title_3'])) {
            $candidateEducation3 = new RecruitmentCandidateEducation();
            $candidateEducation3->candidate_id = $item->id;
            $candidateEducation3->title = $request['title_3'];
            $candidateEducation3->education_level = $request['education_level_3'];
            $candidateEducation3->education_state = $request['education_state_3'];
            $candidateEducation3->save();
        }

        // Guardar el primer lenguaje asociado
        if (!empty($request['language_1'])) {
            $candidateLanguage1 = new RecruitmentCandidateLanguage();
            $candidateLanguage1->candidate_id = $item->id;
            $candidateLanguage1->language = $request['language_1'];
            $candidateLanguage1->language_level = $request['language_level_1'];
            $candidateLanguage1->save();
        }

        // Guardar el segundo lenguaje asociado (si existe)
        if (!empty($request['language_2'])) {
            $candidateLanguage2 = new RecruitmentCandidateLanguage();
            $candidateLanguage2->candidate_id = $item->id;
            $candidateLanguage2->language = $request['language_2'];
            $candidateLanguage2->language_level = $request['language_level_2'];
            $candidateLanguage2->save();
        }

        // Guardar el tercer lenguaje asociado (si existe)
        if (!empty($request['language_3'])) {
            $candidateLanguage3 = new RecruitmentCandidateLanguage();
            $candidateLanguage3->candidate_id = $item->id;
            $candidateLanguage3->language = $request['language_3'];
            $candidateLanguage3->language_level = $request['language_level_3'];
            $candidateLanguage3->save();
        }

        // Actualizamos los skills
        if ($request->has('skills')) {
            $item->skills()->sync($request->skills);
        }

        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $item, $this->ckeditorFields, $this->filepondFields);

        //de mi relacion con media , guardar la ruta de mi file en cv - file_single
        $lastMedia = $item->getMedia('file')->last();
        $item->cv = $lastMedia ? $lastMedia->url : null;
        $item->save();

        sweetalert()->addSuccess('Registro actualizado.');
        return redirect()->route('admin.recruitment.candidates.index');
    }

    public function destroy(Request $request)
    {
        $item = RecruitmentCandidates::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.recruitment.candidates.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = RecruitmentCandidates::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.recruitment.candidates.index');
    }

}
