<?php

namespace Modules\WebContent\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Contracts\Support\Renderable;
use Modules\WebContent\Notifications\ContactFormNotification;
use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;

use App\Models\User;
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogTag;
use Modules\Recruitment\Entities\RecruitmentCandidates;
use Modules\Recruitment\Entities\RecruitmentCandidatesStatuses;
use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentStatuses;
use Modules\Recruitment\Entities\RecruitmentCategories;
use Modules\Recruitment\Entities\RecruitmentTags;
use Modules\Recruitment\Entities\RecruitmentSkills;
use Modules\Recruitment\Entities\RecruitmentCandidateLanguage;
use Modules\Recruitment\Entities\RecruitmentJobCandidates;
use Modules\Recruitment\Entities\RecruitmentCandidateEducation;

use Modules\WebContent\Traits\RecaptchaTrait;
use Illuminate\Support\Facades\Mail;

use Alert;

//notifications
use Illuminate\Support\Facades\Notification;
use Modules\WebContent\Notifications\ContactNotification;
use Modules\WebContent\Notifications\ContactCompanyNotification;


class PublicController extends Controller
{
    use FileUploadingTrait;
    use RecaptchaTrait;

    public function __construct()
    {
        // parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }

    public function index()
    {
        return view('webcontent::website.rrhh.home');
    }

    public function processWork()
    {
        return redirect()->route('public.index')->withFragment('process');
    }

    public function posts()
    {
        $title = 'Blog';
        $posts = BlogPost::where('published_at', '<=', now())->orderBy('published_at', 'desc')
        ->paginate(10);

        return view('webcontent::website.rrhh.posts',compact('posts','title'));
    }

    public function postsByCategory($category)
    {
        $category = BlogCategory::where('slug', $category)->first();
        $title = 'Publicaciones por Categoría: '.$category->name;
        $posts = BlogPost::where('category_id', $category->id)->where('published_at', '<=', now())->orderBy('published_at', 'desc')
        ->paginate(10);
        return view('webcontent::website.rrhh.posts',compact('posts','title'));
    }

    public function postsByTag($tag)
    {
        $tag = BlogTag::where('slug', $tag)->first();
        $title = 'Publicaciones por Etiqueta: '.$tag->name;
        $posts = $tag->posts()->where('published_at', '<=', now())->orderBy('published_at', 'desc')
        ->paginate(10);
        return view('webcontent::website.rrhh.posts',compact('posts','title'));
    }

    public function postDetails($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::inRandomOrder()->take(10)->get();

        //traeme post relacionados de la misma categoria
        $relatedPosts = BlogPost::where('category_id', $post->category_id)->where('id', '!=', $post->id)->inRandomOrder()->take(3)->get();

        return view('webcontent::website.rrhh.postDetails',compact('post','categories','tags','relatedPosts'));
    }

    public function positions()
    {
        return view('webcontent::website.rrhh.positions');
    }

    public function about()
    {
        return view('webcontent::website.rrhh.about');
    }

    public function faq()
    {
        return view('webcontent::website.rrhh.faq');
    }

    public function jobs()
    {
        $title = 'Oportunidades Laborales';
        $jobs = RecruitmentJobs::where('status_id', RecruitmentJobs::STATUS_ACTIVE) // Filtrar por estado activo
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $categories = RecruitmentCategories::withCount('jobs')
        ->having('jobs_count', '>', 0)
        ->get();

        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();

        return view('webcontent::website.rrhh.jobs',compact('jobs','categories','tags','title'));
    }

    public function jobsByCategory($category)
    {
        $category = RecruitmentCategories::where('slug', $category)->first();
        $title = 'Puestos por Categoría: '.$category->name;
        $jobs = RecruitmentJobs::where('status_id', RecruitmentJobs::STATUS_ACTIVE)
        ->where('category_id', $category->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $categories = RecruitmentCategories::withCount('jobs')
        ->having('jobs_count', '>', 0)
        ->get();

        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();

        return view('webcontent::website.rrhh.jobs',compact('jobs','title','categories','tags'));
    }

    public function jobsByTag($tag)
    {
        $tag = RecruitmentTags::where('slug', $tag)->first();
        $title = 'Puestos por Etiqueta: '.$tag->name;
        $jobs = $tag->jobs()
        ->where('status_id', RecruitmentJobs::STATUS_ACTIVE) // Filtrar por estado activo
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $categories = RecruitmentCategories::withCount('jobs')
        ->having('jobs_count', '>', 0)
        ->get();

        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();
        return view('webcontent::website.rrhh.jobs',compact('jobs','title','categories','tags'));
    }

    public function jobDetails(Request $request,$slug)
    {
        $id = $request->query('id');
        $job = RecruitmentJobs::findOrFail($id);
        $skills = RecruitmentSkills::all();
        $relatedJobs = RecruitmentJobs::where('category_id', $job->category_id)->where('id', '!=', $job->id)->inRandomOrder()->take(2)->get();

        $categories = RecruitmentCategories::withCount('jobs')
        ->having('jobs_count', '>', 0)
        ->get();

        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();
        return view('webcontent::website.rrhh.jobDetails',compact('job','categories','tags','relatedJobs','skills'));
    }

    public function jobEnrollment(Request $request,$slug)
    {
        $id = $request->query('id');
        $job = RecruitmentJobs::findOrFail($id);
        $skills = RecruitmentSkills::all();
        $relatedJobs = RecruitmentJobs::where('category_id', $job->category_id)->where('id', '!=', $job->id)->inRandomOrder()->take(2)->get();
        $categories = RecruitmentCategories::withCount('jobs')
            ->having('jobs_count', '>', 0)
            ->get();
        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();
        return view('webcontent::website.rrhh.jobEnrollment',compact('job','categories','tags','skills','relatedJobs'));
    }

    public function jobEnrollmentStore(Request $request)
    {
        try {
            // Validaciones
            //dd($request->all());
            $request->validate([
                'name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'telephone' => 'required|numeric',
                'country' => 'required|string|max:255',
                'skills' => 'required|array|min:1',
                'file_single_ids' => 'required|numeric',
            ],[
                'name.required' => 'El nombre es obligatorio.',
                'last_name.required' => 'El apellido es obligatorio.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico debe ser válido.',
                'telephone.required' => 'El teléfono es obligatorio.',
                'telephone.numeric' => 'El teléfono debe ser un número.',
                'country.required' => 'El país es obligatorio.',
                'skills.required' => 'Debes seleccionar al menos una habilidad.',
                'file_single.required' => 'Debes cargar un archivo.',
                // 'file_single.mimes' => 'El archivo debe ser un PDF, DOC o DOCX.',
                // 'file_single.max' => 'El archivo no debe superar los 5MB.',
            ]);
            RecruitmentCandidates::getConnectionResolver()->transaction(function () use ($request) {

                $candidate = new RecruitmentCandidates();
                $candidate->name = $request['name'];
                $candidate->last_name = $request['last_name'];
                $candidate->email = $request['email'];
                $candidate->phone = $request['telephone'];
                $candidate->gender = $request['gender'];
                $candidate->linkedin = $request['linkedin'];
                $candidate->save();

                // Guardar el primer estudio
                if (!empty($request['title_1'])) {
                    $candidateEducation1 = new RecruitmentCandidateEducation();
                    $candidateEducation1->candidate_id = $candidate->id;
                    $candidateEducation1->title = $request['title_1'];
                    $candidateEducation1->education_level = $request['education_level_1'];
                    $candidateEducation1->education_state = $request['education_state_1'];
                    $candidateEducation1->save();
                }

                // Guardar el segundo estudio
                if (!empty($request['title_2'])) {
                    $candidateEducation2 = new RecruitmentCandidateEducation();
                    $candidateEducation2->candidate_id = $candidate->id;
                    $candidateEducation2->title = $request['title_2'];
                    $candidateEducation2->education_level = $request['education_level_2'];
                    $candidateEducation2->education_state = $request['education_state_2'];
                    $candidateEducation2->save();
                }

                // Guardar el tercer estudio
                if (!empty($request['title_3'])) {
                    $candidateEducation3 = new RecruitmentCandidateEducation();
                    $candidateEducation3->candidate_id = $candidate->id;
                    $candidateEducation3->title = $request['title_3'];
                    $candidateEducation3->education_level = $request['education_level_3'];
                    $candidateEducation3->education_state = $request['education_state_3'];
                    $candidateEducation3->save();
                }

                // Guardar el primer lenguaje asociado
                if (!empty($request['language_1'])) {
                    $candidateLanguage1 = new RecruitmentCandidateLanguage();
                    $candidateLanguage1->candidate_id = $candidate->id;
                    $candidateLanguage1->language = $request['language_1'];
                    $candidateLanguage1->language_level = $request['language_level_1'];
                    $candidateLanguage1->save();
                }

                // Guardar el segundo lenguaje asociado (si existe)
                if (!empty($request['language_2'])) {
                    $candidateLanguage2 = new RecruitmentCandidateLanguage();
                    $candidateLanguage2->candidate_id = $candidate->id;
                    $candidateLanguage2->language = $request['language_2'];
                    $candidateLanguage2->language_level = $request['language_level_2'];
                    $candidateLanguage2->save();
                }

                // Guardar el tercer lenguaje asociado (si existe)
                if (!empty($request['language_3'])) {
                    $candidateLanguage3 = new RecruitmentCandidateLanguage();
                    $candidateLanguage3->candidate_id = $candidate->id;
                    $candidateLanguage3->language = $request['language_3'];
                    $candidateLanguage3->language_level = $request['language_level_3'];
                    $candidateLanguage3->save();
                }

                // Actualizamos los skills
                if ($request->has('skills')) {
                    $candidate->skills()->sync($request->skills);
                }

                if ($request->has('job_id')) {
                    // Guardar la relación en la tabla pivot
                    RecruitmentJobCandidates::insert([
                        'job_id' => $request->input('job_id'),
                        'candidate_id' => $candidate->id,
                        'candidate_status_id' => RecruitmentCandidates::STATUS_PENDING,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                // Carga de Imagenes y Archivos y CKEditor
                $this->storeFiles($request, $candidate, $this->ckeditorFields, $this->filepondFields);

                //de mi relacion con media , guardar la ruta de mi file en cv - file_single
                $lastMedia = $candidate->getMedia('file')->last();
                $candidate->cv = $lastMedia ? $lastMedia->url : null;
                $candidate->save();
            });

            sweetalert()->addSuccess('Registro creado correctamente.');
            return redirect()->route('public.jobs');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Mostrar mensaje de error con SweetAlert
            sweetalert()->addError('Es necesario completar los campos requeridos.');
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    public function jobSearch(Request $request)
    {

        $title = 'Resultados de la Búsqueda';
        $query = RecruitmentJobs::query();

        if ($request->filled('search_title')) {
            $searchTerm = '%' . $request->input('search_title') . '%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                      ->orWhere('description', 'like', $searchTerm);
            });
        }

        if ($request->filled('search_work_mode')) {
            $query->where('work_mode', $request->input('search_work_mode'));
        }

        if ($request->filled('search_type')) {
            $query->where('work_type', $request->input('search_type'));
        }

        if ($request->filled('search_category')) {
            $query->where('category_id', $request->input('search_category'));
        }

        if ($request->filled('search_country')) {
            $query->where('country', $request->input('search_country'));
        }

        $query->where('status_id', RecruitmentJobs::STATUS_ACTIVE);
        $jobs = $query->paginate(10);

        $categories = RecruitmentCategories::withCount('jobs')
            ->having('jobs_count', '>', 0)
            ->get();

        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();

        return view('webcontent::website.rrhh.jobs',compact('jobs','title','categories','tags'));
    }

    public function uploadCV(Request $request)
    {
        $categories = RecruitmentCategories::withCount('jobs')
            ->having('jobs_count', '>', 0)
            ->get();
        $tags = RecruitmentTags::whereHas('jobs')
            ->inRandomOrder()
            ->take(10)
            ->get();
        $skills = RecruitmentSkills::all();
        return view('webcontent::website.rrhh.uploadCV',compact('categories','tags','skills'));
    }

    public function contact()
    {
        return view('webcontent::website.rrhh.contact');
    }

    public function contactSubmit(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'message.required' => 'El mensaje es obligatorio.',
        ]);

        $data = [
            'name'    => $request->name,
            //'phone'   => $request->area_code . $request->phone,
            //'subject' => $request->subject,
            'email'   => $request->email,
            'content' => $request->message,
            //'section' => $request->section,

        ];
        $toEmail = config('global.email_notifiable');


        $jsonFormatted = json_encode($data, JSON_PRETTY_PRINT);

        $logTitle = "Envio de formulario de contacto";
        if (isset($data['name'])) {
            $logTitle .= " - {$data['name']}:";
        }

        $isRecaptchaValid = $this->verifyRecaptcha($request);
        $recaptchaScore = $isRecaptchaValid['score'];
        $data['recaptcha_score'] = $recaptchaScore;
        if ($isRecaptchaValid['is_spam']) {
            Log::channel('contact-form')->info($logTitle . PHP_EOL . $jsonFormatted . PHP_EOL . 'Score: ' . $isRecaptchaValid['score']);
            if($recaptchaScore > 0.5){
                Notification::route('mail', $toEmail)->notify(new ContactNotification($data, $toEmail));
                sweetalert()->addSuccess('Tu mensaje ha sido enviado. Muy pronto nos pondremos en contacto contigo.');
                return redirect()->back();
            }else{
                sweetalert()->addError('Error', 'Ha ocurrido un error, por favor intenta de nuevo.');
                return redirect()->back();
            }
        } else {
            Notification::route('mail', $toEmail)->notify(new ContactNotification($data, $toEmail));
            sweetalert()->addSuccess('Tu mensaje ha sido enviado. Muy pronto nos pondremos en contacto contigo.');
            Log::channel('contact-form')->info($logTitle . PHP_EOL . $jsonFormatted . PHP_EOL . 'Score: ' . $isRecaptchaValid['score']);
            return redirect()->back();
        }


    }

    public function company()
    {
        return view('webcontent::website.rrhh.company');
    }

    public function contactCompanySubmit(Request $request) {

        $data = [
            'nameCompany' => $request->name_company,
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'linkedin' => $request->linkedin,
            'content' => $request->message,
        ];

        $toEmail = config('global.email_notifiable');

        $jsonFormatted = json_encode($data, JSON_PRETTY_PRINT);

        $logTitle = "Envio de formulario de contacto EMPRESA";
        if (isset($data['name'])) {
            $logTitle .= " - {$data['name']}:";
        }

        $isRecaptchaValid = $this->verifyRecaptcha($request);
        $recaptchaScore = $isRecaptchaValid['score'];
        $data['recaptcha_score'] = $recaptchaScore;
        if ($isRecaptchaValid['is_spam']) {
            Log::channel('contact-form')->info($logTitle . PHP_EOL . $jsonFormatted . PHP_EOL . 'Score: ' . $isRecaptchaValid['score']);
            if($recaptchaScore > 0.5){
                Notification::route('mail', $toEmail)->notify(new ContactCompanyNotification($data));
                sweetalert()->addSuccess('Tu mensaje ha sido enviado. Muy pronto nos pondremos en contacto contigo.');
                return redirect()->back();
            }else{
                sweetalert()->addError('Error', 'Ha ocurrido un error, por favor intenta de nuevo.');
                return redirect()->back();
            }
        } else {
            Notification::route('mail', $toEmail)->notify(new ContactCompanyNotification($data));
            sweetalert()->addSuccess('Tu mensaje ha sido enviado. Muy pronto nos pondremos en contacto contigo.');
            Log::channel('contact-form')->info($logTitle . PHP_EOL . $jsonFormatted . PHP_EOL . 'Score: ' . $isRecaptchaValid['score']);
            return redirect()->back();
        }

    }

}
