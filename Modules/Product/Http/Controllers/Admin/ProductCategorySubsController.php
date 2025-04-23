<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductCategorySubs;
use Illuminate\Http\Request;
use Exception;

class ProductCategorySubsController extends Controller
{

    /**
     * Display a listing of the product category subs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productCategorySubsObjects = ProductCategorySubs::with('productcategory')->paginate(25);

        return view('product_category_subs.index', compact('productCategorySubsObjects'));
    }

    /**
     * Show the form for creating a new product category subs.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ProductCategories = ProductCategory::pluck('name','id')->all();

        return view('product_category_subs.create', compact('ProductCategories'));
    }

    /**
     * Store a new product category subs in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductCategorySubs::create($data);

            return redirect()->route('product_category_subs.product_category_subs.index')
                ->with('success_message', 'Product Category Subs was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product category subs.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productCategorySubs = ProductCategorySubs::with('productcategory')->findOrFail($id);

        return view('product_category_subs.show', compact('productCategorySubs'));
    }

    /**
     * Show the form for editing the specified product category subs.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productCategorySubs = ProductCategorySubs::findOrFail($id);
        $ProductCategories = ProductCategory::pluck('name','id')->all();

        return view('product_category_subs.edit', compact('productCategorySubs','ProductCategories'));
    }

    /**
     * Update the specified product category subs in the storage.
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

            $productCategorySubs = ProductCategorySubs::findOrFail($id);
            $productCategorySubs->update($data);

            return redirect()->route('product_category_subs.product_category_subs.index')
                ->with('success_message', 'Product Category Subs was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product category subs from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productCategorySubs = ProductCategorySubs::findOrFail($id);
            $productCategorySubs->delete();

            return redirect()->route('product_category_subs.product_category_subs.index')
                ->with('success_message', 'Product Category Subs was successfully deleted.');
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
                'icon' => 'nullable|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'name' => 'nullable|string|min:0|max:255',
            'product_category_id' => 'nullable',
            'slug' => 'nullable|string|min:0|max:255',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
