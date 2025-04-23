<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductCategorySub;
use App\Models\ProductCombos;
use Illuminate\Http\Request;
use Exception;

class ProductCombosController extends Controller
{

    /**
     * Display a listing of the product combos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productCombosObjects = ProductCombos::paginate(25);

        return view('product_combos.index', compact('productCombosObjects'));
    }

    /**
     * Show the form for creating a new product combos.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ProductCategories = ProductCategory::pluck('name','id')->all();
$ProductCategorySubs = ProductCategorySub::pluck('name','id')->all();

        return view('product_combos.create', compact('ProductCategories','ProductCategorySubs'));
    }

    /**
     * Store a new product combos in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductCombos::create($data);

            return redirect()->route('product_combos.product_combos.index')
                ->with('success_message', 'Product Combos was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product combos.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productCombos = ProductCombos::with('productcategory','productcategorysub')->findOrFail($id);

        return view('product_combos.show', compact('productCombos'));
    }

    /**
     * Show the form for editing the specified product combos.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productCombos = ProductCombos::findOrFail($id);
        $ProductCategories = ProductCategory::pluck('name','id')->all();
$ProductCategorySubs = ProductCategorySub::pluck('name','id')->all();

        return view('product_combos.edit', compact('productCombos','ProductCategories','ProductCategorySubs'));
    }

    /**
     * Update the specified product combos in the storage.
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

            $productCombos = ProductCombos::findOrFail($id);
            $productCombos->update($data);

            return redirect()->route('product_combos.product_combos.index')
                ->with('success_message', 'Product Combos was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product combos from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productCombos = ProductCombos::findOrFail($id);
            $productCombos->delete();

            return redirect()->route('product_combos.product_combos.index')
                ->with('success_message', 'Product Combos was successfully deleted.');
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
                'bonus1' => 'nullable|numeric|min:-9|max:9',
            'code' => 'nullable|string|min:0|max:255',
            'description' => 'nullable|string|min:0|max:255',
            'enabled' => 'nullable|string|min:0|max:255',
            'filename' => 'nullable|string|min:0|max:255',
            'hot' => 'nullable|string|min:0|max:255',
            'image1' => 'nullable|numeric|string|min:0|max:255',
            'long_description' => 'nullable',
            'offer' => 'nullable|string|min:0|max:255',
            'points' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'product_category_id' => 'nullable',
            'product_category_sub_id' => 'nullable',
            'rating_cache' => 'nullable|numeric|min:-9|max:9',
            'rating_count' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'short_description' => 'nullable',
            'slug' => 'nullable|string|min:0|max:255',
            'total' => 'nullable|numeric|min:-9|max:9',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
