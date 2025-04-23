<?php

namespace Modules\ServiceModule\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ServiceModule\Entities\Service;

use DataTables;
Use Alert;

//controller
use App\Http\Controllers\AdminBaseController;
class ServicesController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('servicemodule::admin.services.index');
    }

    public function indexDatatable()
    {
       $list = Service::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('servicemodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request['name'];
        $service->description = $request['description'];
        $service->price = $request['price'];
        $service->status = $request['status']  ?? 0;

        $service->save();

        Alert::success('Mensaje existoso', 'Servicio Creado');
        return redirect()->route('admin.services.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($uuid)
    {
        $service = Service::where('uuid', $uuid)->first();
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($uuid)
    {
        $service = Service::where('uuid', $uuid)->first();
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $service = Service::where('uuid', $request['uuid'])->first();
        $service->name = $request['name'];
        $service->description = $request['description'];
        $service->price = $request['price'];
        $service->status = $request['status'];

        $service->update();

        Alert::success('Mensaje existoso', 'Servicio Actualizado');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $service = Service::where('uuid', '=', $request['uuid_delete'])->first();
        $service->delete();

        Alert::success('Mensaje existoso', 'Servicio Eliminado');
        return redirect()->route('admin.services.index');
    }
}
