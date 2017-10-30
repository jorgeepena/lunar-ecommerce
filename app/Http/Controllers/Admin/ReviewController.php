<?php

namespace Lunar\Http\Controllers\Admin;


use Session;
use Lunar\Store\Product;
use Lunar\Store\Review;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reviews = Review::where('approved', true)->get();

        $reviews_pending = Review::where('approved', false)->get();

        return view('back.products.reviews.index')->with('reviews', $reviews)->with('reviews_pending', $reviews_pending);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
                //Validar
        $this -> validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|min:10'
        ));

        $product = Product::find($product_id);
        $review = new Review();

        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->approved = false;
        $review->product()->associate($product);

        $review->save();

        Session::flash('success', 'Thanks for your review. Pending moderation.');

        return redirect()->route('product.detail', [$product->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
         $review = Review::find($id);

         $review->approved = true;
         $review->save();

         Session::flash('success', 'User Review Approved!');

         return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
