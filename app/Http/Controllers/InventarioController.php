<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('producto.index', compact('inventario'));
    }
    public function listByPro($id){
        
        $inventarios = Inventario::join('producto','producto.id_producto','=','inventario.id_producto')
                    ->join('cat_producto','cat_producto.id_cat_pro','=','producto.id_cat_pro')
                    ->join('movimiento','movimiento.id_movimiento','=','inventario.id_movimiento')
                    ->select('producto.modelo','cat_producto.nombre as nom_cat','movimiento.nombre as nom_mov', 'inventario.*')
                    ->where('inventario.estado','=',1)
                    ->where('inventario.id_producto','=',$id)
                    ->orderBy('id_inventario', 'DESC')->get();
        return view('inventario.index', compact('inventarios','id'));
        
    }
   
    public function create($id_pro,$tipo)
    {
        if($tipo==1){//INGRESO
            $x=DB::table('producto')->where('id_producto', $id_pro)->first();;
            return view('inventario.create',compact('x'));
        }else{//SALIDA
            $x=DB::table('producto')->where('id_producto', $id_pro)->first();;
            $sl=1;
            return view('inventario.create',compact('x','sl'));
        }
        
    }

    public function store(Request $request)
    {
        if($request->tipo==1){//Ingreso
            $stp=DB::select('call ingreso_inventario(?,?,?,?,?)',
            array($request->id_producto,Auth::user()->id,$request->cantidad,$request->precio_compra,$request->observaciones));
        }else{//Salida
            $stp=DB::select('call salida_inventario(?,?,?,?)',
            array($request->id_producto,Auth::user()->id,$request->cantidad,$request->observaciones));
        }
        if(isset($stp[0]->FALSE)){//ERROR SAVE
            return redirect()->to('inventario-variante/'.$request->id_producto);
        }else{//SUCCSESS SAVE
            if($request->hasfile('img')){//guardar imagen o documentos si existen
                $x=Inventario::find($stp[0]->id);

                $foto = $request->file('img');
                $ruta=public_path().'/uploads/fotos';
            
                $name = time().'_'.$foto->getClientOriginalName();
            
                $foto->move($ruta,$name);
                $x->img = '/uploads/fotos'.'/'.$name;

                $x->save();
                return redirect()->to('inventario-variante/'.$request->id_producto);
            }
            return redirect()->to('inventario-variante/'.$request->id_producto);
        }
        
    }

    public function show($id)
    {
        $element=Inventario::join('producto','producto.id_producto','=','inventario.id_producto')
        ->join('cat_producto','cat_producto.id_cat_pro','=','producto.id_cat_pro')
        ->join('movimiento','movimiento.id_movimiento','=','inventario.id_movimiento')
        ->select('producto.modelo','cat_producto.nombre as nom_cat','movimiento.nombre as nom_mov', 'inventario.*')
        ->where('inventario.id_inventario','=',$id)->first();

        return view('inventario.show',compact('element'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
    
    }

}