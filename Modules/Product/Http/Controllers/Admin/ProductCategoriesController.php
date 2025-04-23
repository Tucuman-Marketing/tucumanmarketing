<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Exception;

class ProductCategoriesController extends Controller
{

    /**
     * Display a listing of the product categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productCategoriesObjects = ProductCategories::paginate(25);

        return view('product_categories.index', compact('productCategoriesObjects'));
    }

    /**
     * Show the form for creating a new product categories.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_categories.create');
    }

    /**
     * Store a new product categories in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductCategories::create($data);

            return redirect()->route('product_categories.product_categories.index')
                ->with('success_message', 'Product Categories was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product categories.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productCategories = ProductCategories::findOrFail($id);

        return view('product_categories.show', compact('productCategories'));
    }

    /**
     * Show the form for editing the specified product categories.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productCategories = ProductCategories::findOrFail($id);


        return view('product_categories.edit', compact('productCategories'));
    }

    /**
     * Update the specified product categories in the storage.
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

            $productCategories = ProductCategories::findOrFail($id);
            $productCategories->update($data);

            return redirect()->route('product_categories.product_categories.index')
                ->with('success_message', 'Product Categories was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product categories from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productCategories = ProductCategories::findOrFail($id);
            $productCategories->delete();

            return redirect()->route('product_categories.product_categories.index')
                ->with('success_message', 'Product Categories was successfully deleted.');
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
                'banner' => 'nullable|string|min:0|max:255',
            'banner_filename' => 'nullable|string|min:0|max:255',
            'icon' => 'nullable|string|min:0|max:255',
            'icon_filename' => 'nullable|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'name' => 'nullable|string|min:0|max:255',
            'slug' => 'nullable|string|min:0|max:255',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
