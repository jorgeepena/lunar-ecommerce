<?php

namespace Lunar\Http\Controllers\Admin;

use Session;
use Auth;
use Purifier;
use Storage;
use Image;


use Lunar\Admin;
use Lunar\Store\Product;
use Lunar\Store\Category;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        
        return view('back.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('back.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar
        $this -> validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'production_cost' => 'nullable',
            'image' => 'sometimes|image',
            'stock' => 'nullable',
            'sku' => 'nullable',
        ));

        // Guardar datos en la base de datos
        $product = new Product;

        $product->name = $request->name;
        $product->description = Purifier::clean($request->description);
        $product->price = $request->price;
        $product->production_cost = $request->production_cost;
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->height = $request->height;
        $product->lenght = $request->lenght;
        $product->depth = $request->depth;
        $product->image = $request->image;
        $product->image_2 = $request->image_2;
        $product->image_3 = $request->image_3;
        $product->image_4 = $request->image_4;
        $product->image_5 = $request->image_5;

        $img1 = 'num1';
        $img2 = 'num2';
        $img3 = 'num3';
        $img4 = 'num4';
        $img5 = 'num5';


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $img1 . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);

            Image::make($image)->resize(1280,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $product->image = $filename;
        }

        if ($request->hasFile('image_2')) {
            $image_2 = $request->file('image_2');
            $filename = $img2 . time() . '.' . $image_2->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);

            Image::make($image_2)->resize(1280,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $product->image_2 = $filename;
        }

        if ($request->hasFile('image_3')) {
            $image_3 = $request->file('image_3');
            $filename = $img3 . time() . '.' . $image_3->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);

            Image::make($image_3)->resize(1280,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $product->image_3 = $filename;
        }

        if ($request->hasFile('image_4')) {
            $image_4 = $request->file('image_4');
            $filename = $img4 . time() . '.' . $image_4->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);

            Image::make($image_4)->resize(1280,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $product->image_4 = $filename;
        }

        if ($request->hasFile('image_5')) {
            $image_5 = $request->file('image_5');
            $filename = $img5 . time() . '.' . $image_5->getClientOriginalExtension();
            $location = public_path('img/products/' . $filename);

            Image::make($image_5)->resize(1280,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $product->image_5 = $filename;
        }

        $product->save();

        // Mensaje de session
        Session::flash('success', 'TYour product was saved correctly in the database.');

        alert()->success('Product saved succesfully on the database.', '¡Success!')->autoclose(1000);
        // Enviar a vista
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('back.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('back.products.edit')->with('product', $product);
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
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'The product was succesfully deleted.');

        alert()->success('Product deleted succesfully from the database.', '¡Success!')->autoclose(1000);

        return redirect()->route('products.index');
    }
}
