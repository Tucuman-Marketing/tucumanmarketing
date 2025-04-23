<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCombo;
use App\Models\ProductComboProducts;
use Illuminate\Http\Request;
use Exception;

class ProductComboProductsController extends Controller
{

    /**
     * Display a listing of the product combo products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productComboProductsObjects = ProductComboProducts::with('productcombo','product')->paginate(25);

        return view('product_combo_products.index', compact('productComboProductsObjects'));
    }

    /**
     * Show the form for creating a new product combo products.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $productCombos = ProductCombo::pluck('id','id')->all();
$Products = Product::pluck('id','id')->all();

        return view('product_combo_products.create', compact('productCombos','Products'));
    }

    /**
     * Store a new product combo products in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductComboProducts::create($data);

            return redirect()->route('product_combo_products.product_combo_products.index')
                ->with('success_message', 'Product Combo Products was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product combo products.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productComboProducts = ProductComboProducts::with('productcombo','product')->findOrFail($id);

        return view('product_combo_products.show', compact('productComboProducts'));
    }

    /**
     * Show the form for editing the specified product combo products.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productComboProducts = ProductComboProducts::findOrFail($id);
        $productCombos = ProductCombo::pluck('id','id')->all();
$Products = Product::pluck('id','id')->all();

        return view('product_combo_products.edit', compact('productComboProducts','productCombos','Products'));
    }

    /**
     * Update the specified product combo products in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $productComboProducts = ProductComboProducts::findOrFail($id);
            $productComboProducts->update($data);

            return redirect()->route('product_combo_products.product_combo_products.index')
                ->with('success_message', 'Product Combo Products was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product combo products from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productComboProducts = ProductComboProducts::findOrFail($id);
            $productComboProducts->delete();

            return redirect()->route('product_combo_products.product_combo_products.index')
                ->with('success_message', 'Product Combo Products was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'product_combo_id' => 'nullable',
            'product_id' => 'nullable',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
