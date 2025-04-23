<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSettings;
use Illuminate\Http\Request;
use Exception;

class ProductSettingsController extends Controller
{

    /**
     * Display a listing of the product settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productSettingsObjects = ProductSettings::paginate(25);

        return view('product_settings.index', compact('productSettingsObjects'));
    }

    /**
     * Show the form for creating a new product settings.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_settings.create');
    }

    /**
     * Store a new product settings in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductSettings::create($data);

            return redirect()->route('product_settings.product_settings.index')
                ->with('success_message', 'Product Settings was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product settings.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productSettings = ProductSettings::findOrFail($id);

        return view('product_settings.show', compact('productSettings'));
    }

    /**
     * Show the form for editing the specified product settings.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productSettings = ProductSettings::findOrFail($id);


        return view('product_settings.edit', compact('productSettings'));
    }

    /**
     * Update the specified product settings in the storage.
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

            $productSettings = ProductSettings::findOrFail($id);
            $productSettings->update($data);

            return redirect()->route('product_settings.product_settings.index')
                ->with('success_message', 'Product Settings was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product settings from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productSettings = ProductSettings::findOrFail($id);
            $productSettings->delete();

            return redirect()->route('product_settings.product_settings.index')
                ->with('success_message', 'Product Settings was successfully deleted.');
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
                'currency' => 'nullable|string|min:0|max:255',
            'sales_percentage' => 'nullable|numeric|min:-9|max:9',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
