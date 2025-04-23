<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Modules\Blog\Http\Requests\MassDestroyBlogCategoryRequest;
use Modules\Blog\Http\Requests\StoreBlogCategoryRequest;
use Modules\Blog\Http\Requests\UpdateBlogCategoryRequest;

use Modules\Blog\Entities\BlogCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Modules\Blog\Http\Services\Admin\BlogCategorySearchService;

class BlogCategoryController extends Controller
{

    public function index()
    {
        return view('blog::admin.categories.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchService = new BlogCategorySearchService();
        $searchParameters = $request->all();
        $query = $searchService->buildQueryFromParameters($searchParameters);
        $dataTable = $searchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $item = BlogCategory::where('uuid', $uuid)->first();
        return view('blog::admin.categories.forms.show', ['data' => $item]);
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $item = new BlogCategory;
        $item->name = $request->name;
        $item->color = $request->color;
        $item->sort_order = $request->sort_order;
        $item->icon = $request->icon;
        $item->save();

        sweetalert()->addSuccess('Registro creado correctamente.');
        return redirect()->route('admin.blogs.category.index');
    }

    public function edit($uuid)
    {
        $item = BlogCategory::where('uuid', $uuid)->first();
        return view('blog::admin.categories.forms.edit', ['data' => $item ]);
    }

    public function update(UpdateBlogCategoryRequest $request)
    {

        $item = BlogCategory::where('uuid', $request['uuid'])->first();
        $item->name = $request['name'];
        $item->color = $request['color'];
        $item->sort_order = $request['sort_order'];
        $item->icon = $request['icon'];
        $item->update();

        sweetalert()->addSuccess('Registro Actualizado.');
        return redirect()->route('admin.blogs.category.index');
    }

    public function destroy(Request $request)
    {
        $item = BlogCategory::where('uuid', '=', $request['uuid_delete'])->first();
        $item->delete();
        sweetalert()->addSuccess('Registro Eliminado.');
        return redirect()->route('admin.blogs.category.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $items = BlogCategory::whereIn('uuid', $uuidsArray)->get();
        foreach ($items as $item) {
                $item->delete();
        }

        sweetalert()->addSuccess('Registros Eliminados.');
        return redirect()->route('admin.blogs.category.index');
    }
}
