<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use Modules\Blog\Http\Requests\MassDestroyBlogStatusRequest;
use Modules\Blog\Http\Requests\StoreBlogStatusRequest;
use Modules\Blog\Http\Requests\UpdateBlogStatusRequest;
use Modules\Blog\Entities\BlogStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Modules\Blog\Http\Services\Admin\BlogStatusSearchService;
use App\Http\Controllers\AdminBaseController;

class BlogStatusController extends AdminBaseController
{

    public function index()
    {
        return view('blog::admin.statuses.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new BlogStatusSearchService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = BlogStatus::where('uuid', $uuid)->first();
        return view('blog::admin.statuses.forms.show', ['data' => $item]);
    }

    public function store(StoreBlogStatusRequest $request)
    {
        $item = new BlogStatus;
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.blogs.status.index');
    }

    public function edit($uuid)
    {
        $item = BlogStatus::where('uuid', $uuid)->first();
        return view('blog::admin.statuses.forms.edit', ['data' => $item ]);
    }

    public function update(UpdateBlogStatusRequest $request)
    {

        $item = BlogStatus::where('uuid', $request['uuid'])->first();
        $item->name = $request['name'];
        $item->color = $request['color'];
        $item->sort_order = $request['sort_order'];
        $item->icon = $request['icon'];
        $item->update();

        sweetalert()->addSuccess('Registro actualizado.');
        return redirect()->route('admin.blogs.status.index');
    }

    public function destroy(Request $request)
    {
        $item = BlogStatus::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.blogs.status.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = BlogStatus::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.blogs.status.index');
    }
}
