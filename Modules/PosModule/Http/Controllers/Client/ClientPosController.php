<?php

namespace Modules\PosModule\Http\Controllers\Client;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vehicles\Entities\UserDataVehicles;
use Modules\PosModule\Entities\Washeds;
use Modules\PosModule\Http\Services\Client\Pos\PosSearchService;
use Illuminate\Support\Carbon;
use DataTables;
Use Alert;

//Model User
use App\Models\User;
use Modules\SubscriptionsModule\Entities\Subscription;

//controller
use App\Http\Controllers\AdminBaseController;

class ClientPosController extends AdminBaseController
{

    protected $posSearchService;

    public function __construct(PosSearchService $posSearchService)
    {
        parent::__construct();
        $this->posSearchService = $posSearchService;
    }

    public function index()
    {
        $vehicles = UserDataVehicles::with('user','subscription')->get();
        return view('posmodule::client.pos.index', ['vehicles' => $vehicles]);
    }

    public function indexDatatable(Request $request)
    {
        $searchParameters = [];
        $query = $this->posSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->posSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function searchDatatable(Request $request)
    {
        $searchParameters = $request->all();
        $query = $this->posSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->posSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function show($uuid)
    {
        $washed = Washeds::with('user','userVehicle','plan','subscription')->where('uuid', $uuid)->first();
        return view('posmodule::client.pos.forms.show', ['data' => $washed]);
    }

}
