<?php

namespace Lunar\Http\Controllers;

use Session;
use Auth;

use Lunar\Store\Cart;
use Lunar\Wishlist;
use Lunar\Store\Product;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $product = Product::all();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();

        return view ('front.user-profile.wishlist.index')->with('wishlist', $wishlist)->with('product', $product);
    }

    public function add($id)
    {

        $product = Product::getProductById($id);
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', "Product added into your Wishlist Successfully!");
    }

    public function destroy($id)
    {
        $product = Product::getProductById($id);

        Wishlist::where([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ])->delete();

        return redirect()->back()->with('success', 'Product removed from your Wishlist Successfully!');
    }
}
