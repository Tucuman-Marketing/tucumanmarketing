<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductTags;
use Illuminate\Http\Request;
use Exception;

class ProductTagsController extends Controller
{

    /**
     * Display a listing of the product tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productTagsObjects = ProductTags::paginate(25);

        return view('product_tags.index', compact('productTagsObjects'));
    }

    /**
     * Show the form for creating a new product tags.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_tags.create');
    }

    /**
     * Store a new product tags in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductTags::create($data);

            return redirect()->route('product_tags.product_tags.index')
                ->with('success_message', 'Product Tags was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product tags.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productTags = ProductTags::findOrFail($id);

        return view('product_tags.show', compact('productTags'));
    }

    /**
     * Show the form for editing the specified product tags.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productTags = ProductTags::findOrFail($id);


        return view('product_tags.edit', compact('productTags'));
    }

    /**
     * Update the specified product tags in the storage.
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

            $productTags = ProductTags::findOrFail($id);
            $productTags->update($data);

            return redirect()->route('product_tags.product_tags.index')
                ->with('success_message', 'Product Tags was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product tags from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productTags = ProductTags::findOrFail($id);
            $productTags->delete();

            return redirect()->route('product_tags.product_tags.index')
                ->with('success_message', 'Product Tags was successfully deleted.');
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
