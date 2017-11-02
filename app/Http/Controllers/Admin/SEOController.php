<?php

namespace Lunar\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

use Session;
use Auth;

use Lunar\Store\SEO;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = SEO::find(1);

        return view('back.seo.index')->with('seo', $seo);
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Validar
        $this -> validate($request, array(

        ));

        // Guardar datos en la base de datos
        $seo = SEO::find(1);

        $seo->page_title = $request->input('page_title');
        $seo->page_url = $request->input('page_url');
        $seo->page_description = $request->input('page_description');
        $seo->page_keywords = $request->input('page_keywords');

        $seo->page_theme_color_hex = $request->input('page_theme_color_hex');
        $seo->page_canonical_url = $request->input('page_canonical_url');
        $seo->page_alternate_url = $request->input('page_alternate_url');
        $seo->page_url = $request->input('page_url');

        $seo->save();

        // Mensaje de aviso server-side
        Session::flash('success', 'Your SEO Configuration was succesfully saved.');

        // Redireccionar con información de exito a publicacion.show

        return redirect()->back();
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
