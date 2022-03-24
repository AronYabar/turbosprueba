<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriaProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoria_produ= DB::table('cat_producto')
            ->get();
        return view('categoriaProductos.index',['categoria_produ'=>$categoria_produ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ultimo =DB::table('cat_producto')->whereRaw('id_cat_pro = (select max(`id_cat_pro`) from cat_producto)')->first();
        return view('categoriaProductos.create',['ultimo'=>$ultimo]);
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
        $id=DB::table('cat_producto')->insertGetId([
            'nombre'=>strtoupper($request->get('nomCatProducto')),
            'descripcion'=>strtoupper($request->get('desCatProducto')),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);
        return redirect('/categoria-productos/');
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
        $categoria_produ= DB::table('cat_producto')
            ->where('id_cat_pro',$id)
            ->first();
        return view('categoriaProductos.edit',['categoria_produ'=>$categoria_produ]);
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
        DB::table('cat_producto')->where('id_cat_pro',$id)->update([
            'nombre'=>strtoupper($request->get('nomCatProducto')),
            'descripcion'=>strtoupper($request->get('desCatProducto')),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);
        return redirect('/categoria-productos/');
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
        DB::table('cat_producto')->where('id_cat_pro',$id)->delete();
        return redirect('/categoria-productos/');
    }
}
