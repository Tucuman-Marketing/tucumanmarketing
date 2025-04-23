<?php

namespace Modules\Product\Http\Controllers\Admin;

use Auth;
use Exception;
use DataTables;

//MODELS
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Productos\Entities\Product;
use Modules\Productos\Entities\ProductBrand;
use Modules\Productos\Entities\ProductCategory;
use Modules\Productos\Entities\ProductSupplier;
use Modules\Productos\Entities\ProductCategorySub;
use Modules\Productos\Entities\ProductUnitsOfMeasure;
use Modules\CashFlow\Entities\CashFlow;
use Modules\CashFlow\Entities\CashFlowDetail;

//CONTROLLERS
use App\Http\Controllers\AdminBaseController;

//LIBRARIES
Use Alert;

//SERVICE
use Modules\Productos\Http\Services\Admin\Product\ProductSearchService;

class ProductsController extends AdminBaseController
{
    protected $productSearchService;

    public function __construct(ProductSearchService $productSearchService)
    {
        parent::__construct();
        $this->productSearchService = $productSearchService;
    }


    public function index()
    {
         // manejo de permisos
         $user = auth()->user();
         if (!$user || !$user->hasPermission('product-view')) {
             flash('No tienes permiso para ver esta página')->error()->important();
             return redirect()->back();
         }

         //mandamos marcas , proveedores , categorias y subcategorias

            $brands = ProductBrand::all();
            $suppliers = ProductSupplier::all();
            $categories = ProductCategory::all();
            $subcategories = ProductCategorySub::all();
            $unitsOfMeasure = ProductUnitsOfMeasure::all();

        return view('productos::admin.product.index' , compact('brands' , 'suppliers' , 'categories' , 'subcategories','unitsOfMeasure'));
    }

    //indexDatatable
    public function indexDatatable(Request $request)
    {

          // Parámetros de búsqueda vacíos para la carga inicial
          $searchParameters = [];
          $dataTable = $this->productSearchService->search($searchParameters);
          return $dataTable->make(true);

    }

    //store
    public function store(Request $request)
    {

        $data = $request->all();

        //a $data['cost_price_pesos_ex_tax'] sacarle el $ y convertirlo a float
        if(isset($data['cost_price_pesos_ex_tax'])){
            $amount = str_replace('$', '', $data['cost_price_pesos_ex_tax']);
            $amount = str_replace(',', '', $amount);
            $cost_price_pesos_ex_tax = (float) $amount;
        }


        $product = new Product();
        //$product->code = $data['code'];
        $product->description = isset($data['description']) ? $data['description'] : null;
        //$product->cost_price_pesos_ex_tax = $cost_price_pesos_ex_tax;
        $product->profitability = isset($data['profitability']) ? $data['profitability'] : null;

        //stock
        $product->base_unit_stock =  isset($data['base_unit_stock']) ? $data['base_unit_stock'] : null;
        $product->stock = isset($data['stock']) ? $data['stock'] : null;
        $product->unit_of_measure_id = isset($data['unit_of_measure_id']) ? ProductUnitsOfMeasure::where('id', $data['unit_of_measure_id'])->value('id') : null;
        $product->stock_per_base_unit = isset($data['stock_per_base_unit']) ? $data['stock_per_base_unit'] : null;
        //total_stock
        // $product->total_stock = $data['total_stock'];

        $product->brand_id = isset($data['brand_id']) ? ProductBrand::where('id', $data['brand_id'])->value('id') : null;
        $product->supplier_id = isset($data['supplier_id']) ? ProductSupplier::where('id', $data['supplier_id'])->value('id') : null;
        $product->category_id = isset($data['category_id']) ? ProductCategory::where('id', $data['category_id'])->value('id') : null;
        $product->sub_category_id = isset($data['subcategory_id']) ? ProductCategorySub::where('id', $data['subcategory_id'])->value('id') : null;


        $product->save();
        Alert::success('Mensaje existoso', 'Producto Creado');
        return redirect()->route('admin.product.index');
    }



    public function show(Request $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        return response()->json($product);

    }


    public function edit(Request $request, $uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        return response()->json($product);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $product = Product::where('uuid', $data['uuid'])->first();
        $product->update($data);
        Alert::success('Mensaje existoso', 'Producto Actualizado');
        return redirect()->route('admin.product.index');
    }

    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $product = Product::where('uuid', $uuid)->first();

        //validamos que no se usa en ninguna cashflow
        $cashflow = CashFlowDetail::where('product_id', $product->id)->first();
        if($cashflow){
            Alert::error('Mensaje existoso', 'No se puede eliminar el registro, tiene movimientos asociados');
            return redirect()->route('admin.product.index');
        }

        $product->delete();

        Alert::success('Mensaje existoso', 'Producto Eliminado');
        return redirect()->route('admin.product.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $products = Product::whereIn('uuid', $uuidsArray)->get();

        //validamos que no se usa en ninguna cashflow
        foreach ($products as $product) {
            $cashflow = CashFlowDetail::where('product_id', $product->id)->first();
            if($cashflow){
                Alert::error('Mensaje existoso', 'No se puede eliminar el registro, tiene movimientos asociados');
                return redirect()->route('admin.product.index');
            }

                $product->delete();
        }

        Alert::success('Mensaje existoso', 'Productos Eliminados');
        return redirect()->route('admin.product.index');

    }

}
