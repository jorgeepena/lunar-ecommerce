<?php

namespace Lunar\Http\Controllers\Admin;


use Lunar\Store\SEO;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

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
    public function update(Request $request, $id)
    {
        //Validar
        $this -> validate($request, array(

        ));

        // Guardar datos en la base de datos
        $seo = SEO::find($id);

        $seo->titulo = $request->input('titulo');
        $seo->resumen = $request->input('resumen');
        $seo->cuerpo = Purifier::clean($request->input('cuerpo'));

        $seo->destacado = $request->input('destacado');

        $seo->autor_id = $request->input('autor_id');
        $seo->categoria_id = $request->input('categoria_id');

        $seo->slug = $request->input('slug');

        $seo->save();

        // Mensaje de aviso server-side
        Session::flash('exito', 'Your SEO Configuration was succesfully saved.');

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
