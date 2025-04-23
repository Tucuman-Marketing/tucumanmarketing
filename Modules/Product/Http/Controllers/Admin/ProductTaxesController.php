<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductTaxes;
use Illuminate\Http\Request;
use Exception;

class ProductTaxesController extends Controller
{

    /**
     * Display a listing of the product taxes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productTaxesObjects = ProductTaxes::paginate(25);

        return view('product_taxes.index', compact('productTaxesObjects'));
    }

    /**
     * Show the form for creating a new product taxes.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_taxes.create');
    }

    /**
     * Store a new product taxes in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductTaxes::create($data);

            return redirect()->route('product_taxes.product_taxes.index')
                ->with('success_message', 'Product Taxes was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product taxes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productTaxes = ProductTaxes::findOrFail($id);

        return view('product_taxes.show', compact('productTaxes'));
    }

    /**
     * Show the form for editing the specified product taxes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productTaxes = ProductTaxes::findOrFail($id);


        return view('product_taxes.edit', compact('productTaxes'));
    }

    /**
     * Update the specified product taxes in the storage.
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

            $productTaxes = ProductTaxes::findOrFail($id);
            $productTaxes->update($data);

            return redirect()->route('product_taxes.product_taxes.index')
                ->with('success_message', 'Product Taxes was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product taxes from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productTaxes = ProductTaxes::findOrFail($id);
            $productTaxes->delete();

            return redirect()->route('product_taxes.product_taxes.index')
                ->with('success_message', 'Product Taxes was successfully deleted.');
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
                'description' => 'nullable|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'uuid' => 'nullable|string|min:0|max:255',
            'value' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
