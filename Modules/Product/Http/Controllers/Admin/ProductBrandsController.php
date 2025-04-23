<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductBrands;
use Illuminate\Http\Request;
use Exception;

class ProductBrandsController extends Controller
{

    /**
     * Display a listing of the product brands.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productBrandsObjects = ProductBrands::paginate(25);

        return view('product_brands.index', compact('productBrandsObjects'));
    }

    /**
     * Show the form for creating a new product brands.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_brands.create');
    }

    /**
     * Store a new product brands in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductBrands::create($data);

            return redirect()->route('product_brands.product_brands.index')
                ->with('success_message', 'Product Brands was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product brands.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productBrands = ProductBrands::findOrFail($id);

        return view('product_brands.show', compact('productBrands'));
    }

    /**
     * Show the form for editing the specified product brands.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productBrands = ProductBrands::findOrFail($id);


        return view('product_brands.edit', compact('productBrands'));
    }

    /**
     * Update the specified product brands in the storage.
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

            $productBrands = ProductBrands::findOrFail($id);
            $productBrands->update($data);

            return redirect()->route('product_brands.product_brands.index')
                ->with('success_message', 'Product Brands was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product brands from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productBrands = ProductBrands::findOrFail($id);
            $productBrands->delete();

            return redirect()->route('product_brands.product_brands.index')
                ->with('success_message', 'Product Brands was successfully deleted.');
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
            'filename' => 'nullable|string|min:0|max:255',
            'image' => 'nullable|numeric|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
