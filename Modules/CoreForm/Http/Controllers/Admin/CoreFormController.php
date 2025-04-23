<?php

namespace Modules\CoreForm\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//MODELS
use Modules\CoreForm\Entities\CoreForm;
//SERVICES
use Modules\CoreForm\Http\Services\Admin\CoreForm\CoreFormService;
//TRAIT
use Modules\FileUploadModule\Http\Traits\FileUploadingTrait;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//LIBS
use Alert;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Flasher\Prime\FlasherInterface;

class CoreFormController extends AdminBaseController
{
    use FileUploadingTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initializeFileUploadingTrait(); // Inicializa las propiedades en el trait
    }

    public function index()
    {
        $coreForms = CoreForm::all();
        return view('coreform::admin.coreForm.index', compact('coreForms'));
    }


    public function indexDatatable(Request $request)
    {
        $searchService = new CoreFormService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query,$request);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $post = CoreForm::with('media')->where('uuid', $uuid)->first();
        return view('coreform::admin.coreform.forms.show', ['data' => $post ]);
    }

    public function store(Request $request)
    {

        $core = new CoreForm();
        $core->name = $request['name'];
        $core->create = $request['create'];
        $core->edit = $request['edit'];
        $core->css = $request['css'];
        $core->js = $request['js'];
        $core->save();

        // Carga de Imagenes y Archivos y CKEditor
        $this->storeFiles($request, $core, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Form creado correctamente.');
        return redirect()->route('admin.coreforms.index');
    }

    public function edit($uuid)
    {
        $coreform = CoreForm::with('media')->where('uuid', $uuid)->first();
        return view('coreform::admin.coreform.forms.edit', ['data' => $coreform ]);
    }

    public function update(Request $request)
    {

        $core = CoreForm::where('uuid', $request['uuid'])->first();
        $core->name = $request['name'];
        $core->create = $request['create'];
        $core->edit = $request['edit'];
        $core->css = $request['css'];
        $core->js = $request['js'];
        $core->save();

        // Carga de Imagenes y Archivos y CKEditor
        $this->updateFiles($request, $core, $this->ckeditorFields, $this->filepondFields);

        sweetalert()->addSuccess('Form Actualizado.');
        return redirect()->route('admin.coreforms.index');
    }

    public function destroy(Request $request)
    {
        $post = CoreForm::where('uuid', '=', $request['uuid_delete'])->first();
        $post->delete();
        sweetalert()->addSuccess('Blog Eliminado.');
        return redirect()->route('admin.coreform.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $posts = CoreForm::whereIn('uuid', $uuidsArray)->get();
        foreach ($posts as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.coreform.index');
    }

}
