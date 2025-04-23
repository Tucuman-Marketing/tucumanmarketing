<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOffers;
use Illuminate\Http\Request;
use Exception;

class ProductOffersController extends Controller
{

    /**
     * Display a listing of the product offers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productOffersObjects = ProductOffers::with('product')->paginate(25);

        return view('product_offers.index', compact('productOffersObjects'));
    }

    /**
     * Show the form for creating a new product offers.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Products = Product::pluck('id','id')->all();

        return view('product_offers.create', compact('Products'));
    }

    /**
     * Store a new product offers in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductOffers::create($data);

            return redirect()->route('product_offers.product_offers.index')
                ->with('success_message', 'Product Offers was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product offers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productOffers = ProductOffers::with('product')->findOrFail($id);

        return view('product_offers.show', compact('productOffers'));
    }

    /**
     * Show the form for editing the specified product offers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productOffers = ProductOffers::findOrFail($id);
        $Products = Product::pluck('id','id')->all();

        return view('product_offers.edit', compact('productOffers','Products'));
    }

    /**
     * Update the specified product offers in the storage.
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

            $productOffers = ProductOffers::findOrFail($id);
            $productOffers->update($data);

            return redirect()->route('product_offers.product_offers.index')
                ->with('success_message', 'Product Offers was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product offers from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productOffers = ProductOffers::findOrFail($id);
            $productOffers->delete();

            return redirect()->route('product_offers.product_offers.index')
                ->with('success_message', 'Product Offers was successfully deleted.');
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
                'discount' => 'nullable|numeric|min:-9|max:9',
            'end_date' => 'nullable|date_format:j/n/Y',
            'is_predefined' => 'nullable|array|string|min:0',
            'product_id' => 'nullable',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'start_date' => 'nullable|date_format:j/n/Y',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
