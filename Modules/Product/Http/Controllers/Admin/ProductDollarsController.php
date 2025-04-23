<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDollars;
use Illuminate\Http\Request;
use Exception;

class ProductDollarsController extends Controller
{

    /**
     * Display a listing of the product dollars.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productDollarsObjects = ProductDollars::paginate(25);

        return view('product_dollars.index', compact('productDollarsObjects'));
    }

    /**
     * Show the form for creating a new product dollars.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_dollars.create');
    }

    /**
     * Store a new product dollars in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductDollars::create($data);

            return redirect()->route('product_dollars.product_dollars.index')
                ->with('success_message', 'Product Dollars was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product dollars.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productDollars = ProductDollars::findOrFail($id);

        return view('product_dollars.show', compact('productDollars'));
    }

    /**
     * Show the form for editing the specified product dollars.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productDollars = ProductDollars::findOrFail($id);


        return view('product_dollars.edit', compact('productDollars'));
    }

    /**
     * Update the specified product dollars in the storage.
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

            $productDollars = ProductDollars::findOrFail($id);
            $productDollars->update($data);

            return redirect()->route('product_dollars.product_dollars.index')
                ->with('success_message', 'Product Dollars was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product dollars from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productDollars = ProductDollars::findOrFail($id);
            $productDollars->delete();

            return redirect()->route('product_dollars.product_dollars.index')
                ->with('success_message', 'Product Dollars was successfully deleted.');
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
                'bank' => 'nullable|string|min:0|max:255',
            'dollar' => 'nullable|numeric|min:-9|max:9',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
