<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductProductTags;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Exception;

class ProductProductTagsController extends Controller
{

    /**
     * Display a listing of the product product tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productProductTagsObjects = ProductProductTags::with('product','producttag')->paginate(25);

        return view('product_product_tags.index', compact('productProductTagsObjects'));
    }

    /**
     * Show the form for creating a new product product tags.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Products = Product::pluck('id','id')->all();
$ProductTags = ProductTag::pluck('id','id')->all();

        return view('product_product_tags.create', compact('Products','ProductTags'));
    }

    /**
     * Store a new product product tags in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductProductTags::create($data);

            return redirect()->route('product_product_tags.product_product_tags.index')
                ->with('success_message', 'Product Product Tags was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product product tags.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productProductTags = ProductProductTags::with('product','producttag')->findOrFail($id);

        return view('product_product_tags.show', compact('productProductTags'));
    }

    /**
     * Show the form for editing the specified product product tags.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productProductTags = ProductProductTags::findOrFail($id);
        $Products = Product::pluck('id','id')->all();
$ProductTags = ProductTag::pluck('id','id')->all();

        return view('product_product_tags.edit', compact('productProductTags','Products','ProductTags'));
    }

    /**
     * Update the specified product product tags in the storage.
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

            $productProductTags = ProductProductTags::findOrFail($id);
            $productProductTags->update($data);

            return redirect()->route('product_product_tags.product_product_tags.index')
                ->with('success_message', 'Product Product Tags was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product product tags from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productProductTags = ProductProductTags::findOrFail($id);
            $productProductTags->delete();

            return redirect()->route('product_product_tags.product_product_tags.index')
                ->with('success_message', 'Product Product Tags was successfully deleted.');
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
                'product_id' => 'nullable',
            'product_tag_id' => 'nullable',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
