<?php

namespace Lunar\Http\Controllers;

use Session;
use Auth;

use Lunar\Wishlist;
use Lunar\Store\Product;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();

        return view ('front.user-profile.wishlist.index')->with('wishlist', $wishlist);
    }

    public function add($slug)
    {

        $product = Product::getProductBySlug($slug);
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', "Product Added into your Wishlist Successfully!");
    }

    public function destroy($slug)
    {
        $product = Product::getProductBySlug($slug);

        Wishlist::where([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ])->delete();

        return redirect()->back()->with('success', 'Product Removed from your Wishlist Successfully!');
    }
}
