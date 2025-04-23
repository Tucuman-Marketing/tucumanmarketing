<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductUnitsOfMeasure;
use Illuminate\Http\Request;
use Exception;

class ProductUnitsOfMeasuresController extends Controller
{

    /**
     * Display a listing of the product units of measures.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productUnitsOfMeasures = ProductUnitsOfMeasure::paginate(25);

        return view('product_units_of_measures.index', compact('productUnitsOfMeasures'));
    }

    /**
     * Show the form for creating a new product units of measure.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('product_units_of_measures.create');
    }

    /**
     * Store a new product units of measure in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductUnitsOfMeasure::create($data);

            return redirect()->route('product_units_of_measures.product_units_of_measure.index')
                ->with('success_message', 'Product Units Of Measure was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product units of measure.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productUnitsOfMeasure = ProductUnitsOfMeasure::findOrFail($id);

        return view('product_units_of_measures.show', compact('productUnitsOfMeasure'));
    }

    /**
     * Show the form for editing the specified product units of measure.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productUnitsOfMeasure = ProductUnitsOfMeasure::findOrFail($id);


        return view('product_units_of_measures.edit', compact('productUnitsOfMeasure'));
    }

    /**
     * Update the specified product units of measure in the storage.
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

            $productUnitsOfMeasure = ProductUnitsOfMeasure::findOrFail($id);
            $productUnitsOfMeasure->update($data);

            return redirect()->route('product_units_of_measures.product_units_of_measure.index')
                ->with('success_message', 'Product Units Of Measure was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product units of measure from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productUnitsOfMeasure = ProductUnitsOfMeasure::findOrFail($id);
            $productUnitsOfMeasure->delete();

            return redirect()->route('product_units_of_measures.product_units_of_measure.index')
                ->with('success_message', 'Product Units Of Measure was successfully deleted.');
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
                'abbreviation' => 'nullable|string|min:0|max:255',
            'is_predefined' => 'nullable|array|string|min:0',
            'name' => 'nullable|string|min:0|max:255',
            'sort_order' => 'nullable|numeric|min:-2147483648|max:2147483647',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
