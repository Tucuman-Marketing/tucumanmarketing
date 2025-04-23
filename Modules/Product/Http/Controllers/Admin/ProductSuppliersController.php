<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSuppliers;
use App\Models\Tax;
use Illuminate\Http\Request;
use Exception;

class ProductSuppliersController extends Controller
{

    /**
     * Display a listing of the product suppliers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productSuppliersObjects = ProductSuppliers::with('tax')->paginate(25);

        return view('product_suppliers.index', compact('productSuppliersObjects'));
    }

    /**
     * Show the form for creating a new product suppliers.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $taxes = Tax::pluck('id','id')->all();

        return view('product_suppliers.create', compact('taxes'));
    }

    /**
     * Store a new product suppliers in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductSuppliers::create($data);

            return redirect()->route('product_suppliers.product_suppliers.index')
                ->with('success_message', 'Product Suppliers was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product suppliers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productSuppliers = ProductSuppliers::with('tax')->findOrFail($id);

        return view('product_suppliers.show', compact('productSuppliers'));
    }

    /**
     * Show the form for editing the specified product suppliers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productSuppliers = ProductSuppliers::findOrFail($id);
        $taxes = Tax::pluck('id','id')->all();

        return view('product_suppliers.edit', compact('productSuppliers','taxes'));
    }

    /**
     * Update the specified product suppliers in the storage.
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

            $productSuppliers = ProductSuppliers::findOrFail($id);
            $productSuppliers->update($data);

            return redirect()->route('product_suppliers.product_suppliers.index')
                ->with('success_message', 'Product Suppliers was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product suppliers from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productSuppliers = ProductSuppliers::findOrFail($id);
            $productSuppliers->delete();

            return redirect()->route('product_suppliers.product_suppliers.index')
                ->with('success_message', 'Product Suppliers was successfully deleted.');
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
                'address' => 'nullable|string|min:0|max:255',
            'business_name' => 'nullable|string|min:0|max:255',
            'contact' => 'nullable|string|min:0|max:255',
            'email' => 'nullable|string|min:0|max:255',
            'filename' => 'nullable|string|min:0|max:255',
            'image' => 'nullable|numeric|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'observation' => 'nullable|string|min:0|max:255',
            'phone' => 'nullable|string|min:0|max:255',
            'skype' => 'nullable|string|min:0|max:255',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'status' => 'nullable|string|min:0|max:255',
            'tax_id' => 'nullable',
            'uuid' => 'nullable|string|min:0|max:255',
            'visit_day' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
