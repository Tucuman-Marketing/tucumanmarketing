<?php


namespace App\Http\Controllers\Admin\Employees;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowCategory;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use App\Models\Employee;
use DataTables;

class EmployeesController extends AdminBaseController
{


    public function index()
    {
        return view('admin.employee.index');
    }

    public function indexDatatable(Request $request)
    {
       $list = Employee::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $employee = Employee::create($data);
        Alert::success('Mensaje existoso', 'Empleado Creado');
        return redirect()->route('admin.employee.index');
    }


    public function show(Request $request,$uuid)
    {
        $employee = Employee::where('uuid', $uuid)->first();
        return response()->json($employee);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $employee = Employee::where('uuid', $uuid)->first();
        return response()->json($employee);
    }




    public function update(Request $request)
    {

        $data = $request->all();
        $employee = Employee::where('uuid', $data['uuid'])->first();

        $employee->update($data);
        Alert::success('Mensaje existoso', 'Empleado Actualizado');
        return redirect()->route('admin.employee.index');
    }


    public function destroy(Request $request)
    {

        $request = $request->all();
        $uuid = $request['uuid'];

        $employee = Employee::where('uuid', $uuid)->first();
        $employee->delete();

        Alert::success('Mensaje existoso', 'Empleado Eliminado');
        return redirect()->route('admin.employee.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $employees = Employee::whereIn('uuid', $uuidsArray)->get();
        foreach ($employees as $employee) {
                $employee->delete();
        }

        Alert::success('Mensaje existoso', 'Empleados Eliminados');
        return redirect()->route('admin.employee.index');

    }


}
