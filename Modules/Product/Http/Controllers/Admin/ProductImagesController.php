<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Exception;

class ProductImagesController extends Controller
{

    /**
     * Display a listing of the product images.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productImagesObjects = ProductImages::with('product')->paginate(25);

        return view('product_images.index', compact('productImagesObjects'));
    }

    /**
     * Show the form for creating a new product images.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Products = Product::pluck('id','id')->all();

        return view('product_images.create', compact('Products'));
    }

    /**
     * Store a new product images in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductImages::create($data);

            return redirect()->route('product_images.product_images.index')
                ->with('success_message', 'Product Images was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product images.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productImages = ProductImages::with('product')->findOrFail($id);

        return view('product_images.show', compact('productImages'));
    }

    /**
     * Show the form for editing the specified product images.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productImages = ProductImages::findOrFail($id);
        $Products = Product::pluck('id','id')->all();

        return view('product_images.edit', compact('productImages','Products'));
    }

    /**
     * Update the specified product images in the storage.
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

            $productImages = ProductImages::findOrFail($id);
            $productImages->update($data);

            return redirect()->route('product_images.product_images.index')
                ->with('success_message', 'Product Images was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product images from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productImages = ProductImages::findOrFail($id);
            $productImages->delete();

            return redirect()->route('product_images.product_images.index')
                ->with('success_message', 'Product Images was successfully deleted.');
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
            'path' => 'nullable|string|min:0|max:255',
            'product_id' => 'nullable',
            'size' => 'nullable|string|min:0|max:255',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
