<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

//TRAIT
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;

//REQUESTS
use Modules\Blog\Http\Requests\MassDestroyBlogRequest;
use Modules\Blog\Http\Requests\StoreBlogPostRequest;
use Modules\Blog\Http\Requests\UpdateBlogPostRequest;
//MODELS
use Modules\Blog\Entities\BlogPost;
use Modules\Blog\Entities\BlogCategory;
use Modules\Blog\Entities\BlogStatus;
use Modules\Blog\Entities\BlogTag;
use App\Models\MediaTemp;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//SERVICES
use Modules\Blog\Http\Services\Admin\BlogsSearchService;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;


class BlogPostController extends AdminBaseController
{
    use FileUploadingTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }

    public function index()
    {
        $statuses = BlogStatus::all();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('blog::admin.posts.index', compact('statuses', 'categories', 'tags'));
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new BlogsSearchService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $post = BlogPost::with('media')->where('uuid', $uuid)->first();
        $statuses = BlogStatus::all();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('blog::admin.posts.forms.show', ['data' => $post  , 'statuses' => $statuses, 'categories' => $categories, 'tags' => $tags]);
    }

    public function store(StoreBlogPostRequest $request)
    {
        $user_id = auth()->user()->id;

        $item = new BlogPost();
        $item->user_id = $user_id;
        $item->title = $request['title'];
        $item->status_id = $request['status'];
        $item->category_id = $request['category'];
        $item->published_at = $request['publish-date'] . ' ' . $request['publish-time'];
        $item->content = $request['content'];
        $item->save();

        // Actualizamos los tags
        $item->tags()->sync($request->tags);

        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $item, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.blogs.posts.index');
    }

    public function edit($uuid)
    {
        $post = BlogPost::with('media')->where('uuid', $uuid)->first();
        $statuses = BlogStatus::all();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('blog::admin.posts.forms.edit', ['data' => $post , 'statuses' => $statuses, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(UpdateBlogPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $item = BlogPost::where('uuid', $request['uuid'])->first();
        $item->user_id = $user_id;
        $item->title = $request['title'];
        $item->status_id = $request['status'];
        $item->category_id = $request['category'];
        $item->published_at = $request['publish-date'] . ' ' . $request['publish-time'];
        $item->content = $request['content'];
        $item->update();

        // Actualizamos los tags
        $item->tags()->sync($request->tags);

        // Carga de Imagenes y Archivos y CKEditor
        $this->updateFiles($request, $item, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Registro actualizado.');
        return redirect()->route('admin.blogs.posts.index');
    }

    public function destroy(Request $request)
    {
        $item = BlogPost::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.blogs.posts.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = BlogPost::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.blogs.posts.index');
    }
}
