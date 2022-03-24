<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }
    public function listByCat($id){
        $productos = Producto::join('cat_producto','cat_producto.id_cat_pro','=','producto.id_cat_pro')
                    ->select('producto.*','cat_producto.nombre')
                    ->where('producto.estado','=',1)
                    ->where('producto.id_cat_pro','=',$id)
                    ->orderBy('destacado', 'DESC')->get();

        return view('producto.index', compact('productos','id'));
    }
   
    public function create($id_cat)
    {
        $x=DB::table('cat_producto')->where('id_cat_pro', $id_cat)->first();;
        return view('producto.create',compact('x'));
    }

    public function store(Request $request)
    {
        $i=DB::table('producto')->
        where('modelo', $request->modelo)
        ->where('nro_parte', $request->turbo)
        ->where('marca', $request->marca)
        ->where('motor', $request->motor)
        ->where('estado', 1)
        ->first();
        if($i != null){
            $e=true;
            $x=DB::table('cat_producto')->where('id_cat_pro', $request->id_cat_pro)->first();;
            return view('producto.create',compact('x','e'));
        }else{
            $x= new Producto();

            $x->id_cat_pro=$request->id_cat_pro;
            $x->modelo=$request->modelo;
            $x->nro_parte=$request->turbo;
            $x->marca=$request->marca;
            $x->motor=$request->motor;
            $x->precio=$request->precio;
            $x->aplicacion=$request->aplicacion;
            $x->destacado=$request->destacado;
    
            $x->estado=1;
            $x->save();
    
            return redirect()->to('variantes/'.$x->id_cat_pro);   
        }
    }

    public function show($modelo)
    {
        //
    }

    public function edit($id)
    {
        $element=Producto::find($id);
        $x=DB::table('cat_producto')->where('id_cat_pro', $element->id_cat_pro)->first();;
        return view('producto.create',compact('element','x'));
        //
    }

    public function update(Request $request, $id)
    {
        $x=Producto::find($id);

        $x->id_cat_pro=$request->id_cat_pro;
        $x->modelo=$request->modelo;
        $x->nro_parte=$request->motor;
        $x->marca=$request->marca;
        $x->motor=$request->motor;
        $x->precio=$request->precio;
        $x->aplicacion=$request->aplicacion;
        $x->destacado=$request->destacado;

        $x->save();

        return redirect()->to('variantes/'.$x->id_cat_pro);
    }

    public function destroy($id)
    {
        $x=Producto::find($id);
        $x->estado=0;
        $x->save();

        return redirect()->to('variantes/'.$x->id_cat_pro);
    }

}
