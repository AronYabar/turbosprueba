@extends('layout.layout')

@section('content')
<?php header("Access-Control-Allow-Origin: *"); ?>
<style type="">
	.register {
   width: 100%;
   margin: 10px auto;
   padding: 10px;
   border: 7px solid $green-border;
   border-radius: 10px; 
   font-family: "Helvetica Neue", Helvetica, 
   Arial, sans-serif;
     color: #444;
   background-color: #E7F2FB  ;
   box-shadow: 0 0 20px 0 #000000;
   float:left;
   }

#horizontal3 { zoom: 1; vertical-align: top; font-size: 15px;width: 450px; text-align: center;}
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0x09{background-color:#9b9b9b;text-align:left;vertical-align:top}
.tg .tg-yhdn{background-color:#9698ed;border-color:inherit;text-align:left}
input {
  width: 40%;
}
.tg-quj4{border-color:inherit;text-align:right}
.tg-xldj{border-color:inherit;text-align:left}
body:after {
  content: ""; 
  font-size: 15em;  
  color: rgba(52, 166, 214, 0.4);
  z-index: 9999;
 
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
    
  -webkit-pointer-events: none;
  -moz-pointer-events: none;
  -ms-pointer-events: none;
  -o-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}
</style>

<div class="row">
	<div class="col-lg-12">
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading" >
      @if(isset($sl))
        Registro Salida para Modelo <strong>{{ @$x->modelo }}</strong>
      @else
        Nueva Ingreso para Modelo <strong>{{ @$x->modelo }}</strong>
      @endif
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center" >
                        
						            <form name="mi_formulario" role="form" method="post" action="/inventario" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data">
                        @if(isset($sl))
                        <input type="hidden" name="tipo" id="tipo" value="2">
                        @else
                        <input type="hidden" name="tipo" id="tipo" value="1">
                        @endif
                        <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                        <input type="hidden" name="id_producto" value="{{@$x->id_producto}}">
							<div align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3" align="center"><h3 align="center">
                        @if(isset($sl))
                        Datos de Salida
                        @else
                        Datos de Ingreso
                        @endif
                        </h3>
                      </th>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Cantidad:</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input onkeyup="sumarCantidad()" oninput="sumarCantidad()" type="number"  step="1"class="form-control"  name="cantidad" id="cantidad" value="{{@$element->cantidad}}" autocomplete="off">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Stock Inicial:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<div id=""></div>
                                            <input id="sti" type="text" style="width: 150px;" class="form-control"  value="{{@$x->stock}}" readonly>
                                            
									    </td>
									  </tr>
									   <tr>
							            <td class="tg-quj4"><label>Stock Final :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" style="width: 150px;" id="stockFinal" class="form-control" value="{{@$element->stockFinal}}" readonly>
							            </td>
							          </tr>
                        @if(isset($sl))
                        @else
                        <tr>
                          <td class="tg-quj4"><label>Precio Compra (u):</label></td>
                          <td class="tg-xldj" colspan="2">
                            <div id=""></div>
                            <input id="sti" type="number" step="01.00" style="width: 150px;" class="form-control"  name="precio_compra" id="precio_compra" >                     
                          </td>
                        </tr>
                        @endif
							          <tr>
							            <td class="tg-quj4"><label>Observaciones :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" class="form-control" name="observaciones"  id="observaciones" value="{{@$element->observaciones}}" autocomplete="off">
							            </td>
							          </tr>
                                      <tr>
                                          <td class="tg-quj4"><label><strong> Subir Foto</strong></label></td>
                                          <td class="tg-quj4" colspan="2" >
                                            <div class="form-group">       
                                                <input type="file" class="form-control-file" name="img" id="img" accept="image/*">
                                            </div>  
                                          </td>
                                      </tr>
									  <tr>
									  	<td class="tg-quj4"><button disabled id="sv" type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									    
										<button type="button" class="btn btn-danger" onclick="location.href='/variantes/{{ $x->id_cat_pro }}'">Volver</button></td>
									  </tr>

								</table>
					    	</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    const tipo=document.querySelector('#tipo').value;
    const sti=parseInt(document.querySelector('#sti').value);  
    function sumarCantidad(){
        let ct=parseInt(document.querySelector('#cantidad').value);
        let result;
        if(tipo==1){
          result= ct+sti;
          if(result<sti || result==sti ||result<0 || isNaN(ct)){
            document.getElementById("sv").disabled=true;
          }else{
              document.getElementById("sv").disabled=false;
          }
        } else{
          result= sti-ct;
          if(result>sti || result==sti ||result<0 ||isNaN(ct)){
            document.getElementById("sv").disabled=true;
          }else{
              document.getElementById("sv").disabled=false;
          }
        } 
        document.getElementById("stockFinal").setAttribute('value',result);
     }
</script>
@stop