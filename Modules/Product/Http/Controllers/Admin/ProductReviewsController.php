<?php

namespace Modules\Product\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReviews;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class ProductReviewsController extends Controller
{

    /**
     * Display a listing of the product reviews.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productReviewsObjects = ProductReviews::with('product','user')->paginate(25);

        return view('product_reviews.index', compact('productReviewsObjects'));
    }

    /**
     * Show the form for creating a new product reviews.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Products = Product::pluck('id','id')->all();
$users = User::pluck('name','id')->all();

        return view('product_reviews.create', compact('Products','users'));
    }

    /**
     * Store a new product reviews in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ProductReviews::create($data);

            return redirect()->route('product_reviews.product_reviews.index')
                ->with('success_message', 'Product Reviews was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified product reviews.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $productReviews = ProductReviews::with('product','user')->findOrFail($id);

        return view('product_reviews.show', compact('productReviews'));
    }

    /**
     * Show the form for editing the specified product reviews.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $productReviews = ProductReviews::findOrFail($id);
        $Products = Product::pluck('id','id')->all();
$users = User::pluck('name','id')->all();

        return view('product_reviews.edit', compact('productReviews','Products','users'));
    }

    /**
     * Update the specified product reviews in the storage.
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

            $productReviews = ProductReviews::findOrFail($id);
            $productReviews->update($data);

            return redirect()->route('product_reviews.product_reviews.index')
                ->with('success_message', 'Product Reviews was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified product reviews from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productReviews = ProductReviews::findOrFail($id);
            $productReviews->delete();

            return redirect()->route('product_reviews.product_reviews.index')
                ->with('success_message', 'Product Reviews was successfully deleted.');
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
                'approved' => 'nullable|string|min:0|max:255',
            'comment' => 'nullable|string|min:0|max:255',
            'product_id' => 'nullable',
            'rating' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'spam' => 'nullable|string|min:0|max:255',
            'user_id' => 'nullable',
            'uuid' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
