<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Blog\Http\Requests\MassDestroyBlogTagRequest;
use Modules\Blog\Http\Requests\StoreBlogTagRequest;
use Modules\Blog\Http\Requests\UpdateBlogTagRequest;
use Modules\Blog\Entities\BlogTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Modules\Blog\Http\Services\Admin\BlogTagsService;

class BlogTagController extends Controller
{
    public function index()
    {
        return view('blog::admin.tags.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new BlogTagsService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = BlogTag::where('uuid', $uuid)->first();
        return view('blog::admin.tags.forms.show', ['data' => $item ]);
    }

    public function store(StoreBlogTagRequest $request)
    {

        $item = new BlogTag();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.blogs.tags.index');
    }

    public function edit($uuid)
    {
        $item = BlogTag::where('uuid', $uuid)->first();
        return view('blog::admin.tags.forms.edit', ['data' => $item ]);
    }

    public function update(UpdateBlogTagRequest $request)
    {

        $item = BlogTag::where('uuid', $request['uuid'])->first();
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.blogs.tags.index');
    }

    public function destroy(Request $request)
    {
        $item = BlogTag::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.blogs.tags.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = BlogTag::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.blogs.tags.index');
    }
}
